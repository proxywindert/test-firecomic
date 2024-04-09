<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->bigInteger('genre_id')->nullable()->change();
            $table->bigInteger('artist_id')->nullable()->change();
            $table->bigInteger('author_id')->nullable()->change();
            $table->bigInteger('publisher_id')->nullable()->change();
            $table->string('link_bg_color')->nullable()->change();
            $table->string('link_avatar')->nullable()->change();
            $table->string('link_comic_name')->nullable()->change();
            $table->string('tranfer_color')->nullable()->change();
            $table->integer('total_view')->default(0)->change();
            $table->integer('total_like')->default(0)->change();
        });
    }

    public function down(): void
    {
//        $this->dropColumnIfExists('comics','slug');

    }

    function dropColumnIfExists($myTable, $column)
    {
        if (Schema::hasColumn($myTable, $column)) //check the column
        {
            Schema::table($myTable, function (Blueprint $table) use ($column)
            {
                $table->dropColumn($column); //drop it
            });
        }

    }
};
