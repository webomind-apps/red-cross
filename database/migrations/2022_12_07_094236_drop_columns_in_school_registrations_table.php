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
            $table->dropColumn('dise_code');
            $table->dropColumn('school_name');
            $table->dropColumn('district');
            $table->dropColumn('taluk');
            $table->dropColumn('pin_code');
            $table->dropColumn('phone_number');
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('councellor_name');
            $table->dropColumn('councellor_email');
            $table->dropColumn('councellor_phone');
            $table->foreignId('year_id')->nullable()->after('id')->constrained('financial_years')->onDelete('cascade');
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
            $table->string('dise_code');
            $table->string('school_name');
            $table->string('district');
            $table->string('taluk');
            $table->bigInteger('pin_code');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->string('councellor_name');
            $table->string('councellor_email');
            $table->string('councellor_phone');
            $table->dropColumn('year_id');
        });
    }
};
