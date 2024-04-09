<?php


namespace App\Services;


use App\Models\Tagged as TaggedModel;
use Illuminate\Support\Facades\Storage;

class TaggedServices extends BaseServices
{
    private $contentImageServices ;
    public function __construct(TaggedModel $model)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        $limit = $request->get('limit', TaggedModel::LIMIT_PAGE);
        $query = $this->model;
        return $query->paginate($limit);
    }

    public function show($id)
    {

    }

    public function save(array $attributes)
    {
        if (!empty($attributes['id'])) {
            $entity = $this->model->find($attributes['id']);
            if ($entity) {
                $entity->fill($attributes)->save();
                return $entity;
            } else {
                return null;
            }
        } else {
            return $this->model->create($attributes);
        }
    }

    public function deleteByComicIdandHashtagId($comic_id,$hashtags){
        return $this->model->where('comic_id',$comic_id)->whereIn('hashtag_id',$hashtags)->delete();
    }

    public function delete($id)
    {
        $entity = $this->model
            ->where('id', $id)->first();
        return !empty($entity) ? $entity->delete() : null;
    }
}
