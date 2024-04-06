<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hashtags', function (Blueprint $table) {
            $table->text('slug')->nullable()->after('name');
//            $table->renameColumn('link_bg_color','bg_color');
        });
    }

    public function down(): void
    {
        $this->dropColumnIfExists('hashtags','slug');

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
