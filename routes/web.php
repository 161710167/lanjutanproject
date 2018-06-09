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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


 
	Route::group(['prefix'=>'admin', 'Middleware'=>['auth','role:admin']], function () {
	Route::resource('user','UserController');
	Route::resource('member','MemberController');
	Route::resource('perusahaan','PerusahaanController');
	Route::resource('lowongan','LowonganController');
	Route::resource('lamaran','LamaranController');
	
});
// 	Route::group(['prefix'=>'member', 'middleware'=>['auth','role:member']], function () {
// 	Route::resource('perusahaan','PerusahaanController');
// 	Route::resource('lowongan','LowonganController');
// 	Route::resource('lamaran','LamaranController');
// });

	Route::get('/cocobaan', function () {
    return view('layouts.coba');
});

