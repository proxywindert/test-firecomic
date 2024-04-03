<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagged extends BaseModel
{
    protected $table = "taggeds";
    protected $fillable =[
        'comic_id',
        'hashtag_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function hashTag(){
        return $this->belongsTo(Hashtag::class,'hashtag_id');
    }

    public function comic(){
        return $this->belongsTo(Hashtag::class,'comic_id');
    }

}
