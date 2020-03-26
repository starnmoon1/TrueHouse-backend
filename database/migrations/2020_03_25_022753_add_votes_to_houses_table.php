<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->longText('description')->change();
            $table->string('status')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voidphp artisan migrate --force
     */
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->string('description')->change();
            $table->boolean('status')->change();
        });
    }
}
