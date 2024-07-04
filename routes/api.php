<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\AjaxControllers\V1\Backend\ChapterController as AdmChapterController;
use App\Http\Controllers\AjaxControllers\V1\Backend\ComicController as AdmComicController;

Route::group(array('prefix' => 'admin'), function () {
    Route::group(array('prefix' => 'comics', 'as' => 'comics.'), function () {
        Route::post('/{code}', [AdmComicController::class, 'update'])->name('patch');
        Route::post('/', [AdmComicController::class, 'store'])->name('store');
        Route::delete('/{code}', [AdmComicController::class, 'destroy'])->name('delete');

        Route::group(array('prefix' => '{comic_code}/chapters', 'as' => 'chapters.'), function () {
            Route::post('/{id}', [AdmChapterController::class, 'update'])->name('patch');
            Route::post('/', [AdmChapterController::class, 'store'])->name('store');
            Route::delete('/{id}', [AdmChapterController::class, 'destroy'])->name('delete');
        });
    });
});
