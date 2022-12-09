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
        Schema::table('school_registrations', function (Blueprint $table) {
           
            $table->dropColumn('total_fees');
            $table->dropColumn('paid_amount');
            $table->dropColumn('balance_amount');
            $table->dropColumn('total');
            $table->dropColumn('convenience');
            $table->dropColumn('total_to_be_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_registrations', function (Blueprint $table) {
            $table->bigInteger('total_fees');
            $table->bigInteger('paid_amount');
            $table->bigInteger('balance_amount');
            $table->bigInteger('total');
            $table->bigInteger('convenience');
            $table->bigInteger('total_to_be_paid');
        });
    }
};
