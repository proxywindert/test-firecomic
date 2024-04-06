<?php

namespace App\Models;

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

        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
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
