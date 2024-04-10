<?php

namespace App\Models;

use App\Services\ContentImageServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends BaseModel
{
    protected $table = "chapters";
    protected $fillable =[

        'prv_chapter_id',
        'next_chapter_id',

        'comic_id',

        'status',
        'chapter_name',
        'chapter_number',
        'publish_at',
        'free_at',
        'link_small_icon',

        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    const TIME = [
        'free_at',
        'publish_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->load('contentImages');
            $contentImageServices = app()->make(ContentImageServices::class);
            if(isset($model->contentImages)){
                foreach ($model->contentImages as $contentImage){
                    $contentImageServices->delete($contentImage->id);
                }
            }
            return true;
        });
    }

    public function comic(){
        return $this->belongsTo(Comic::class,'comic_id');
    }

    public function contentImages(){
        return $this->hasMany(ContentImage::class,"chapter_id",'id');
    }

    public function nextChapter(){
        return $this->belongsTo(Chapter::class,"next_chapter_id");
    }

    public function prvChapter(){
        return $this->belongsTo(Chapter::class,"prv_chapter_id");
    }
}
