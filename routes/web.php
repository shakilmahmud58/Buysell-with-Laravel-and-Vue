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

//Route::get('/new','BuysellController@index');
Route::get('/','BuysellController@index')->name('welcome');
Route::post('/getdata','BuysellController@index2');
//Route::post('/','BuysellController@index3');
Route::get('/recommendation','BuysellController@recommendation');
Route::post('/home','BuysellController@forpost');
Route::get('/controlpanel','BuysellController@controlpanel')->middleware('auth');
Route::post('/productupdate','BuysellController@update');
Route::post('/deleteitem','BuysellController@delete');
//Route::get('/','MyController@show')->name('welcome');
//for check
Auth::routes();
 Route::get('/home','BuysellController@index')->name('home');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
// Route::get('/adminlogin', 'Auth\AdminLoginController@showloginform')->name('admin.login');
// Route::post('/adminlogin', 'Auth\AdminLoginController@login')->name('admin.login.submit');
// Route::post('/adminlogout','Auth\AdminLoginController@logout')->name('admin.logout');

//for messages
Route::get('/message/{id}','MessageController@message')->middleware('auth');
Route::post('/message/{id}','MessageController@postmessage');

Route::get('/message/{id}/get','MessageController@messageget');
Route::get('/messages','MessageController@getmessage')->middleware('auth');
Route::get('/example','MessageController@example')->middleware('auth');

//Route::get('/notifications','HomeController@n')->middleware('auth');



Route::post('/productname','MyController@search');
Route::get('/product{id}','MyController@details');
Route::get('/search/{name}','MyController@searchresults');

//for foodies
// Route::get('/foodies','MyController@showfoodies')->name('foodies');
// Route::get('/admin','MyController@admin')->name('adminhome');
// Route::post('/admin','MyController@adminpost');
// Route::get('/getit','MyController@getit');
// Route::get('/getselected','MyController@getselected');
// Route::post('/update','MyController@updateit');


// Route::post('/buticspost','ButicsController@adminpost');
// Route::get('/getbutic','ButicsController@getit');
// Route::get('/getselectedbutic','ButicsController@getselected');
// Route::post('/selectbutic','ButicsController@updateit');


// //for foodies
// Route::get('/foodies','MyController@showfoodies')->name('foodies');
// Route::get('/admin','MyController@admin')->name('adminhome');
// Route::post('/admin','MyController@adminpost');
// Route::get('/getit','MyController@getit');
// Route::get('/getselected','MyController@getselected');
// Route::post('/update','MyController@updateit');


// Route::post('/buticspost','ButicsController@adminpost');
// Route::get('/getbutic','ButicsController@getit');
// Route::get('/getselectedbutic','ButicsController@getselected');
// Route::post('/selectbutic','ButicsController@updateit');
 Route::post('/storereviews','ReviewController@store');
 Route::get('/getreviews/{id}','ReviewController@getreviews');
 Route::post('/reviewupdate','ReviewController@update');
 Route::post('/deletereview','ReviewController@delete');





 //broadcasting route
 Route::get('/notify','NotificationController@store');
 Route::get('/readnotification{id}','NotificationController@read');
 Route::get('/get{id}','NotificationController@unreadmsg');

 Route::get('/check{id}','NotificationController@check');
 Route::get('/nothing{id}','ReviewController@nothing');

 Route::get('/reviewnoti','NotificationController@getrevnoti');
 Route::get('/countunread','NotificationController@countunread');
 Route::post('/readit','NotificationController@readit');
 Route::get('/notifications','ReviewController@shownoti');