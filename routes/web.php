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
    return view('Halamanlengkapi');
});

Route::resource('listuser','ubahuser');
Route::resource('detail','detailuser');
Route::resource('cv','cvuser');
Route::get('signup','UserController@signup')->name('signup');
Route::post('signup','UserController@signup_store')->name('signup.store');
Route::resource('sign-up','signupcontroller');
Route::resource('log-in','Logincontroller');
Route::resource('home','homecontroller');
Route::get('login','SessionController@login')->name('login');
Route::post('login','SessionController@login_store')->name('login.store');
Route::get('logout','SessionController@logout')->name('logout');
Route::get('forgot-password','ReminderController@create')->name('reminders.create');
Route::post('forgot-password','ReminderController@store')->name('reminders.store');
Route::get('reset-password/{id}/{token}','ReminderController@edit')->name('reminders.edit');
Route::post('reset-password/{id}/{token}','ReminderController@update')->name('reminders.update');
Route::get('downloadExcel/{type}','ubahuser@downloadExcel');
Route::get('downloadPdf','ubahuser@exportPDF');
Route::post('importExcel','ubahuser@importExcel');

