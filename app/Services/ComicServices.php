<?php


namespace App\Services;
use App\Models\Comic as ComicModel;

class ComicServices extends BaseServices
{
    public function __construct(ComicModel $model)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        $limit = $request->get('limit', ComicModel::LIMIT_PAGE);
        $query = $this->model;
        return $query->paginate($limit);
    }

    public function show($comicCode)
    {
        $data = $this->model->with('chapters')->where('comic_code', $comicCode)->first();
        return $data;
    }
}
