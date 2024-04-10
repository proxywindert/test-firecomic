<?php

namespace App\Models;

use App\Services\ChapterServices;
use App\Services\HashtagServices;
use App\Services\TaggedServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends BaseModel
{
    protected $table = "comics";
    protected $fillable =[
        'comic_code',
        'comic_name',
        'bg_color',
        'link_banner',
        'ggdrive_id',
        'link_bg',
        'link_avatar',
        'link_comic_name',
        'link_comic_small_name',
        'tranfer_color',
        'total_view',
        'total_like',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    const TIME = [
        'application_date',
        'attendance_start_at',
        'attendance_end_at',
        'approved_at'
    ];
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->load('chapters','taggeds');
            $chapterServices = app()->make(ChapterServices::class);
            $taggedsServices = app()->make(TaggedServices::class);
            if(isset($model->chapters)){
                foreach ($model->chapters as $chapter){
                    $chapterServices->delete($chapter->id);
                }
            }
            if(isset($model->taggeds)){
                foreach ($model->taggeds as $tagged){
                    $taggedsServices->delete($tagged->id);
                }
            }

            $model->summaryContents()->delete();
            return true;
        });
    }

    public function chapters(){
        return $this->hasMany(Chapter::class,'comic_id');
    }

    public function taggeds(){
        return $this->hasMany(Tagged::class,'comic_id');
    }

    public function hashtags(){
        return $this->belongsToMany(Hashtag::class,'taggeds','comic_id','hashtag_id');
    }

    public function summaryContents(){
        return $this->hasOne(SummaryContent::class,'comic_id');
    }

    public function artist(){
        return $this->belongsTo(Artist::class,'artist_id');
    }

    public function author(){
        return $this->belongsTo(Author::class,'author_id');
    }

    public function publisher(){
        return $this->belongsTo(Author::class,'publisher_id');
    }

    public function genre(){
        return $this->belongsTo(Author::class,'genre_id');
    }
}
