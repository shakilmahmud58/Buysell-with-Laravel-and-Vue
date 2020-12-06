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

Route::get('/new','BuysellController@index');
Route::post('/new','BuysellController@forpost');
Route::get('/controlpanel','BuysellController@controlpanel')->middleware('auth');
Route::get('/','MyController@show')->name('welcome');
//for check
Auth::routes();
//for admin
 Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
// Route::get('/adminlogin', 'Auth\AdminLoginController@showloginform')->name('admin.login');
// Route::post('/adminlogin', 'Auth\AdminLoginController@login')->name('admin.login.submit');
// Route::post('/adminlogout','Auth\AdminLoginController@logout')->name('admin.logout');

//for messages
Route::get('/message/{id}','MessageController@message')->middleware('auth');
Route::post('/message/{id}','MessageController@postmessage');

Route::get('/message/{id}/get','MessageController@messageget');
Route::get('/messages','MessageController@getmessage')->middleware('auth');
//Route::get('/notifications','HomeController@n')->middleware('auth');



//Route::post('/productname','MyController@search');
Route::get('/product {id}','MyController@details');


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

 Route::post('/storereviews','ReviewController@store');
 Route::get('/getreviews/{id}','ReviewController@getreviews');