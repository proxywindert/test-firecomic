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
        $query = $this->model;
        $hashtag = $request->get('hashtag');
        if ($hashtag && $hashtag != 'null') {
            $query = $query->whereHas('hashtags', function ($query) use ($hashtag) {
                $query->where('hashtags.slug', $hashtag);
            });
        }
        $query->with('chapters');
        $data = $query->paginate($limit);

        if (!$data->isEmpty()) {
            $now = Carbon::now();
            $data->each(function ($item) use ($now) {
                if ($item ?->chapters ?->last() ?->publish_at){
                    $item['diff_time'] = $now->diffInDays($item ?->chapters ?->last() ?->publish_at);
                    $item['diff_time'] = $item['diff_time'] <= 0 ? 'Mới cập nhật' : 'Cách đây ' . $item['diff_time'] . ' ngày';
                }else{
                    $item['diff_time'] = 'Mới cập nhật';
                }

            });
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


        $fileToUpload = $this->postGGDrive($driveService, $file['link_comic_small_name']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_comic_small_name']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
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
        $data = $this->model->with('chapters')
            ->with('summaryContents')
            ->with('hashtags')->where('comic_code', $comicCode)->first();
        if (!empty($data)) {
            $now = Carbon::now();
            if ($data->chapters->last() ?->publish_at){
                $data['diff_time'] = $now->diffInDays($data->chapters->last()->publish_at);
                $data['diff_time'] = $data['diff_time'] <= 0 ? 'Mới cập nhật' : 'Cách đây ' . $data['diff_time'] . ' ngày';
            }else{
                $data['diff_time'] = 'Mới cập nhật';
            }

            $data->chapters->each(function ($item) {
                foreach (Chapter::TIME as $key => $value) {
                    if ($item[$value])
                        $item[$value] = Carbon::parse($item[$value])->tz(config('app.timezone'))->format('d/m/Y');
                }
            });
        }
        return $data;
    }

    public function getRelationComic($comic_code,$limit=10)
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

        $query =  $this->model->whereIn('id',function ($query)use($hashtags){
            $query->select('comic_id')->from('taggeds')->whereIn('hashtag_id',$hashtags);
        });

        return $query->limit($limit)->get();
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
