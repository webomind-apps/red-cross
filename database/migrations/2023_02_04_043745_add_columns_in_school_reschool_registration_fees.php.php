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
            $table->string('invoice_pdf_path')->after('order_id')->nullable();        
            $table->string('thankyou_pdf_path')->after('invoice_pdf_path')->nullable();        
        });

        Schema::table('college_registration_fees', function (Blueprint $table) {
            $table->string('invoice_pdf_path')->after('order_id')->nullable();        
            $table->string('thankyou_pdf_path')->after('invoice_pdf_path')->nullable();        
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
            $table->dropColumn('invoice_pdf_path');   
            $table->dropColumn('thankyou_pdf_path');   
        });

        Schema::table('college_registration_fees', function (Blueprint $table) {
            $table->dropColumn('invoice_pdf_path');   
            $table->dropColumn('thankyou_pdf_path');   
        });
    }
};
