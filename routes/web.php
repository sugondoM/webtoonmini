<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/profile', 'Front\ProfileController@getProfilePage');

Route::get('/webtoon', 'Front\WebtoonController@getWebtoonPage');

Route::get('/gallery', 'Front\GalleryController@getGalleryPage');

Route::get('/shop', 'Front\ShopController@getShopPage');

Route::get('/donate', 'Front\DonateController@getDonatePage');

Route::get('/recommend', 'Front\RecommendController@getRecommendPage');
