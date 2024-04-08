<?php

namespace App\Http\Controllers\WebControllers\V1\Backend;

use App\Http\Controllers\BaseController;
use App\Services\ChapterServices;
use App\Services\ComicServices;
use Google_Service_Drive_DriveFile;
use Google_Service_Drive_Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ComicController extends BaseController
{
    private $comicService;
    private $chapterServices;
    public function __construct(ComicServices $comicService,
                                ChapterServices $chapterServices)
    {
        $this->chapterServices = $chapterServices;
        $this->comicService = $comicService;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $comics = $this->comicService->index($request);
        $param = ($request->except(['page']));
        return view('Backend.pages.comics.list', compact('comics','param'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.pages.comics.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comic = $request->only([
            'comic_name',
            'bg_color',
            'tranfer_color',
            'summary_contents'
        ]);

        DB::beginTransaction();
        try {
            $this->comicService->uploadGGDrive($request,$comic);

            $result = $this->comicService->save($comic);
            DB::commit();

            $request->session()->flash('msg', trans('employee.msg_add.success'));
            return redirect()->route('comics.edit', ['code' => $result->comic_code]);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('msg', trans('employee.msg_add.fail'));
            $request->session()->flash('msg', $e->getMessage());
            return back()->with(['comic' => $comic]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $comic = $this->comicService->show($id);
        $chapters = $this->chapterServices->findByComics($request,$comic->id);
        $param= $request->except(['page']);
        return view('Backend.pages.comics.edit', compact('comic','chapters','param'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comic = $request->only([
            'comic_name',
            'bg_color',
            'tranfer_color',
            'summary_contents'
        ]);
        $comic['comic_code'] = $id;

        DB::beginTransaction();
        try {
            $this->comicService->uploadGGDrive($request,$comic);

            $result = $this->comicService->save($comic);
            DB::commit();

            $request->session()->flash('msg', trans('employee.msg_add.success'));
            return redirect()->route('comics.edit', ['code' => $result->comic_code]);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('msg', $e->getMessage());
            return back()->with(['comic' => $comic]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $result = $this->comicService->delete($id);
        $comics = $this->comicService->index($request);
        if (!$result) {
            $request->session()->flash('msg', trans('employee.msg_add.fail'));
        }
        return view('Backend.pages.comics.list', compact('comics'));
    }
}
