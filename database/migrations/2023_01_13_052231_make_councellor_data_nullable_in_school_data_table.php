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
            $table->string('councellor_name')->nullable()->change();
            $table->string('councellor_phone')->nullable()->change();
            $table->string('councellor_email')->nullable()->change();
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
            //
        });
    }
};
