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
        Schema::table('school_registration_fees', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('convenience');
            $table->dropColumn('total_to_be_paid');
            $table->dropColumn('current_financial_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_registration_fees', function (Blueprint $table) {
            $table->bigInteger('total');
            $table->bigInteger('convenience');
            $table->bigInteger('total_to_be_paid');
            $table->bigInteger('current_financial_year');
        });
    }
};
