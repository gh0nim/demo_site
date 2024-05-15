<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Dashboard routes
Route::get('show_item/{id}','Api\DashBoardController@show_item')->name('show_item');
Route::get('show_products','Api\DashBoardController@show_products')->name('show_products');
Route::get('show_all_orders','Api\DashBoardController@show_all_orders')->name('show_all_orders');
Route::post('create_item', 'Api\DashBoardController@create_item')->name('create_item');
Route::post('/delete_product', 'Api\DashboardController@delete_product')->name('delete_product');
Route::post('/delete_all', 'Api\DashboardController@delete_all')->name('delete_all');
Route::post('/update_store/{id}', 'Api\DashBoardController@update_store')->name('update_store');

// website routes
Route::post('/shop','Api\ProductController@shop'); //creating of new client
Route::post('/delete_item','Api\ProductController@delete_item'); //delete selected order
Route::post('/nav_cart','Api\ProductController@nav_cart'); //delete all selected orders
Route::post('/cart','Api\ProductController@cart'); //insert orders




