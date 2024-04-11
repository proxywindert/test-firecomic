<?php

namespace App\Http\Controllers\WebControllers\V1\Frontend;

use App\Http\Controllers\BaseController;
use App\Services\ComicServices;
use Illuminate\Http\Request;

class ComicController extends BaseController
{
    private $comicServices;

    public function __construct(ComicServices $comicServices)
    {
        $this->comicServices = $comicServices;
        parent::__construct();
    }

    public function searchByhashTag(Request $request,$hashtag)
    {
        $request['hashtag'] = $hashtag;
        $comics = $this->comicServices->index($request);
        return view('Frontend.pages.comics.search',compact('comics'));
    }

    public function show(Request $request,$comic_code)
    {
        $relations = $this->comicServices->getRelationComic($comic_code);
        $comic = $this->comicServices->show($comic_code);
        return view('Frontend.pages.comics.detail',compact('comic','relations'));
    }
}
