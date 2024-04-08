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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();

            $table->dateTime('publish_at')->nullable();
            $table->dateTime('free_at')->nullable();
            // trang thai free/waiting
            $table->string('status')->default('waiting');
            $table->integer('chapter_number');
            $table->bigInteger('next_chapter_id')->nullable();
            $table->bigInteger('prv_chapter_id')->nullable();

            $table->bigInteger('comic_id');

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
        Schema::dropIfExists('chapters');
    }
};
