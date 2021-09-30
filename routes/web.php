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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', 'HomeController@index')->middleware('can:manageContent')->name('home');

//Admin routes
Route::Resource('/category', 'categoryController');


Route::post('/massdestroy', 'categoryController@massDelete')->middleware('can:manageContent')->name('category.delete');
//Client side routes
Route::get('/', 'clientController@index')->name('client.landing-page');
Route::get('search_content', 'clientController@searchcontent')->name('client.search-page');
Route::get('categories/{slug}', 'clientController@category')->name('client.categories');
Route::get('pagedetail/{slug}', 'clientController@getpages')->name('client.pages');
// page Settings
Route::get('setting', 'adminController@settings' );
Route::post('addsettings', 'categoryController@store' )->middleware('can:manageContent');
Route::post('updatesettings/{id}', 'categoryController@update' )->middleware('can:manageContent');
//videos
Route::get('/video', 'videoController@index' )->name('video')->middleware('can:manageContent');
Route::get('/videolist', 'videoController@videolist' )->name('videolist')->middleware('can:manageContent');
Route::post('add-video', 'videoController@store' )->name('add-video')->middleware('can:manageContent');
Route::post('videodelete', 'videoController@massDelete')->name('video.delete')->middleware('can:manageContent');
Route::get('editvideo/{vid}', 'videoController@edit' )->name('video.edit')->middleware('can:manageContent');
Route::post('updatevideo/{id}', 'videoController@update' )->name('video.update')->middleware('can:manageContent');
Route::get('videodetail/{slug}', 'clientController@videodetail' )->name('video.detail');
///pages
Route::get('/pages', 'adminController@pages' )->name('pages');
Route::get('/allpages', 'adminController@allpages' )->name('allpages');
Route::post('add-pages', 'categoryController@store' )->middleware('can:manageContent');
Route::get('edit-pages/{id}', 'adminController@Edit' )->name('pages.edit');
Route::post('update-pages/{id}', 'categoryController@update')->middleware('can:manageContent');
Route::post('pagedelete', 'videoController@massDelete')->name('pages.delete')->middleware('can:manageContent');
//ads
Route::get('/allads', 'adminController@allads' )->name('allads');
Route::get('ads', 'adminController@ads' )->name('ads');
Route::post('addads', 'videoController@store' )->name('addads')->middleware('can:manageContent');
Route::get('edit-ads/{id}', 'adminController@editads' )->name('ads.edit');
Route::post('update-ads/{id}', 'videoController@update')->name('ads.update')->middleware('can:manageContent');
Route::post('adsdelete', 'videoController@massDelete')->name('ads.delete')->middleware('can:manageContent');
//messages
Route::get('/allmessages', 'adminController@allmessages' )->name('allmessages')->middleware('can:manageContent');
Route::get('messages', 'adminController@messages' )->name('messages');
Route::post('addmessages', 'videoController@store' )->name('addmessages');
Route::post('messagesdelete', 'videoController@massDelete')->name('messages.delete')->middleware('can:manageContent');
//Users
Route::get('AllUsers', 'adminController@AllUsers' )->name('Allusers');
Route::post('createUsers', 'videoController@store' )->name('createUsers')->middleware('can:manageContent');
Route::post('deleteUsers', 'videoController@massDelete')->name('deleteUsers')->middleware('can:manageContent');
//liking a video
Route::post('like', 'clientController@LikeVideo')->name('like');
//adding a video to favourites
Route::post('favourite', 'clientController@favourite')->name('favourite');
//get users watchlists
Route::get('watchlist', 'clientController@watchlist')->name('watchlist');

Route::get('/plan', 'FlutterwaveController@index')->middleware('auth')->name('plan');
// The route that the button calls to initialize payment
Route::post('/pay{id}', 'FlutterwaveController@initialize')->name('pay');
// The callback url after a payment
Route::get('/rave/callback', 'FlutterwaveController@callback')->name('callback');
//flutterwave webhook route
Route::post('/webhook/flutterwave', 'FlutterwaveController@webhook')->name('webhook');

Route::post('/chooseplan{id}', 'FlutterwaveController@plan')->name('plan.choose');
//cancel, resume, check my subscroption Routes
Route::get('viewMySubscription', 'clientController@Usersubscription')->name('view.subscription');
//cancel Subscription
Route::post('cancel/{id}', 'SubscriptionController@cancel')->name('Subscription.cancel');
//resume Subscription
Route::post('activate/{id}', 'SubscriptionController@resume')->name('Subscription.activate');
});