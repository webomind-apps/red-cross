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
        Schema::create('college_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')->constrained('financial_years')->onDelete('cascade');
            $table->foreignId('college_id')->constrained('college_data')->onDelete('cascade');
            $table->bigInteger('total_amount');
            $table->bigInteger('balance');
            $table->bigInteger('paid_amount');
            $table->bigInteger('amount_to_be_paid');
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
        Schema::dropIfExists('college_balances');
    }
};
