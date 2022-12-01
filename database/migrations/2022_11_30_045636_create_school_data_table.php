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
        Schema::create('school_data', function (Blueprint $table) {
            $table->id();
            $table->string('dise_code');
            $table->string('school_name');
            $table->string('district');
            $table->string('taluk');
            $table->bigInteger('pin_code');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('councellor_name');
            $table->string('councellor_phone');
            $table->string('councellor_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_data');
    }
};
