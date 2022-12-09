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
        Schema::create('school_registration_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_registration_id')->constrained('school_registrations')->onDelete('cascade');
            $table->bigInteger('total_fees');
            $table->bigInteger('paid_amount');
            $table->bigInteger('balance_amount');
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
        Schema::dropIfExists('school_registration_fees');
    }
};
