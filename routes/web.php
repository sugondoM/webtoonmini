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



Route::get('/admin', ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showSeriesList']);
Route::post('/login','Admin\AdminController@doLogin');
Route::get('/list','Admin\AdminController@getUserList');

Route::get('/',                                     'Front\WebtoonController@showHomePage');
Route::get('/donate',                               'Front\WebtoonController@showDonatePage');
Route::get('/gallery',                              'Front\WebtoonController@showGalleryPage');
Route::get('/gallery/{page}/{paging?}',                     'Front\WebtoonController@showGalleryPage');
Route::get('/profile',                              'Front\WebtoonController@showProfilePage');
Route::get('/featured/list/{paging?}',             'Front\WebtoonController@showRecommendPage');
Route::get('/shop/{paging?}',                                 'Front\WebtoonController@showShopPage');
Route::get('/webtoon/list/{paging?}',                              'Front\WebtoonController@showWebtoonPage');
Route::get('/series/{series}/{paging?}',              'Front\WebtoonController@showWebtoonSeriesPage');
Route::get('/episode/{series}/{episode}',            'Front\WebtoonController@showWebtoonEpisodePage');

Route::get('/admin/profile',                         ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showProfile']);
Route::get('/admin/profile/edit/{userid}',           ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEditProfile']); 
Route::get('/admin/series/add',                      ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showUploadSeries']);
Route::get('/admin/episode/add/{series}',            ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showUploadEpisode']);
Route::get('/admin/series/list/{paging?}',                     ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showSeriesList']);
Route::get('/admin/episode/list/{series}/{paging?}',           ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEpisodesList']);
Route::get('/admin/series/edit/{series}',            ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEditSeries']);
Route::get('/admin/episode/edit/{episode}',          ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEditEpisode']);
Route::get('/admin/page/list/{episode}',             ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showListPage']);
Route::get('/admin/page/edit/{episode}/{pages}',             ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEditPage']);
Route::get('/admin/gallery/add',                     ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showUploadGallery']);
Route::get('/admin/gallery/list/{paging?}',                         ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showGallery']);
Route::get('/admin/gallery/edit/{itemid}',           ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEditGalleryItem']);
Route::get('/admin/banner/list/{paging?}',                       ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showBanner']);
Route::get('/admin/ads/list/{paging?}',                       ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showAds']);
Route::get('/admin/banner/add',                      ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showUploadBanner']);
Route::get('/admin/ads/add',                         ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showUploadAds']);
Route::get('/admin/banner/edit/{itemid}',            ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEditBannerItem']);
Route::get('/admin/ads/edit/{itemid}',               ['middleware' => 'auth', 'uses' => 'Admin\AdminController@showEditAdsItem']);

Route::get('/admin/series/dodelete/{series}',         ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doDeleteSeries']);
Route::get('/admin/series/doundelete/{series}',       ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doUnDeleteSeries']);
Route::get('/admin/episode/dodelete/{episode}',       ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doDeleteEpisode']);
Route::get('/admin/page/dodelete/{episode}/{page}',       ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doDeletePage']);
Route::put('/admin/series/doedit',                   'Admin\AdminController@doEditSeries');
Route::put('/admin/episode/doedit',                  'Admin\AdminController@doEditEpisode');
Route::post('/admin/episode/doadd',                  'Admin\AdminController@doUploadEpisode');
Route::post('/admin/series/doadd',                   'Admin\AdminController@doUploadSeries');
Route::post('/admin/gallery/doadd',                  'Admin\AdminController@doUploadGalleryItem');
Route::post('/admin/banner/doadd',                   'Admin\AdminController@doUploadBannerItem');
Route::post('/admin/ads/doadd',                      'Admin\AdminController@doUploadAdsItem');
Route::put('/admin/profile/doedit',                  'Admin\AdminController@doEditProfile');
Route::put('/admin/gallery/doedit',                  'Admin\AdminController@doEditGalleryItem');
Route::put('/admin/banner/doedit',                   'Admin\AdminController@doEditBannerItem');
Route::put('/admin/page/doedit',                     'Admin\AdminController@doEditPage');
Route::put('/admin/ads/doedit',                      'Admin\AdminController@doEditAdsItem');
Route::get('/admin/gallery/dodelete/{item}',          ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doDeleteGalleryItem']);
Route::get('/admin/banner/dodelete/{item}',           ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doDeleteBannerItem']);
Route::get('/admin/ads/dodelete/{item}',              ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doDeleteAdsItem']);
Route::get('/admin/login',                           'Admin\AdminController@showLoginPage');
Route::post('/admin/dologin',                        'Admin\AdminController@doLogin');
Route::get('/admin/dologout',                         ['middleware' => 'auth', 'uses' => 'Admin\AdminController@doLogout']);
Route::post('/order/doSend',                        'Admin\AdminController@doSendMail');

