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
            $table->string('nickname',45)->nullable();
            $table->string('password');
            $table->string('avatar_url',600)->nullable();
            $table->string('about',600)->nullable();
            $table->string('email',45);
            $table->string('facebook_url',100)->nullable();
            $table->string('twitter_url',100)->nullable();
            $table->string('ig_url',100)->nullable();
            $table->string('google_url',100)->nullable();
            $table->date('created_at');
            $table->date('updated_at');
            $table->boolean('deleted');
            $table->string('remember_token', 100)->nullable();
        });
        
        Schema::create('SERIES', function (Blueprint $table) {
            $table->increments('id');
            $table->string('series_title',45);
            $table->string('author',45);
            $table->integer('genre');
            $table->string('thumbnail_url',600);
            $table->string('banner_url',600);
            $table->string('summary',600);
            $table->integer('total_view')->nullable();
            $table->date('created_at');
            $table->date('updated_at');
            $table->boolean('deleted');
            $table->integer('user_id');
        });
        
        Schema::create('GALLERY', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('item_url',150);
            $table->integer('item_type');
            $table->integer('price')->nullable();
            $table->string('illustrator',50)->nullable();
            $table->string('series_name')->nullable();
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
        
        Schema::create('ADS', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ads_name',45);
            $table->string('ads_links',600);
            $table->string('ads_portrait_url',600);
            $table->string('ads_landscape_url',600);
            $table->tinyInteger('ads_active');
            $table->date('created_at');
            $table->date('updated_at');
        });
        
        Schema::create('BANNER', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner_name',45);
            $table->string('banner_links',600);
            $table->string('banner_url',600);
            $table->string('banner_page',45);
            $table->date('created_at');
            $table->date('updated_at');
        });
        
        Schema::create('PAYMENT_METHOD', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_name',45);
            $table->string('description',600);
            $table->date('created_at');
            $table->date('updated_at');
        });
        
        Schema::create('CATEGORY', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name',45);
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
        Schema::dropIfExists('ADS');
        Schema::dropIfExists('BANNER');
        Schema::dropIfExists('PAYMENT_METHOD');
        Schema::dropIfExists('CATEGORY');
    }
}
