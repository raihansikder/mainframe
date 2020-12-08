<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrimaryKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->bigIncrements('id')->first();
        });
        Schema::table('user_group', function (Blueprint $table) {
            $table->bigIncrements('id')->first();
        });
        Schema::table('telescope_monitoring', function (Blueprint $table) {
            $table->bigIncrements('id')->first();
        });
        Schema::table('telescope_entries_tags', function (Blueprint $table) {
            $table->bigIncrements('id')->first();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
