<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Output\ConsoleOutput;

class UpdateTableRowFormat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $items = Schema::getAllTables();
        $tables = [];

        foreach ($items as $item) {
            $dbName = config('database.connections.mysql.database');
            $field = 'Tables_in_'.$dbName;
            $tables[] = $item->$field;
        }

        $output = new ConsoleOutput();
        $output->writeLn(' ROW_FORMAT = DYNAMIC');
        foreach ($tables as $table) {
            DB::statement('ALTER TABLE `'.$table.'` ENGINE = InnoDB');
            DB::statement('ALTER TABLE `'.$table.'` ROW_FORMAT = DYNAMIC');
            $output->writeln($table);
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
