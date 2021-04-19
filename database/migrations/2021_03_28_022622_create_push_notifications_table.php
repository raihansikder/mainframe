<?php

use App\Mainframe\Modules\Modules\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class CreatePushNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Note: Skip if the table exists
        if (Schema::hasTable('push_notifications')) {
            return;
        }
        /*
         * Create schema
         */
        Schema::create('push_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 512)->nullable()->default(null);

            /******* Custom columns **********/
            $table->unsignedInteger('user_id')->nullable()->default(null)->comment('Recipient user id');
            $table->text('device_token')->nullable()->default(null)->comment('Firebase Device Identifier to target a user');
            $table->unsignedInteger('in_app_notification_id')->nullable()->default(null)->comment('Related in-app notification');

            // Content
            $table->unsignedInteger('order')->nullable()->default(9999)->comment('Can be used for ordering/sequencing sending');
            $table->string('type', 100)->nullable()->default('Generic')
                ->comment('Generic|Popup Type indicates the purpose or objective. It is often mapped with a paired in-app notification\'');
            $table->string('event', 100)->nullable()->default(null)->comment('Name of the event i.e. "appointment.created"');

            $table->text('body')->nullable()->default(null)->comment('Main body of the notification');
            $table->text('data')->nullable()->default(null)->comment('Additional JSON payload');

            // Responses
            $table->text('api_response')->nullable()->default(null)->comment('Full JSON response from the sender service');
            $table->text('multicast_id')->nullable()->default(null)
                ->comment('Set from FCM response of send attempt. The existence of multicast_id indicates that attempt was successfully made. Fill from api_response');
            $table->integer('success_count')->nullable()->default(0)->comment('Fill from api_response');
            $table->integer('failure_count')->nullable()->default(0)->comment('Fill from api_response');
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
        $name = 'push-notifications';
        if (Module::where('name', $name)->doesntExist()) {
            $module = new Module(['name' => $name]);

            $module->title = str_replace('-', ' ', ucfirst(Str::singular($name)));
            $module->module_group_id = 1;
            $module->description = 'Manage '.str_replace('-', ' ', Str::singular($name));
            $module->module_table = 'push_notifications';
            $module->route_path = 'push-notifications';
            $module->route_name = 'push-notifications';
            $module->class_directory = 'app/Mainframe/Modules/PushNotifications';
            $module->namespace = '\App\Mainframe\Modules\PushNotifications';
            $module->model = '\App\Mainframe\Modules\PushNotifications\PushNotification';
            $module->policy = '\App\Mainframe\Modules\PushNotifications\PushNotificationPolicy';
            $module->processor = '\App\Mainframe\Modules\PushNotifications\PushNotificationProcessor';
            $module->controller = '\App\Mainframe\Modules\PushNotifications\PushNotificationController';
            $module->view_directory = 'mainframe.modules.push-notifications';
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
        Schema::dropIfExists('push_notifications');
    }
}
