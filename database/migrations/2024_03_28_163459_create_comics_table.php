<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('comic_code')->unique();
            $table->string('comic_name');
            $table->string('link_bg_color');
            $table->string('link_avatar');
            $table->string('link_comic_name');
            $table->string('tranfer_color');

            $table->integer('total_view');
            $table->integer('total_like');

            $table->bigInteger('genre_id');
            $table->bigInteger('artist_id');
            $table->bigInteger('author_id');
            $table->bigInteger('publisher_id');

            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
