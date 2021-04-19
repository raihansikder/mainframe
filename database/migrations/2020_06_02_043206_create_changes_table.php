<?php
/** @noinspection DuplicatedCode */

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class CreateChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Note: Skip if the table exists
        if (Schema::hasTable('changes')) {
            return;
        }
        /*
         * Create schema
         */
        Schema::create('changes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 512)->nullable()->default(null);

            /******* Custom columns **********/
            $table->unsignedBigInteger('changeable_id')->nullable()->default(null);
            $table->text('changeable_type')->nullable()->default(null);
            $table->unsignedBigInteger('module_id')->nullable()->default(null);
            $table->unsignedBigInteger('element_id')->nullable()->default(null);
            $table->string('element_uuid', 64)->nullable()->default(null);

            $table->string('field', 128)->nullable()->default(null);
            $table->text('old')->nullable()->default(null);
            $table->text('new')->nullable()->default(null);
            $table->text('note')->nullable()->default(null);
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
        $name = 'changes';
        if (Module::where('name', $name)->doesntExist()) {
            $module = new Module(['name' => $name]);

            $module->title           = str_replace('-', ' ', ucfirst(Str::singular($name)));
            $module->module_group_id = 1;
            $module->description     = 'Manage '.str_replace('-', ' ', Str::singular($name));
            $module->module_table    = 'changes';
            $module->route_path      = 'changes';
            $module->route_name      = 'changes';
            $module->class_directory = 'app/Mainframe/Modules/Changes';
            $module->namespace       = '\App\Mainframe\Modules\Changes';
            $module->model           = '\App\Mainframe\Modules\Changes\Change';
            $module->policy          = '\App\Mainframe\Modules\Changes\ChangePolicy';
            $module->processor       = '\App\Mainframe\Modules\Changes\ChangeProcessor';
            $module->controller      = '\App\Mainframe\Modules\Changes\ChangeController';
            $module->view_directory  = 'mainframe.modules.changes';
            $module->is_visible      = 1;
            $module->created_by      = 1;

            $module->save();
        }

        Artisan::call('cache:clear');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('changes');
    }
}
