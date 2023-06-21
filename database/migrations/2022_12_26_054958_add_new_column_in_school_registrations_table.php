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
            $table->boolean('payment_status')->default(0)->after('transaction_date');
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
            $table->dropColumn('payment_status');
        });
    }
};
