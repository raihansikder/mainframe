<?php
/** @noinspection UnknownInspectionInspection */
/** @noinspection DuplicatedCode */

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatehelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Create schema
         */
        Schema::create('helps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 1024)->nullable()->default(null);

            /******* Custom columns **********/
            //$table->string('title', 100)->nullable()->default(null);
            //$table->text('somecolumnsname')->nullable()->default(null);
            /*********************************/

            $table->tinyInteger('is_active')->nullable()->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
        });

        /*
         * Insert into modules table
         */
        $name = 'helps';
        if (Module::where('name', $name)->doesntExist()) {
            $module = new Module(['name' => $name]);

            $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));
            $module->module_group_id = 1;
            $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name));

            $module->module_table = 'helps';
            $module->route_path = 'helps';
            $module->route_name = 'helps';
            $module->class_directory = 'help';
            $module->namespace = 'help';
            $module->model = 'help\help';
            $module->policy = 'help\helpPolicy';
            $module->processor = 'help\helpProcessor';
            $module->controller = 'help\helpController';
            $module->view_directory = 'help';

            $module->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('helps');
    }
}
