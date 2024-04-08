<?php


namespace App\Services;


use App\Models\Chapter as ChapterModel;
use Illuminate\Support\Facades\Storage;

class ChapterServices extends BaseServices
{
    private $contentImageServices ;
    public function __construct(ChapterModel $model,ContentImageServices $contentImageServices)
    {
        $this->contentImageServices = $contentImageServices;
        parent::__construct($model);
    }

    public function index($request)
    {
        $limit = $request->get('limit', ChapterModel::LIMIT_PAGE);
        $query = $this->model;
        $query = $query->with('contentImages');
        return $query->paginate($limit);
    }

    public function show($id)
    {
        $data = $this->model->where('id', $id)->with('contentImages')->first();
        return $data;
    }

    public function findByComics($request,$id)
    {
        $limit = $request->get('limit', ChapterModel::LIMIT_PAGE);
        $query = $this->model->where('comic_id', $id)->with('contentImages');
        return $query->paginate($limit);
    }

    public function getChapterByComicCodeAndChapterNumber($comic_code, $id)
    {
        $query = $this->model;
        $data = $query->whereHas('comic', function ($query) use ($comic_code) {
            $query->where('comic_code', $comic_code);
        })
            ->where('id', $id)->with('contentImages')->with('comic')->first();

        return $data;
    }

    public function save($request,array $attributes)
    {
        if (!empty($attributes['id'])) {
            $entity = $this->model->where('id',$attributes['id'])->first();
            if ($entity) {
                $entity->fill($attributes)->save();
                return $entity;
            } else {
                return null;
            }
        } else {

            // get het chapter cua comic nay
            $chapters = $this->findByComicId($attributes['comic_id']);
            // neu comic chua co chapter nao : next,prv = null
            if($chapters->isEmpty()){
                $entity = $this->model->create($attributes);
            }

            // neu comic co hon 2 chapter : next = null , prv = chap ter vua ad ngay trc

            if($chapters->count() >= 1){
                $attributes['prv_chapter_id'] =  $chapters[$chapters->count()-1]->id;
                $entity = $this->model->create($attributes);
                $chapters[$chapters->count()-1]['next_chapter_id'] = $entity->id;
                $chapters[$chapters->count()-1]->save();
            }

            // add content img
            $contentImages['chapter_id'] = $entity->id;
            $this->contentImageServices->uploadGGDrive($request,$contentImages);
            $this->contentImageServices->save($contentImages);
            return $entity;
        }
    }

    public function findByComicId($id){
        $query = $this->model;
        $query = $query->where('comic_id',$id);
        return $query->get();
    }

    public function uploadGGDrive($request,&$comic)
    {
        $file = [];
        $file['link_small_icon']['file'] = $request->file('link_small_icon');

        $driveService = Storage::disk('google');

        $newPermission = app()->make('googlePermission');

        $folderId = app()->make('googleFolderId');

        $fileToUpload = $this->postGGDrive($driveService, $file['link_small_icon']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);
            $file['link_small_icon']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        if(!empty($file['link_small_icon']['url'])){
            $comic['link_small_icon'] = $file['link_small_icon']['url'];
        }

        return $file;
    }

    public function delete($id)
    {
        $entity = $this->model
            ->where('id', $id)->first();
        // xoa img tren ggdrive
        $result = collect($entity)->only(['link_small_icon']);
        $this->deteleGGDrive($result->toArray());
        return !empty($entity) ? $entity->delete() : null;
    }
}
