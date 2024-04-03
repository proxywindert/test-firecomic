<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends BaseModel
{
    protected $table = "hashtags";
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function tagges()
    {
        return $this->hasMany(Tagged::class, 'hashtag_id');
    }

}
