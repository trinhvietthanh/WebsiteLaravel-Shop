<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('display_name');
        });
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedTinyInteger('permission_id');
            $table->unsignedTinyInteger('role_id');
            $table->unique(['permission_id', 'role_id']);
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
