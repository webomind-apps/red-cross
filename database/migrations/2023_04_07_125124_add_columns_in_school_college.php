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
            $table->string('form_print_pdf')->after('thankyou_pdf_path')->nullable();  
        });
        Schema::table('college_registration_fees', function (Blueprint $table) {
            $table->string('form_print_pdf')->after('thankyou_pdf_path')->nullable();  
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
            $table->dropColumn('form_print_pdf');   
           
        });
        Schema::table('school_registration_fees', function (Blueprint $table) {
            $table->dropColumn('form_print_pdf');   
             
        });
    }
};
