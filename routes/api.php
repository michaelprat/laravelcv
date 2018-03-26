<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('users','tampungapi@index');
Route::get('user/{id}','tampungapi@show');
Route::delete('user/{id}','tampungapi@destroy');
Route::put('user','tampungapi@store');
Route::post('user','tampungapi@store');

