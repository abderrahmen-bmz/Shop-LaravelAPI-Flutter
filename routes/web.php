<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Route::get('units-test', 'DataImportController@import');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test-email', function () {
     return 'Hallo';  
})->middleware(['auth','user_is_support']);


Route::group(['auth','admin_is_admin'], function () {

    Route::get('units','UnitController@index')->name('units');
    Route::get('add-unit','UnitController@show')->name('new-unit');
});
