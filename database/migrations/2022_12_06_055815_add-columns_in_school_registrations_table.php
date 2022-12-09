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
            $table->string('mode_of_payment')->after('no_of_students_paid')->nullable();
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
        Schema::table('school_registrations', function (Blueprint $table) {
            $table->dropColumn('mode_of_payment');
            $table->dropColumn('payment_method');
            $table->dropColumn('transaction_date');
        });
    }
};
