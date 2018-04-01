<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USER', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',45);
            $table->string('avatar_url',600);
            $table->string('email',45);
            $table->string('password');
            $table->string('type',10);
            $table->date('created_at');
            $table->date('updated_at');
            $table->boolean('deleted');
            $table->string('remember_token', 100)->nullable();
        });
        
        Schema::create('SERIES', function (Blueprint $table) {
            $table->increments('id');
            $table->string('series_title',45);
            $table->string('author',45);
            $table->string('thumbnail_url',600);
            $table->string('summary',600);
            $table->integer('total_view')->nullable();
            $table->date('created_at');
            $table->date('updated_at');
            $table->boolean('deleted');
            $table->integer('user_id');
        });
        
        Schema::create('GALLERY', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_url',150);
            $table->integer('type');
            $table->integer('series_id');
            $table->date('created_at');
            $table->date('updated_at');
        });
        
        Schema::create('EPISODE', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('episode_number');
            $table->string('episode_title',45);
            $table->string('thumbnail_url',600);
            $table->integer('series_id');
            $table->integer('total_view')->nullable();
            $table->date('created_at');
            $table->date('updated_at');
        });
        
        Schema::create('PAGE', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_number');
            $table->string('file_url',600);
            $table->integer('episode_id');
            $table->date('created_at');
            $table->date('updated_at');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('USER');
        Schema::dropIfExists('SERIES');
        Schema::dropIfExists('GALLERY');
        Schema::dropIfExists('EPISODE');
        Schema::dropIfExists('PAGE');      
    }
}
