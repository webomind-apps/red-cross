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
            $table->foreignId('year_id')->nullable()->constrained('financial_years')->onDelete('cascade');
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
            $table->dropColumn('year_id');
        });
    }
};
