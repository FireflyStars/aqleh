<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();
            
            $table->string('page_url')->nullable();
            $table->string('page_url_ar')->nullable();

            $table->string('img_alt')->nullable();
            $table->string('img_alt_ar')->nullable();
            
            $table->tinyInteger('status')->nullable();
            
            $table->text('desc')->nullable();
            $table->text('desc_ar')->nullable();
            
            $table->string('meta_title')->nullable();
            $table->string('meta_keys')->nullable();
            $table->text('meta_desc')->nullable();
            
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
        Schema::dropIfExists('projects');
    }
}
