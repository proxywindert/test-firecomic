<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebControllers\V1\Backend\ComicController;
use App\Http\Controllers\WebControllers\V1\Backend\ChapterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/users', function () {
    $users = DB::table('users')->get();
    return view('users', compact('users'));
});

Route::get('/', [ComicController::class, 'index']);

Route::group(array('prefix' => 'comics'), function () {
    Route::get('/content/{comic_code}', [ComicController::class, 'show'])->name('comic-info');
    Route::get('/viewer/{chapter_number}', [ChapterController::class, 'show'])->name('view-comic');
});
