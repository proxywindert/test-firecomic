<?php


namespace App\Services;

use App\Models\Chapter;
use App\Models\Comic as ComicModel;
use App\Models\Hashtag;
use App\Models\Tagged;
use Carbon\Carbon;
use Google_Service_Drive_DriveFile;
use Google_Service_Drive_Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ComicServices extends BaseServices
{
    private $summaryContentServices;
    private $taggedServices;

    public function __construct(ComicModel $model, SummaryContentServices $summaryContentServices, TaggedServices $taggedServices)
    {
        $this->taggedServices = $taggedServices;
        $this->summaryContentServices = $summaryContentServices;
        parent::__construct($model);
    }

    public function index($request)
    {
        $limit = $request->get('limit', ComicModel::LIMIT_PAGE);
        $query = ComicModel::query();
        $hashtag = $request->get('hashtag');
        if ($hashtag && $hashtag != 'null') {
            $query = $query->whereHas('hashtags', function ($query) use ($hashtag) {
                $query->where('hashtags.slug', $hashtag);
            });
        }
        if (!empty($request['loading_hashtag'])) {
            $query = $query->with('hashtags');
        }

        if (!empty($request['loading_tagged'])) {
            $query = $query->with('taggeds');
        }

        $query = $query->with('chapters', function ($query) {
            $query->orderBy('id', 'asc');
        });
        $query = $query->orderBy('id', 'desc');

        $data = $query->paginate($limit);

        if (!$data->isEmpty()) {
            // cal diff time
            $data = $this->calDiffTime($data);

            // sort
            $data = $this->sortDataBy($data);

            $data = $this->makeSkeletonColor($data);
        }

        return $data;
    }

    public function  makeSkeletonColor($data){
        $data->each(function ($item)  {
            $item['skeleton_bg_color'] =str_replace(")", ", 0.3)", $item->bg_color);
        });
        return $data;
    }

    public function calDiffTime($data){
        $now = Carbon::now();
        $data->each(function ($item) use ($now) {
            if ($item ?->chapters ?->last() ?->publish_at){
                $item['diff_time'] = $now->diffInMinutes($item ?->chapters ?->last() ?->publish_at);
                    $item['diff_time_to_sort'] = $now->diffInMinutes($item ?->chapters ?->last() ?->publish_at);
                    if ($item['diff_time'] <= 0) {
                        $item['diff_time'] = 'Mới cập nhật';
                    } else if ($item['diff_time'] <= 60) {
                        $item['diff_time'] = 'Cách đây ' . $item['diff_time'] . ' phút';
                    } else if ($item['diff_time'] <= 1440) {
                        $item['diff_time'] = 'Cách đây ' . round(($item['diff_time'] / 60), 0, PHP_ROUND_HALF_DOWN) . ' giờ';
                    } else if($item['diff_time'] <= 10080){
                        $item['diff_time'] = 'Cách đây ' . round(($item['diff_time'] / (60 * 24)), 0, PHP_ROUND_HALF_DOWN) . ' ngày';
                    }else if($item['diff_time'] <= 40320){
                        $item['diff_time'] = 'Cách đây ' . round(($item['diff_time'] / (60 * 24*7)), 0, PHP_ROUND_HALF_DOWN) . ' tuần';
                    }else{
                        $item['diff_time'] = 'Cách đây ' . round(($item['diff_time'] / (60 * 24*7*4)), 0, PHP_ROUND_HALF_DOWN) . ' tháng';
                    }
                }else{
                $item['diff_time_to_sort'] = 0;
                $item['diff_time'] = 'Mới cập nhật';
            }

            });
        return $data;
    }

    public function sortDataBy($data){
        $data->setCollection(collect($data->items())->sortBy(function ($item) {
            return $item['diff_time_to_sort'];
        }));
        return $data;
    }

    public function prepareHashtags($data)
    {
        foreach ($data as $comic) {
            $idTag = $comic->taggeds->where('is_main_tag', 1)->first();
            if ($idTag) {
                $comic->hashtags->each(function ($item) use ($idTag) {
                    if ($idTag->hashtag_id == $item->id) {
                        $item['is_main_tag'] = true;
                    }
                });
            }
        }
        return $data;
    }

    public function save(array $attributes)
    {
        if (!empty($attributes['comic_code'])) {
            $entity = $this->model->where('comic_code', $attributes['comic_code'])->first();
            if ($entity) {
                if ($attributes['bg_color']) {
                    $attributes['tranfer_color'] = "background:linear-gradient(to bottom, rgba({$attributes['bg_color']},0) 2%, rgba({$attributes['bg_color']},0.7) 50%,  rgba({$attributes['bg_color']}))";
                    $attributes['bg_color'] = "rgba({$attributes['bg_color']})";
                } else {
                    $attributes['tranfer_color'] = '';
                }

                $entity->fill($attributes)->save();

                $this->updateSummaryContents($attributes, $entity);
                $this->updateTaggeds($attributes, $entity);
                return $entity;
            } else {
                return null;
            }
        } else {
            $attributes['comic_code'] = "COMIC-" . ($this->model->max('id') + 1);
            if ($attributes['bg_color']) {
                $attributes['tranfer_color'] = "background:linear-gradient(to bottom, rgba({$attributes['bg_color']},0) 2%, rgba({$attributes['bg_color']},0.7) 50%,  rgba({$attributes['bg_color']}))";
                $attributes['bg_color'] = "rgba({$attributes['bg_color']})";
            } else {
                $attributes['tranfer_color'] = '';
            }

            $entity = $this->model->create($attributes);
            $this->addSummaryContents($attributes, $entity);
            $this->addTaggeds($attributes, $entity);
            return $entity;
        }
    }

    public function updateSummaryContents($attributes, $entity)
    {
        $summayContent['id'] = $entity ?->summaryContents ?->id;
        $summayContent['comic_id'] = $entity['id'];
        $summayContent['content'] = $attributes['summary_contents'];
        $this->summaryContentServices->save($summayContent);
    }

    public function addSummaryContents($attributes, $entity)
    {
        $summayContent['comic_id'] = $entity['id'];
        $summayContent['content'] = $attributes['summary_contents'];
        $this->summaryContentServices->save($summayContent);
    }

    public function updateTaggeds($attributes, $entity)
    {
        // lay ra tat cả tagged của entity
        $oldTaggeds = $entity->hashtags->pluck('id')->all();
        $listtemp = [];
        if (isset($attributes['tagged'])) {
            foreach ($attributes['tagged'] as $index => $tagged) {
                if (in_array($tagged, $oldTaggeds)) {
                    $listtemp[] = $tagged;
                } else {
                    $this->taggedServices->save(['comic_id' => $entity->id, 'hashtag_id' => $tagged]);
                }
            }
        }

        // lọc các id cần xóa
        $listdelete = array_diff($oldTaggeds, $listtemp);
        $this->taggedServices->deleteByComicIdandHashtagId($entity->id, $listdelete);
    }


    public function addTaggeds($attributes, $entity)
    {
        if (isset($attributes['tagged'])) {
            foreach ($attributes['tagged'] as $index => $tagged) {
                $this->taggedServices->save(['comic_id' => $entity->id, 'hashtag_id' => $tagged]);
            }
        }

    }

    public function uploadGGDrive($request, &$comic)
    {
        $file = [];
        $file['link_banner']['file'] = $request->file('link_banner');
        $file['link_video_banner']['file'] = $request->file('link_video_banner');
        $file['link_avatar']['file'] = $request->file('link_avatar');
        $file['link_comic_name']['file'] = $request->file('link_comic_name');
        $file['link_comic_small_name']['file'] = $request->file('link_comic_small_name');
        $file['link_bg']['file'] = $request->file('link_bg');

        $driveService = Storage::disk('google');

        $newPermission = app()->make('googlePermission');
        $folderId = app()->make('googleFolderId');

        $fileToUpload = $this->postGGDrive($driveService, $file['link_avatar']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_avatar']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        $fileToUpload = $this->postGGDrive($driveService, $file['link_comic_name']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_comic_name']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        $fileToUpload = $this->postGGDrive($driveService, $file['link_bg']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_bg']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        $fileToUpload = $this->postGGDrive($driveService, $file['link_banner']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_banner']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }

        $fileToUpload = $this->postGGDrive($driveService, $file['link_video_banner']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_video_banner']['url'] = 'https://drive.usercontent.google.com/download?id=' . $fileToUpload->id . '&export=download';
        }


        $fileToUpload = $this->postGGDrive($driveService, $file['link_comic_small_name']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_comic_small_name']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


         if (!empty($file['link_video_banner']['url'])) {
             $comic['link_video_banner'] = $file['link_video_banner']['url'];
         }
        if (!empty($file['link_banner']['url'])) {
            $comic['link_banner'] = $file['link_banner']['url'];
        }
        if (!empty($file['link_bg']['url'])) {
            $comic['link_bg'] = $file['link_bg']['url'];
        }
        if (!empty($file['link_comic_name']['url'])) {
            $comic['link_comic_name'] = $file['link_comic_name']['url'];
        }
        if (!empty($file['link_avatar']['url'])) {
            $comic['link_avatar'] = $file['link_avatar']['url'];
        }
        if (!empty($file['link_comic_small_name']['url'])) {
            $comic['link_comic_small_name'] = $file['link_comic_small_name']['url'];
        }

        return $file;
    }

    public function findByComicCode($comic_code)
    {
        return $this->model->where('comic_code', $comic_code)->first();
    }

    public function show($comicCode)
    {
        $data = ComicModel::query();

        $data = $data->with('chapters', function ($query) {
            $query->orderBy('id', 'asc');
        })
            ->with('summaryContents')
            ->with('hashtags')
            ->where('comic_code', $comicCode)->first();
        if (!empty($data)) {
            $now = Carbon::now();
            if ($data ?->chapters ?->last() ?->publish_at){
                $data['diff_time'] = $now->diffInMinutes($data ?->chapters ?->last() ?->publish_at);
                    if ($data['diff_time'] <= 0) {
                        $data['diff_time'] = 'Mới cập nhật';
                    } else if ($data['diff_time'] <= 60) {
                        $data['diff_time'] = 'Cách đây ' . $data['diff_time'] . ' phút';
                    } else if ($data['diff_time'] <= 1440) {
                        $data['diff_time'] = 'Cách đây ' . round(($data['diff_time'] / 60), 0, PHP_ROUND_HALF_DOWN) . ' giờ';
                    } else {
                        $data['diff_time'] = 'Cách đây ' . round(($data['diff_time'] / (60 * 24)), 0, PHP_ROUND_HALF_DOWN) . ' ngày';
                    }
                }else{
                $data['diff_time'] = 'Mới cập nhật';
            }

            $data->chapters->each(function ($item) {
                foreach (Chapter::TIME as $key => $value) {
                    if ($item[$value])
                        $item[$value] = Carbon::parse($item[$value])->tz(config('app.timezone'))->format('d/m/Y');
                }
            });

             $data['skeleton_bg_color'] =str_replace(")", ", 0.3)", $data->bg_color);
        }
        return $data;
    }

    public function getRelationComic($comic_code, $limit = 10)
    {
        // lấy ra các hashtag của comic này
        $comic = $this->findByComicCode($comic_code);
        // nếu ko sợ việc lặp record thì dùng join sẽ nhanh hơn , nhưng trường hợp này , 2 bảng
        // comic và hashtag là n-n với nhau nên sẽ xảy ra lặp >> ko dùng join
//         $hashtags = $comic->hashtags->pluck('id')->toArray();

        // dùng whereHas để lấy ra các hashtags có comic id
        $hashtags = Hashtag::select('id')->whereHas('comics', function ($hashtags) use ($comic) {
            $hashtags->where('comic_id', $comic->id);
        });
        // ở đây ta lấy ra array các id hashtag , thì lúc chạy query dưới sẽ nhanh hơn
        // là tạo 1 câu query dài
        $hashtags = $hashtags->get()->toArray();

        $query = $this->model->whereIn('id', function ($query) use ($hashtags) {
            $query->select('comic_id')->from('taggeds')->whereIn('hashtag_id', $hashtags);
        });

        $data = $query->limit($limit)->get();

        if (!$data->isEmpty()) {
            $data = $this->makeSkeletonColor($data);
        }

        return $data;
    }

    public function delete($comicCode)
    {
        $entity = $this->model
            ->where('comic_code', $comicCode)->first();
        // xoa img tren ggdrive
        $result = collect($entity)->only(['link_bg', 'link_avatar', 'link_comic_name', 'link_banner', 'link_comic_small_name']);
        $this->deteleGGDrive($result->toArray());
        return !empty($entity) ? $entity->delete() : null;
    }
}
