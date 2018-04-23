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



Route::get('/admin', ['middleware' => 'auth', 'uses' => 'Admin\AdminController@getAdminPage']);
Route::post('/login','Admin\AdminController@doLogin');
Route::get('/list','Admin\AdminController@getUserList');

Route::get('/',                                     'Front\WebtoonController@showHomePage');
Route::get('/donate',                               'Front\WebtoonController@showDonatePage');
Route::get('/gallery',                              'Front\WebtoonController@showGalleryPage');
Route::get('/profile',                              'Front\WebtoonController@showProfilePage');
Route::get('/recommend',                            'Front\WebtoonController@showRecommendPage');
Route::get('/shop',                                 'Front\WebtoonController@showShopPage');
Route::get('/webtoon',                              'Front\WebtoonController@showWebtoonPage');
Route::get('/webtoon/series/{series}',              'Front\WebtoonController@showWebtoonSeriesPage');
Route::get('/webtoon/episode/{episode}',            'Front\WebtoonController@showWebtoonEpisodePage');

Route::get('/admin/profile',                        'Admin\AdminController@showProfile');
Route::get('/admin/profile/edit/{userid}',          'Admin\AdminController@showEditProfile'); 
Route::get('/admin/series/add',                     'Admin\AdminController@showUploadSeries');
Route::get('/admin/episode/add/{series}',           'Admin\AdminController@showUploadEpisode');
Route::get('/admin/series/list',                    'Admin\AdminController@showSeriesList');
Route::get('/admin/episode/list/{series}',          'Admin\AdminController@showEpisodesList');
Route::get('/admin/series/edit/{series}',           'Admin\AdminController@showEditSeries');
Route::get('/admin/episode/edit/{episode}',         'Admin\AdminController@showEditEpisode');
Route::get('/admin/gallery/add',                    'Admin\AdminController@showUploadGallery');
Route::get('/admin/gallery',                        'Admin\AdminController@showGallery');
Route::get('/admin/gallery/edit/{itemid}',          'Admin\AdminController@showEditGalleryItem');

Route::get('/admin/series/dodelete/{series}',        'Admin\AdminController@doDeleteSeries');
Route::get('/admin/series/doundelete/{series}',      'Admin\AdminController@doUnDeleteSeries');
Route::get('/admin/episode/dodelete/{episode}',      'Admin\AdminController@doDeleteEpisode');
Route::put('/admin/series/doedit',                   'Admin\AdminController@doEditSeries');
Route::put('/admin/episode/doedit',                  'Admin\AdminController@doEditEpisode');
Route::post('/admin/episode/doadd',                  'Admin\AdminController@doUploadEpisode');
Route::post('/admin/series/doadd',                   'Admin\AdminController@doUploadSeries');
Route::put('/admin/profile/doedit',                  'Admin\AdminController@doEditProfile');
Route::put('/admin/gallery/doedit',                  'Admin\AdminController@doEditGalleryItem');
Route::post('/admin/gallery/doadd',                  'Admin\AdminController@doUploadGalleryItem');
Route::get('/admin/login',                           'Admin\AdminController@showLoginPage');
Route::post('/admin/dologin',                        'Admin\AdminController@doLogin');
Route::get('/admin/dologout',                        'Admin\AdminController@doLogout');

