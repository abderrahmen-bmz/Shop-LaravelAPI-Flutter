<?php

use App\Product;
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

// Get categories
Route::get('categories','Api\CategoryController@index');
Route::get('categories/{id}','Api\CategoryController@show');
// Get tags
Route::get('tags','Api\TagController@index');
Route::get('tags/{id}','Api\TagController@show');
// Get products
Route::get('products','Api\ProductController@index');
Route::get('products/{id}','Api\ProductController@show');

// General Route 

Route::get('countries','Api\CountryController@index');
Route::get('countries/{id}/states','Api\CountryController@showStates');
Route::get('countries/{id}/cities','Api\CountryController@showCities');

Route::post('users/register','Api\AuthController@register');
Route::post('users/login','Api\AuthController@login');

Route::group(['auth:api'], function () {
    
});

// Route::middleware('auth:api')->get('/products', function (Request $request) {
//     return Product::all();
// });
