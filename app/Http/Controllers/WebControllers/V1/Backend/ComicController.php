<?php

namespace App\Http\Controllers\WebControllers\V1\Backend;

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

    public function index(Request $request)
    {
        return view('Frontend.comics.index');
    }

    public function show($comic_code)
    {
        $comic = $this->comicService->show($comic_code);
        return view('Frontend.comics.detail',compact('comic'));
    }
}
