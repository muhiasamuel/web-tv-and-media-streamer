<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('can:manageContent')->name('home');

//Admin routes
Route::Resource('/category', 'categoryController');


Route::post('/massdestroy', 'categoryController@massDelete')->name('category.delete');
//Client side routes
Route::get('/landing', 'clientController@index')->middleware([UserStatus::class])->name('client.landing-page');
Route::get('search_content', 'clientController@searchcontent')->name('client.search-page');
Route::get('categories/{slug}', 'clientController@category')->name('client.categories');
Route::get('pagedetail/{slug}', 'clientController@getpages')->name('client.pages');
// page Settings
Route::get('setting', 'adminController@settings' );
Route::post('addsettings', 'categoryController@store' );
Route::post('updatesettings/{id}', 'categoryController@update' );
//videos
Route::get('/video', 'videoController@index' )->name('video');
Route::get('/videolist', 'videoController@videolist' )->name('videolist');
Route::post('add-video', 'videoController@store' )->name('add-video');
Route::post('videodelete', 'videoController@massDelete')->name('video.delete');
Route::get('editvideo/{vid}', 'videoController@edit' )->name('video.edit');
Route::post('updatevideo/{id}', 'videoController@update' )->name('video.update');
Route::get('videodetail/{slug}', 'clientController@videodetail' )->name('video.detail');
///pages
Route::get('/pages', 'adminController@pages' )->name('pages');
Route::get('/allpages', 'adminController@allpages' )->name('allpages');
Route::post('add-pages', 'categoryController@store' );
Route::get('edit-pages/{id}', 'adminController@Edit' )->name('pages.edit');
Route::post('update-pages/{id}', 'categoryController@update');
Route::post('pagedelete', 'videoController@massDelete')->name('pages.delete');
//ads
Route::get('/allads', 'adminController@allads' )->name('allads');
Route::get('ads', 'adminController@ads' )->name('ads');
Route::post('addads', 'videoController@store' )->name('addads');
Route::get('edit-ads/{id}', 'adminController@editads' )->name('ads.edit');
Route::post('update-ads/{id}', 'categoryController@update')->name('ads.update');
Route::post('adsdelete', 'videoController@massDelete')->name('ads.delete');
//messages
Route::get('/allmessages', 'adminController@allmessages' )->name('allmessages');
Route::get('messages', 'adminController@messages' )->name('messages');
Route::post('addmessages', 'videoController@store' )->name('addmessages');
Route::post('messagesdelete', 'videoController@massDelete')->name('messages.delete');
//Users
Route::get('AllUsers', 'adminController@AllUsers' )->name('Allusers');
Route::post('createUsers', 'videoController@store' )->name('createUsers');
Route::post('deleteUsers', 'videoController@massDelete')->name('deleteUsers');


Route::get('/plan', 'FlutterwaveController@index')->middleware('auth')->name('plan');
// The route that the button calls to initialize payment
Route::post('/pay{id}', 'FlutterwaveController@initialize')->name('pay');
// The callback url after a payment
Route::get('/rave/callback', 'FlutterwaveController@callback')->name('callback');

Route::post('/chooseplan{id}', 'FlutterwaveController@plan')->name('plan.choose');