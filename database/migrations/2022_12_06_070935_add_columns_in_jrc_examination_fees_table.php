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
        Schema::table('jrc_examination_fees', function (Blueprint $table) {
            $table->string('mode_of_payment')->after('total_to_be_paid')->nullable();
            $table->string('payment_method')->after('mode_of_payment')->nullable();
            $table->string('transaction_date')->after('payment_method')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jrc_examination_fees', function (Blueprint $table) {
            $table->dropColumn('mode_of_payment');
            $table->dropColumn('payment_method');
            $table->dropColumn('transaction_date');
        });
    }
};
