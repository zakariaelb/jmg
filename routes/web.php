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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

################### Landing route ############################

Route::get('/landing', 'LandingController@index')->name('landing');

################### End Landing route ########################
################### Landing route ############################

Route::get('/test', 'TestController@index')->name('test');

################### End Landing route ########################

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
