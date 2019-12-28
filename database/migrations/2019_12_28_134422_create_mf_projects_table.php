<?php
/** @noinspection UnknownInspectionInspection */

/** @noinspection DuplicatedCode */

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMfProjectsTable extends Migration
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
        Schema::create('mf_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            // $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('code', 36)->nullable()->default(null);
            $table->string('name', 1024)->nullable()->default(null);

            /******* Custom columns **********/
            $table->text('description')->nullable()->default(null);
            $table->text('configuration')->nullable()->default(null)->comment('JSON configuration for a project');
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
        $name = 'mf-projects';
        if (Module::where('name', $name)->doesntExist()) {
            $module = new Module(['name' => $name]);

            $classPath = '\App\Mainframe\Modules\\'.$module->modelClassNamePlural();

            $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));
            $module->module_group_id = 1;
            $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name));
            $module->model = $classPath.'\\'.$module->modelClassName();
            $module->controller = $classPath.'\\'.$module->controllerClassName();

            $module->save();
        }

        /*
         * Add mf_project_id field in all the table.
         */

        $tables = [
            'changes',
            'dolor_sits',
            'groups',
            'lorem_ipsums',
            'product_categories',
            'product_themes',
            'reports',
            'subscriptions',
            'tenants',
            'uploads',
            'users',
        ];
        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->unsignedInteger('mf_project_id')->nullable()->default(null)->after('uuid');
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
        Schema::dropIfExists('mf_projects');
    }
}
