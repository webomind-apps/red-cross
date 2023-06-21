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
        Schema::table('master_prices', function (Blueprint $table) {
            $table->decimal('convenience_college',15,2)->unsigned()->default(0)->after('convenience');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_prices', function (Blueprint $table) {
            //
        });
    }
};
