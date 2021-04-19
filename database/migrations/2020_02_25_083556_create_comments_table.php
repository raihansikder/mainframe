<?php /** @noinspection ClassConstantCanBeUsedInspection */
/** @noinspection UnknownInspectionInspection */

/** @noinspection DuplicatedCode */

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Note: Skip if the table exists
        if (Schema::hasTable('comments')) {
            return;
        }
        /*
         * Create schema
         */
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 1024)->nullable()->default(null);

            /******* Custom columns **********/
            // Todo: Add module specific fields
            $table->string('type', 100)->nullable()->default(null);
            $table->text('body')->nullable()->default(null);
            $table->text('commentable_type')->nullable()->default(null);
            $table->unsignedBigInteger('commentable_id')->nullable()->default(null);
            $table->unsignedBigInteger('module_id')->nullable()->default(null);
            $table->unsignedBigInteger('element_id')->nullable()->default(null);
            $table->string('element_uuid', 64)->nullable()->default(null);
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
        $name = 'comments';
        if (Module::where('name', $name)->doesntExist()) {
            $module = new Module(['name' => $name]);

            $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));        // Todo: Give a human friendly name
            $module->module_group_id = 1;                                                 // Todo: Are you sure you want to put this in default module-group
            $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name)); // Todo: human friendly name.
            $module->module_table = 'comments';
            $module->route_path = 'comments';
            $module->route_name = 'comments';
            $module->class_directory = 'app/Mainframe/Modules/Comments';
            $module->namespace = '\App\Mainframe\Modules\Comments';
            $module->model = '\App\Mainframe\Modules\Comments\Comment';
            $module->policy = '\App\Mainframe\Modules\Comments\CommentPolicy';
            $module->processor = '\App\Mainframe\Modules\Comments\CommentProcessor';
            $module->controller = '\App\Mainframe\Modules\Comments\CommentController';
            $module->view_directory = 'mainframe.modules.comments';
            $module->is_visible = 1;
            $module->created_by = 1;

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
        Schema::dropIfExists('comments');
    }
}
