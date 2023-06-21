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
        Schema::create('college_registration_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_registration_id')->nullable()->constrained('college_registrations')->onDelete('cascade');
            $table->foreignId('year_id')->nullable()->constrained('financial_years')->onDelete('cascade');
            $table->foreignId('college_id')->nullable()->constrained('college_data')->onDelete('cascade');
            $table->bigInteger('total_fees');
            $table->bigInteger('paid_amount');
            $table->bigInteger('balance_amount');
            $table->bigInteger('previous_financial_year');
            $table->string('razor_payment_id');
            $table->string('order_id');
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
        Schema::dropIfExists('college_registration_fees');
    }
};
