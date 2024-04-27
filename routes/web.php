<?php

use App\Services\ComicServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebControllers\V1\Frontend\ComicController;
use App\Http\Controllers\WebControllers\V1\Frontend\ChapterController;
use App\Http\Controllers\WebControllers\V1\Frontend\LandingController;
use App\Http\Controllers\WebControllers\V1\Backend\LandingController as AdmLandingController;
use App\Http\Controllers\WebControllers\V1\Backend\ComicController as AdmComicController;
use App\Http\Controllers\AjaxControllers\V1\Backend\ChapterController as AdmChapterController;
use App\Http\Controllers\AjaxControllers\V1\Frontend\ChapterController as FrontendChapterController;

use App\Http\Controllers\AjaxControllers\V1\Backend\HashtagController as AjaxAdmHashtagController;
use App\Http\Controllers\WebControllers\V1\Backend\HashtagController as AdmHashtagController;

use App\Http\Controllers\Auth\LoginController as AdmLoginController;
use App\Http\Controllers\Auth\RegisterController as AdmRegisterController;
use Illuminate\Support\Str;

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

Route::get('/test/{slug1}-{id1}/cate/{slug2}-{id2}', function($slug1,$id1,$slug2,$id2){
    $comicSerives = app()->make(ComicServices::class);
    $data = $comicSerives->getAllComics();
    $data->each(function ($item){
        $slug = Str::slug($item->comic_name, '-');
        $item->slug= $slug;
        $item->save();
        $item->chapters->each(function ($chapter){
            $slug = Str::slug($chapter->chapter_name, '-');
            $chapter->slug= $slug;
            $chapter->save();
        });
    });
})->where('slug1', '[a-zA-Z0-9-_]+')
    ->where('slug2', '[a-zA-Z0-9-_]+')
    ->where('id1', 'COMIC-[0-9]+')
    ->where('id2', '[0-9]+')
    ->name('test');

Route::get('/login', [AdmLoginController::class, 'getLogin'])->name('getLogin');

Route::get('/logout', [AdmLoginController::class, 'logout'])->name('logout');

Route::post('/login', [AdmLoginController::class, 'login'])->name('login');

Route::get('ZXCcxz123654/register', [AdmRegisterController::class, 'getRegister'])->name('getRegister');

Route::post('ZXCcxz123654/register', [AdmRegisterController::class, 'register'])->name('register');


Route::get('/users', function () {
    $users = DB::table('users')->get();
    return view('users', compact('users'));
});

Route::post('/github-webhook', function(){
	return "ok";
});

Route::get('/', [LandingController::class, 'index'])->name('landingPage');

Route::group(array('prefix' => 'comics'), function () {
    Route::get('/content/search', [ComicController::class, 'searchByhashTag'])->name('search');
    Route::get('/content/keywork/{hashtag}', [ComicController::class, 'searchByhashTag'])->name('searchByhashTag');
    Route::get('/viewer/{slug1}-{comic_code}/chapter/{slug2}-{id}', [ChapterController::class, 'show'])
        ->where('slug1', '[a-zA-Z0-9-_]+')
        ->where('slug2', '[a-zA-Z0-9-_]+')
        ->where('comic_code', 'COMIC-[0-9]+')
        ->where('id', '[0-9]+')
        ->name('view-comic')->middleware('viewed');
    Route::get('/content/{slug}-{comic_code}', [ComicController::class, 'show'])
        ->where('slug', '[a-zA-Z0-9-_]+')
        ->where('comic_code', 'COMIC-[0-9]+')
        ->name('comic-info')->middleware('viewed');


    Route::get('/api', [FrontendChapterController::class, 'show'])->name('show');
});

Route::group(array('prefix' => 'ajax','as'=>'ajax.'), function () {
    Route::group(array('prefix' => 'comics','as' => 'comics.'), function () {
        Route::group(array('prefix' => '{comic_code}/chapters','as' => 'chapters.'), function () {
            Route::get('/{id}', [FrontendChapterController::class, 'show'])->name('show');
        });
    });

});

Route::group(array('prefix' => 'ajax','as'=>'ajax.'), function () {
    Route::group(array('prefix' => 'admin','as'=>'admin.'), function () {
        Route::group(array('prefix' => 'comics','as' => 'comics.'), function () {
            Route::group(array('prefix' => '{comic_code}/hashtags','as' => 'hashtags.'), function () {
                Route::get('/{id}', [AjaxAdmHashtagController::class, 'update'])->name('patch');
            });
        });

    });
});



Route::group(array('prefix' => 'admin','middleware' => 'auth'), function () {
    Route::get('/dashboard', [AdmLandingController::class, 'index'])->name('dashboard');
    Route::group(array('prefix' => 'comics','as' => 'comics.'), function () {
        Route::get('/', [AdmComicController::class, 'index'])->name('list');
        Route::get('/create', [AdmComicController::class, 'create'])->name('create');
        Route::get('/edit/{code}', [AdmComicController::class, 'edit'])->name('edit');
        Route::get('/{code}', [AdmComicController::class, 'show']);
        Route::patch('/{code}', [AdmComicController::class, 'update'])->name('patch');
        Route::post('/', [AdmComicController::class, 'store'])->name('store');
        Route::delete('/{code}', [AdmComicController::class, 'destroy'])->name('delete');

        Route::group(array('prefix' => '{comic_code}/chapters','as' => 'chapters.'), function () {
            Route::get('/', [AdmChapterController::class, 'index'])->name('list');
            Route::get('/create', [AdmChapterController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [AdmChapterController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [AdmChapterController::class, 'update'])->name('patch');
            Route::get('/{id}', [AdmChapterController::class, 'show']);
            Route::post('/', [AdmChapterController::class, 'store'])->name('store');
            Route::delete('/{id}', [AdmChapterController::class, 'destroy'])->name('delete');
        });
    });
    Route::group(array('prefix' => 'hashtags','as' => 'hashtags.'), function () {
        Route::get('/', [AdmHashtagController::class, 'index'])->name('list');
        Route::get('/create', [AdmHashtagController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [AdmHashtagController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [AdmHashtagController::class, 'update'])->name('patch');
        Route::get('/{id}', [AdmHashtagController::class, 'show']);
        Route::post('/', [AdmHashtagController::class, 'store'])->name('store');
        Route::delete('/{id}', [AdmHashtagController::class, 'destroy'])->name('delete');
    });


});
