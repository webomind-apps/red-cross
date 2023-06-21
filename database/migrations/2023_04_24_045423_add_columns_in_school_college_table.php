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
            $table->string('receipt_no')->after('id')->nullable();  
        });
        Schema::table('college_registration_fees', function (Blueprint $table) {
            $table->string('receipt_no')->after('id')->nullable();  
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
            $table->dropColumn('receipt_no');   
           
        });
        Schema::table('school_registration_fees', function (Blueprint $table) {
            $table->dropColumn('receipt_no');   
             
        });
    }
};
