<?php


namespace App\Services;


use App\Models\Chapter as ChapterModel;

class ChapterServices extends BaseServices
{
    public function __construct(ChapterModel $model)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        $limit = $request->get('limit', ChapterModel::LIMIT_PAGE);
        $query = $this->model;
        return $query->paginate($limit);
    }

    public function show($chapterNumber)
    {
        $data = $this->model->where('chapter_number', $chapterNumber)->with('contentImages')->first();

        return $data;
    }

    public function getChapterByComicCodeAndChapterNumber($comic_code,$chapterNumber)
    {
//        $data = $this->model->with('comic')->where('comic_code', $comic_code)->where('chapter_number', $chapterNumber)->with('contentImages')->first();
        $query = $this->model;
        $data = $query->whereHas('comic',function ($query) use($comic_code){
            $query->where('comic_code', $comic_code);
        })->where('chapter_number', $chapterNumber)->with('contentImages')->with('comic')->first();

        return $data;
    }
}
