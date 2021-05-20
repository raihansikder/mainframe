<?php
/** @noinspection DuplicatedCode */

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class CreateInAppNotificationsTableMf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Note: Skip if the table exists
        if (Schema::hasTable('in_app_notifications')) {
            return;
        }
        /*
         * Create schema
         */
        Schema::create('in_app_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 512)->nullable()->default(null);

            /******* Custom columns **********/
            $table->string('notifiable_type', 255)->nullable()->default(null)->comment('Class of the notifiable');
            $table->unsignedInteger('notifiable_id')->nullable()->default(null);
            $table->unsignedInteger('module_id')->nullable()->default(null);
            $table->unsignedInteger('element_id')->nullable()->default(null);
            $table->string('element_uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('user_id')->nullable()->default(null)->comment('Recipient user id');
            $table->string('type', 100)->nullable()->default('Generic')->comment('Generic|Popup');
            $table->string('event', 100)->nullable()->default(null)->comment('Name of the event i.e. "appointment.created"');
            $table->text('subtitle')->nullable()->default(null)->comment('Subtitle the notification');
            $table->text('body')->nullable()->default(null)->comment('Main body of the notification');
            $table->text('images')->nullable()->default(null)->comment('JSON array of image URLs');
            $table->text('data')->nullable()->default(null)->comment('Additional JSON payload');
            $table->unsignedInteger('order')->nullable()->default(9999)->comment('Can be useful for sequencing if needed');
            $table->tinyInteger('is_visible')->nullable()->default(1)->comment('Flag to indicate whether this entry should be visible in the user notification list');
            $table->unsignedInteger('announcement_id')->nullable()->default(null)->comment('Announcement id from which it is generated');
            $table->tinyInteger('accepts_response')->nullable()->default(0)->comment('Flag to indicate whether user can respond to this notification');
            $table->text('response_options')->nullable()->default(null)->comment('JSON to show response options');
            $table->text('response')->nullable()->default(null)->comment('Capture user response to an announcement');
            $table->dateTime('responded_at')->nullable()->default(null)->comment('Capture user response datetime');
            $table->dateTime('read_at')->nullable()->default(null)->comment('Set the time stamp when a user "marks as read"');
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
        $name = 'in-app-notifications';
        if (Module::where('name', $name)->doesntExist()) {
            $module = new Module(['name' => $name]);

            $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));        // Todo: Give a human friendly name
            $module->module_group_id = 1;                                                 // Todo: Are you sure you want to put this in default module-group
            $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name)); // Todo: human friendly name.
            $module->module_table = 'in_app_notifications';
            $module->route_path = 'in-app-notifications';
            $module->route_name = 'in-app-notifications';
            $module->class_directory = 'app/Mainframe/Modules/InAppNotifications';
            $module->namespace = '\App\Mainframe\Modules\InAppNotifications';
            $module->model = '\App\Mainframe\Modules\InAppNotifications\InAppNotification';
            $module->policy = '\App\Mainframe\Modules\InAppNotifications\InAppNotificationPolicy';
            $module->processor = '\App\Mainframe\Modules\InAppNotifications\InAppNotificationProcessor';
            $module->controller = '\App\Mainframe\Modules\InAppNotifications\InAppNotificationController';
            $module->view_directory = 'mainframe.modules.in-app-notifications';
            $module->is_visible = 1;
            $module->is_active = 1;
            $module->created_by = 1;

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
        Schema::dropIfExists('in_app_notifications');
    }
}
