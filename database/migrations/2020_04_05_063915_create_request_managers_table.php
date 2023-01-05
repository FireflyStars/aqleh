<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_managers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->bigInteger('assigned_id');
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('role')->nullable();
            $table->string('role_ar')->nullable();
            $table->string('email')->nullable();
            $table->string('img_path')->nullable();
            $table->string('img_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_managers');
    }
}
