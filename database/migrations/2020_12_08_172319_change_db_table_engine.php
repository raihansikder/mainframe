<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDbTableEngine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $items = Schema::getAllTables();

        foreach ($items as $item) {
            $dbName = config('database.connections.mysql.database');
            $field = 'Tables_in_'.$dbName;
            $table = $item->$field;

            DB::statement('ALTER TABLE ' . $table . ' ENGINE = InnoDB');
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
