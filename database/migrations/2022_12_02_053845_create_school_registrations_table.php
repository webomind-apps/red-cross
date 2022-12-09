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
        Schema::create('school_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('dise_code');
            $table->string('school_name');
            $table->string('district');
            $table->string('taluk');
            $table->bigInteger('pin_code');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->string('councellor_name');
            $table->string('councellor_email');
            $table->string('councellor_phone');
            $table->bigInteger('no_of_students_class_eight');
            $table->bigInteger('no_of_students_class_nine');
            $table->bigInteger('no_of_students_class_ten');
            $table->bigInteger('total_students');
            $table->bigInteger('school_registration_annual_fee');
            $table->bigInteger('school_student_memebership_fee');
            $table->bigInteger('no_of_students_paid');
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
        Schema::dropIfExists('school_registrations');
    }
};
