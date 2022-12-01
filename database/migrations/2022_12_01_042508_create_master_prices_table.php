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
        Schema::create('master_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('school_registration_annual_fee');
            $table->bigInteger('school_student_memebership_fee');
            $table->bigInteger('college_registration_annual_fee');
            $table->bigInteger('college_student_membership_fee');
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
        Schema::dropIfExists('master_prices');
    }
};
