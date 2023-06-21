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
        Schema::table('admin_users', function (Blueprint $table) {
            $table->boolean('admin_type')->after('admin_emails');        
        });
        
        Schema::table('email_templates', function (Blueprint $table) {
            $table->text('emails_to')->nullable()->change();        
        });

        Schema::table('jrc_examination_fees', function (Blueprint $table) {
            $table->foreignId('year_id')->nullable()->after('transaction_date')->constrained('financial_years')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->dropColumn('admin_type');   
        });

        Schema::table('jrc_examination_fees', function (Blueprint $table) {
            $table->dropColumn('year_id');        
        });
    }
};

