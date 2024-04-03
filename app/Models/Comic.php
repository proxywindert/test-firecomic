<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends BaseModel
{
    protected $table = "comics";
    protected $fillable =[
        'comic_code',
        'comic_name',
        'link_bg_color',
        'link_avatar',
        'link_comic_name',
        'tranfer_color',
        'total_view',
        'total_like',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function chapters(){
        return $this->hasMany(Chapter::class,'comic_id');
    }

    public function hashtags(){
        return $this->belongsToMany(Hashtag::class,'taggeds','comic_id','hashtag_id');
    }

    public function summaryContents(){
        return $this->hasMany(SummaryContent::class,'comic_id');
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
