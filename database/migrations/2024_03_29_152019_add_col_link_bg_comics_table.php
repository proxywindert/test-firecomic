<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->string('link_bg')->nullable()->after('tranfer_color');
//            $table->renameColumn('link_bg_color','bg_color');
        });
    }

    public function down(): void
    {
        $this->dropColumnIfExists('comics','link_bg');

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
