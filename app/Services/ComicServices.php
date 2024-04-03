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
        $hashtag = $request->get('hashtag');
        if ($hashtag && $hashtag != 'null') {
            $query = $query->whereHas('hashtags',function ($query) use($hashtag){
                $query->where('hashtags.id',$hashtag);
            });
        }
        return $query->paginate($limit);
    }

    public function show($comicCode)
    {
        $data = $this->model->with('chapters')->with('hashtags')->where('comic_code', $comicCode)->first();
        return $data;
    }
}
