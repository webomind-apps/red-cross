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
        Schema::create('college_data', function (Blueprint $table) {
            $table->id();
            $table->string('dise_code');
            $table->string('college_name');
            $table->string('district');
            $table->string('taluk');
            $table->bigInteger('pin_code');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('councellor_name')->nullable();
            $table->string('councellor_phone')->nullable();
            $table->string('councellor_email')->nullable();
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
        Schema::dropIfExists('college_data');
    }
};
