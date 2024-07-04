<?php

namespace App\Http\Controllers\AjaxControllers\V1\Backend;

use App\Http\Controllers\BaseController;
use App\Services\ChapterServices;
use App\Services\ComicServices;
use App\Services\HashtagServices;
use Google_Service_Drive_DriveFile;
use Google_Service_Drive_Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ComicRequest;
class ComicController extends BaseController
{
    private $comicService;
    private $chapterServices;
    private $hashtagServices;
    public function __construct(ComicServices $comicService,
                                ChapterServices $chapterServices,
    HashtagServices $hashtagServices)
    {
        $this->hashtagServices = $hashtagServices;
        $this->chapterServices = $chapterServices;
        $this->comicService = $comicService;
        parent::__construct();
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
            'summary_contents',
            'tagged'
        ]);
        try {
            $this->comicService->uploadGGDrive($request,$comic);
        }catch (\Exception $e){
            return $this->responseJson( trans('store_fail'),500,$e->getMessage());
        }

        DB::beginTransaction();
        try {
            $result = $this->comicService->save($comic,$request);
            DB::commit();

            return $this->responseJson( trans('comic.msg_content.msg_add_success'),200,['code' => $result->comic_code,'id'=>$result->id]);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->responseJson( trans('store_fail'),500,$e->getMessage());
        }
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
            'summary_contents',
            'tagged'
        ]);
        $comic['comic_code'] = $id;

        try {
            $this->comicService->uploadGGDrive($request,$comic);
        }catch (\Exception $e){
            return $this->responseJson( trans('update_fail'),500,$e->getMessage());
        }

        DB::beginTransaction();
        try {

            $result = $this->comicService->save($comic,$request);
            DB::commit();

            return $this->responseJson( trans('comic.msg_content.msg_edit_success'),200,['code' => $result->comic_code,'id'=>$result->id]);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->responseJson( trans('update_fail'),500,$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $result = $this->comicService->delete($id);
        if (!$result) {
            return $this->responseJson( trans('delete_fail'),500);
        }

        return $this->responseJson( trans('delete_success'),200);
    }
}
