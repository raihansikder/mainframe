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

        if (!Schema::hasColumn('password_resets', 'id')) {
            Schema::table('password_resets', function (Blueprint $table) {
                $table->bigIncrements('id')->first();
            });
        }
        if (!Schema::hasColumn('user_group', 'id')) {
            Schema::table('user_group', function (Blueprint $table) {
                $table->bigIncrements('id')->first();
            });
        }
        if (!Schema::hasColumn('telescope_monitoring', 'id')) {
            Schema::table('telescope_monitoring', function (Blueprint $table) {
                $table->bigIncrements('id')->first();
            });
        }
        if (!Schema::hasColumn('telescope_entries_tags', 'id')) {
            Schema::table('telescope_entries_tags', function (Blueprint $table) {
                $table->bigIncrements('id')->first();
            });
        }
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
