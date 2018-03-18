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
            $table->string('avatar_url',150);
            $table->string('email',45);
            $table->string('password');
            $table->string('type',10);
            $table->date('created_at');
            $table->date('updated_at');
            $table->boolean('deleted');
            $table->string('remember_token', 100)->nullable();
        });
        
        Schema::create('COMIC', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comic_title',45);
            $table->string('author',45);
            $table->string('cover_url',150);
            $table->string('description',150);
            $table->integer('total_view');
            $table->integer('like_id');
            $table->integer('comment_id');
            $table->date('created_at');
            $table->date('updated_at');
            $table->boolean('deleted');
            $table->integer('user_id');
        });
        
        Schema::create('GALLERY', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_url',150);
            $table->integer('type');
            $table->integer('comic_id');
            $table->integer('like_id');
            $table->integer('comment_id');
        });
        
        Schema::create('CHAPTER', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapter_number');
            $table->string('chapter_title',45);
            $table->integer('comic_id');
            $table->integer('like_id');
            $table->integer('comment_id');
        });
        
        Schema::create('PAGE', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_number');
            $table->string('file_url',150);
            $table->integer('chapter_id');
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
        Schema::dropIfExists('COMIC');
        Schema::dropIfExists('GALLERY');
        Schema::dropIfExists('CHAPTER');
        Schema::dropIfExists('PAGE');      
    }
}
