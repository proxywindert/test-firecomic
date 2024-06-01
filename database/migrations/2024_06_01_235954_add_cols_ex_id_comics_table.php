<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->string('link_banner_backup')->nullable()->after('link_banner');
            $table->string('link_bg_backup')->nullable()->after('link_bg');
            $table->string('link_avatar_backup')->nullable()->after('link_avatar');
            $table->string('link_comic_name_backup')->nullable()->after('link_comic_name');
            $table->string('link_comic_small_name_backup')->nullable()->after('link_comic_small_name');
        });
    }

    public function down(): void
    {
        $this->dropColumnIfExists('comics','link_banner_backup');

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
