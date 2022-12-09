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
            $table->bigInteger('total')->after('no_of_students_paid');
            $table->bigInteger('convenience')->after('total');
            $table->bigInteger('total_to_be_paid')->after('convenience');
            
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
            $table->dropColumn('total');
            $table->dropColumn('convenience');
            $table->dropColumn('total_to_be_paid');
        });
    }
};
