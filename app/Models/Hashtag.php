<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Hashtag extends BaseModel
{
    use HasSlug;
    protected $table = "hashtags";
    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function tagges()
    {
        return $this->hasMany(Tagged::class, 'hashtag_id');
    }

    public function getSlugOptions() :  SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

}
