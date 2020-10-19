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
     
    // Units
    Route::get('units','UnitController@index')->name('units');
    Route::get('add-unit','UnitController@show')->name('new-unit');

    // Categories
    Route::get('categories','CategoryController@index')->name('categories');

    // Products
    Route::get('products','ProductController@index')->name('products');

    // Tags
    Route::get('tags','TagController@index')->name('tags');
    // Payments
    // Orders 
    Route::get('orders','OrderController@index')->name('orders');
    // Shipments
    // Cities
    Route::get('cities','CityController@index')->name('cities');
    // Countries
    Route::get('countries','CountryController@index')->name('countries');
    // States
    Route::get('states','StateController@index')->name('states');
    // Reviews
    Route::get('reviews','ReviewController@index')->name('reviews');

    // Tickets
    Route::get('tickets','TicketController@index')->name('tickets');
    // Roles
});
