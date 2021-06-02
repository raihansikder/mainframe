<?php
/** @noinspection DuplicatedCode */

use App\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class CreateSpreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Note: Skip if the table exists
        if (Schema::hasTable('spreads')) {
            return;
        }
        /*
         * Create schema
         */
        Schema::create('spreads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 100)->nullable()->default(null);

            /******* Custom columns **********/
            // Todo: Add module specific fields
            $table->text('spreadable_type')->nullable()->default(null);
            $table->unsignedBigInteger('spreadable_id')->nullable()->default(null);
            $table->unsignedBigInteger('module_id')->nullable()->default(null);
            $table->unsignedBigInteger('element_id')->nullable()->default(null);
            $table->string('element_uuid', 64)->nullable()->default(null);
            $table->string('key', 100)->nullable()->default(null)->comment('Field name '); // Field name
            $table->string('tag', 100)->nullable()->default(null)->comment('Tag name '); // Field name
            $table->text('relates_to')->nullable()->default(null)->comment('The second model');
            $table->unsignedBigInteger('related_id')->nullable()->default(null);
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
        $name = 'spreads';

        $module = Module::firstOrNew(['name' => $name]);

        $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));        // Todo: Give a human friendly name
        $module->module_group_id = 1;                                                 // Todo: Are you sure you want to put this in default module-group
        $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name)); // Todo: human friendly name.
        $module->module_table = 'spreads';
        $module->route_path = 'spreads';
        $module->route_name = 'spreads';
        $module->class_directory = 'app/Mainframe/Modules/Spreads';
        $module->namespace = '\App\Mainframe\Modules\Spreads';
        $module->model = '\App\Mainframe\Modules\Spreads\Spread';
        $module->policy = '\App\Mainframe\Modules\Spreads\SpreadPolicy';
        $module->processor = '\App\Mainframe\Modules\Spreads\SpreadProcessor';
        $module->controller = '\App\Mainframe\Modules\Spreads\SpreadController';
        $module->view_directory = 'mainframe.modules.spreads';
        $module->is_visible = 0;
        $module->is_active = 1;
        $module->created_by = 1;

        $module->save();

        Artisan::call('cache:clear');
        Artisan::call('mainframe:create-root-models');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spreads');
    }
}
