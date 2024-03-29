<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('content_images', function (Blueprint $table) {
            $table->bigInteger('chapter_id')->nullable()->after('link_img');;
        });
    }

    public function down(): void
    {
        $this->dropColumnIfExists('content_images','chapter_id');

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
