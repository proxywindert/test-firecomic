<?php

namespace App\Http\Controllers\WebControllers\V1\Frontend;

use App\Http\Controllers\BaseController;
use App\Services\ComicServices;
use Illuminate\Http\Request;

class ComicController extends BaseController
{
    private $comicService;

    public function __construct(ComicServices $comicService)
    {
        $this->comicService = $comicService;
        parent::__construct();
    }

    public function search(Request $request,$hashtag)
    {
        $request['hashtag'] = $hashtag;
        $comics = $this->comicService->index($request);
        return view('Frontend.comics.search',compact('comics'));
    }

    public function show($comic_code)
    {
        $comic = $this->comicService->show($comic_code);
        return view('Frontend.comics.detail',compact('comic'));
    }
}
