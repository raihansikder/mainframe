<?php
use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
         * Insert into modules table
         */
        $name = 'settings';
        /** @var Module $module */
        $module = Module::where('name', $name)->first();

        $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));
        $module->module_group_id = 1;
        $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name));
        $module->module_table = 'settings';
        $module->route_path = 'settings';
        $module->route_name = 'settings';
        $module->class_directory = 'app/Projects/MyProject/Modules/Settings';
        $module->namespace = '\App\Projects\MyProject\Modules\Settings';
        $module->model = '\App\Projects\MyProject\Modules\Settings\Setting';
        $module->policy = '\App\Projects\MyProject\Modules\Settings\SettingPolicy';
        $module->processor = '\App\Projects\MyProject\Modules\Settings\SettingProcessor';
        $module->controller = '\App\Projects\MyProject\Modules\Settings\SettingController';
        $module->view_directory = 'projects.my-project.modules.settings';
        $module->is_visible = 1;
        $module->is_active = 1;
        $module->created_by = 1;

        $module->save();

        Artisan::call('cache:clear');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
