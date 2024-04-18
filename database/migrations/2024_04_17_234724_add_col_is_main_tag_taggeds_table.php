<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('taggeds', function (Blueprint $table) {
            $table->boolean('is_main_tag')->nullable()->after('hashtag_id');
        });
    }

    public function down(): void
    {
        $this->dropColumnIfExists('taggeds','is_main_tag');

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
