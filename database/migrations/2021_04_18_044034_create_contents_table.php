<?php
/** @noinspection DuplicatedCode */

use App\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Note: Skip if the table exists
        if (Schema::hasTable('contents')) {
            return;
        }
        /*
         * Create schema
         */
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 100)->nullable()->default(null);

            /******* Custom columns **********/
            $table->string('key', 100)->nullable()->default(null);
            $table->text('title')->nullable()->default(null);
            $table->longText('body')->nullable()->default(null);
            $table->longText('parts')->nullable()->default(null)->comment('JSON structure for additional dynamic parts');
            $table->text('help_text')->nullable()->default(null)->comment('Hint for how/where this is used');
            $table->text('tags')->nullable()->default(null)->comment('tags/spreadable');
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
        $name = 'contents';

        $module = Module::firstOrNew(['name' => $name]);

        $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));        // Todo: Give a human friendly name
        $module->module_group_id = 1;                                                 // Todo: Are you sure you want to put this in default module-group
        $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name)); // Todo: human friendly name.
        $module->module_table = 'contents';
        $module->route_path = 'contents';
        $module->route_name = 'contents';
        $module->class_directory = 'app/Mainframe/Modules/Contents';
        $module->namespace = '\App\Mainframe\Modules\Contents';
        $module->model = '\App\Mainframe\Modules\Contents\Content';
        $module->policy = '\App\Mainframe\Modules\Contents\ContentPolicy';
        $module->processor = '\App\Mainframe\Modules\Contents\ContentProcessor';
        $module->controller = '\App\Mainframe\Modules\Contents\ContentController';
        $module->view_directory = 'mainframe.modules.contents';
        $module->is_visible = 1;
        $module->is_active = 1;
        $module->created_by = 1;

        $module->save();

        Artisan::call('cache:clear');
        Artisan::call('mainframe:create-root-models');

        /*---------------------------------
        | Sample data
        |---------------------------------*/
        DB::table('contents')->insert([
            "id" => 1,
            "uuid" => "7bcb29b9-9d47-45e1-9dba-613c77a04940",
            "name" => "Sample Content",
            "key" => "sample-content",
            "title" => "{SALUTATION} Sample content for testing",
            "body" => "{INTRO} \r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur",
            "parts" => "[{\"title\":\"subtitle\",\"content\":\"{SUBTITLE_START} illum qui dolorem eum fugiat quo voluptas nulla pariatur  check\",\"name\":\"subtitle\"},{\"title\":\"footer\",\"content\":\"{FOOTER}\",\"name\":\"footer\"}]",
            "help_text" => null,
            "tags" => "lets,test,tags",
            "is_active" => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
