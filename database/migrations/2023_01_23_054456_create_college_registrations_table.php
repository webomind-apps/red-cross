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
        Schema::create('college_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')->nullable()->constrained('financial_years')->onDelete('cascade');
            $table->foreignId('college_id')->nullable()->constrained('college_data')->onDelete('cascade');
            $table->bigInteger('no_of_students_in_first_puc');
            $table->bigInteger('no_of_students_in_second_puc');
            $table->bigInteger('total_students');
            $table->bigInteger('college_registration_annual_fee');
            $table->bigInteger('college_student_membership_fee');
            $table->bigInteger('no_of_students_paid');
            $table->bigInteger('total');
            $table->bigInteger('convenience');
            $table->bigInteger('total_to_be_paid');
            $table->string('mode_of_payment')->nullable();
            $table->string('payment_detail')->nullable();
            $table->string('transaction_date')->nullable();
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
        Schema::dropIfExists('college_registrations');
    }
};
