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

Route::get('/', function () {
    return view('welcome');
});



//  Auth::routes();
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name("google.login");
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/facebook', 'Auth\LoginController@redirectToProviderFacebook')->name("facebook.login");
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallbackFacebook');

Route::get('login', 'LoginController@index')->name('login');
Route::get('register', 'LoginController@register')->name('register');
Route::get('/home', 'HomeController@index')->name('Home.dashboard');
Route::get('/user', 'UserHomeController@index')->name('User.Dashboard');
Route::get('/create', 'HomeController@create')->name('Movies.create');
Route::get('/list', 'HomeController@list')->name('Movies.list');
