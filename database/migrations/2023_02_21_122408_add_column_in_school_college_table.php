<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_data', function (Blueprint $table) {
            $table->tinyInteger('school_type')->after('dise_code');
        });
        Schema::table('college_data', function (Blueprint $table) {
            $table->tinyInteger('college_type')->after('dise_code');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_data', function (Blueprint $table) {
           $table->dropColumn('school_type');
        });
        Schema::table('college_data', function (Blueprint $table) {
            $table->dropColumn('college_type');
        });
    }
};
