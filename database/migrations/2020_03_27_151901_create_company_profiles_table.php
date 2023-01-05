<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('desc')->nullable();
            $table->string('desc_ar')->nullable();
            $table->string('page_url')->nullable();
            $table->string('page_url_ar')->nullable();            
            $table->string('file_path')->nullable();
            $table->string('file_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keys')->nullable();
            $table->string('meta_desc')->nullable();            
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
        Schema::dropIfExists('company_profiles');
    }
}
