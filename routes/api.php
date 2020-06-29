<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Route::apiResource('movie', 'MovieController');

Route::get('fetch-movie', 'MovieController@index')->name('fetch-movie');
Route::get('movie-byid/{id}', 'MovieController@show')->name('movie-byid');
Route::post('create-movie', 'MovieController@store')->name('create-movie');
Route::post('edit-movie/{id}', 'MovieController@update')->name('edit-movie');
Route::post('delete-movie/{id}', 'MovieController@destroy')->name('delete-movie');
Route::post('login', 'JwtMaintainController@login')->name('api-login');

Route::post('register', 'JwtMaintainController@register')->name('api-register');
Route::post('logout', 'JwtMaintainController@logout')->name('api-logout');



Route::middleware('auth:api')->group(function () {
    Route::post('refresh', 'JwtMaintainController@refresh');
    
});