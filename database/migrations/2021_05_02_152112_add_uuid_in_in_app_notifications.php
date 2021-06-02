<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUuidInInAppNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('in_app_notifications', function (Blueprint $table) {
            $table->string('element_uuid', 64)->nullable()->default(null)->after('element_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('in_app_notifications', function (Blueprint $table) {
            //
        });
    }
}
