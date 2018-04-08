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



Route::get('/admin','Admin\AdminController@getAdminPage');
Route::get('/login','Admin\AdminController@getLoginPage');
Route::post('/login','Admin\AdminController@doLogin');
Route::get('/list','Admin\AdminController@getUserList');

Route::get('/',                             'Front\WebtoonController@showHomePage');
Route::get('/donate',                       'Front\WebtoonController@showDonatePage');
Route::get('/gallery',                      'Front\WebtoonController@showGalleryPage');
Route::get('/profile',                      'Front\WebtoonController@showProfilePage');
Route::get('/recommend',                    'Front\WebtoonController@showRecommendPage');
Route::get('/shop',                         'Front\WebtoonController@showShopPage');
Route::get('/webtoon',                      'Front\WebtoonController@showWebtoonPage');
Route::get('/webtoon/series/{series}',      'Front\WebtoonController@showWebtoonSeriesPage');
Route::get('/webtoon/episode/{episode}',    'Front\WebtoonController@showWebtoonEpisodePage');

Route::get('/adminprofile'                          ,'Admin\AdminController@showProfile');
Route::get('/admineditprofile/{userid}'             ,'Admin\AdminController@showEditProfile'); 
Route::get('/adminupload'                           ,'Admin\AdminController@showUploadSeries');
Route::get('/adminupload/{series}'                  ,'Admin\AdminController@showUploadEpisode');
Route::get('/adminlist'                             ,'Admin\AdminController@showSeriesList');
Route::get('/adminlist/{series}'                    ,'Admin\AdminController@showEpisodesList');
Route::get('/admineditseries/{series}'              ,'Admin\AdminController@showEditSeries');
Route::get('/admineditepisode/{series}/{episode}'   ,'Admin\AdminController@showEditEpisode');
Route::get('/adminuploadgallery'                    ,'Admin\AdminController@showUploadGallery');
Route::get('/admingallery'                          ,'Admin\AdminController@showGallery');
Route::get('/admingallery/{itemid}'                 ,'Admin\AdminController@showEditGalleryItem');

Route::post('/admineditseries'          ,'Admin\AdminController@doEditSeries');
Route::post('/admineditepisode'         ,'Admin\AdminController@doEditEpisode');
Route::post('/adminuploadepisode'       ,'Admin\AdminController@doUploadEpisode');
Route::post('/adminuploadseries'        ,'Admin\AdminController@doUploadSeries');
Route::post('/admineditprofile'         ,'Admin\AdminController@doEditProfile');
Route::post('/admineditgalleryItem'     ,'Admin\AdminController@doEditGalleryItem');
Route::post('/adminuploadgalleryItem'   ,'Admin\AdminController@doUploadGalleryItem');

