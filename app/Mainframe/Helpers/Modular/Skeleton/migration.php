<?php
/** @noinspection UnknownInspectionInspection */

/** @noinspection DuplicatedCode */

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_heroes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 255)->nullable()->default(null);

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

        $name = 'super-heroes';
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
