<?php

namespace App\Http\Controllers\WebControllers\V1\Frontend;

use App\Http\Controllers\BaseController;
use App\Services\ComicServices;
use App\Services\GenreServices;
use Illuminate\Http\Request;

class LandingController extends BaseController
{
    private $comicService;
    private $genreService;
    public function __construct(ComicServices $comicService, GenreServices $genreService)
    {
        $this->genreService = $genreService;
        $this->comicService = $comicService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $genres = $this->genreService->index($request);
        $comics = $this->comicService->index($request);

        return view('Frontend.comics.index',compact('genres','comics'));
    }
}
