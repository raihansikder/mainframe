<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingMfGenericFieldsInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audits', function (Blueprint $table) {
            $table->string('uuid', 64)->nullable()->default(null)->after('id');
            $table->unsignedInteger('project_id')->nullable()->default(null)->after('uuid');
            $table->unsignedInteger('tenant_id')->nullable()->default(null)->after('project_id');
            $table->string('name', 100)->nullable()->default(null)->after('tenant_id');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable()->default(null)->after('uuid');
            $table->unsignedInteger('tenant_id')->nullable()->default(null)->after('project_id');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable()->default(null)->after('uuid');
            $table->unsignedInteger('tenant_id')->nullable()->default(null)->after('project_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
}
