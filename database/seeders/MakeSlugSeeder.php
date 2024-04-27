<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Services\ChapterServices;
use App\Services\ComicServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class MakeSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
