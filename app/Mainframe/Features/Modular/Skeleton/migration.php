<?php
/** @noinspection DuplicatedCode */

use App\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\ConsoleOutput;

class CreateSuperHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Note: Skip if the table exists
        if (Schema::hasTable('{table}')) {
            return;
        }

        /*---------------------------------
        | Create the table
        |---------------------------------*/
        Schema::create('{table}', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 512)->nullable()->default(null);

            /******* Custom columns **********/
            // Todo: Add module specific fields
            //$table->string('title', 100)->nullable()->default(null);
            //$table->text('field')->nullable()->default(null);
            /*********************************/

            $table->tinyInteger('is_active')->nullable()->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
        });

        /*---------------------------------
        | Update modules table
        |---------------------------------*/
        $name = '{module_name}';

        $module = Module::firstOrNew(['name' => $name]);

        $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));        // Todo: Give a human friendly name
        $module->module_group_id = 1;                                                 // Todo: Are you sure you want to put this in default module-group
        $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name)); // Todo: human friendly name.
        $module->module_table = '{table}';
        $module->route_path = '{route_path}';
        $module->route_name = '{route_name}';
        $module->class_directory = '{class_directory}';
        $module->namespace = '{namespace}';
        $module->model = '{model}';
        $module->policy = '{policy}';
        $module->processor = '{processor}';
        $module->controller = '{controller}';
        $module->view_directory = '{view_directory}';
        $module->icon_css = 'fa fa-ellipsis-v';
        $module->is_visible = 1;
        $module->is_active = 1;
        $module->created_by = 1;

        $module->save();

        $output = new ConsoleOutput();

        $output->writeLn('php artisan cache:clear');
        Artisan::call('cache:clear');

        $output->writeLn('php artisan route:clear');
        Artisan::call('route:clear');

        $output->writeLn('php artisan mainframe:create-root-models');
        Artisan::call('mainframe:create-root-models');

        $output->writeLn('php artisan ide-helper:model -W');
        Artisan::call('ide-helper:model -W');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_heroes');
    }
}
