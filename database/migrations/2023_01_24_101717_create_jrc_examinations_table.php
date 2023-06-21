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
        Schema::create('jrc_examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')->nullable()->constrained('financial_years')->onDelete('cascade');
            $table->foreignId('school_id')->nullable()->constrained('school_data')->onDelete('cascade');
            $table->bigInteger('total_no_of_students');
            $table->bigInteger('jrc_examination_fee');
            $table->bigInteger('total_fee_amount');
            $table->bigInteger('no_of_students_buying_book');
            $table->bigInteger('book_fee');
            $table->bigInteger('total_book_fee');
            $table->bigInteger('total');
            $table->bigInteger('convenience');
            $table->bigInteger('total_to_be_paid');
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
        Schema::dropIfExists('jrc_examinations');
    }
};
