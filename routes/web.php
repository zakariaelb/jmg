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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

################### Users route ############################

Route::get('/expenses', 'Users\CrudController@getExpenses')->name('expenses');

################### End Landing route ########################
################### Crud route ############################



 ###################### Localization ############################

        Route::group(
            [
                'prefix' => LaravelLocalization::setLocale(),
                'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
            ], function() {
            Auth::routes(['verify'=>true]);
            Route::group(['prefix'=>'input'], function() {
                Route::get('store', 'Users\CrudController@store');
                Route::get('create', 'Users\CrudController@create')->name('creating')->middleware('auth');
                Route::post('save', 'Users\CrudController@save')->name('expense.saving');
                Route::get('allExpenses','Users\CrudController@getAllExpenses')->name('expense.all');
                Route::get('edit/{id_Expenses}', 'Users\CrudController@editExpenses')->name('expense.editing')->middleware('auth');
                Route::post('update/{id_Expenses}', 'Users\CrudController@update')->name('expense.updating')->middleware('auth');
                Route::get('delete/{id_Expenses}', 'Users\CrudController@delete')->name('expense.deleting')->middleware('auth');
    });
});
######################## Create route ############################

