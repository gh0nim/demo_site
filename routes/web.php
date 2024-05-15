<?php


use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::group(['middleware'=>'forbidden'],function(){





Route::get('/', function () {
    return view('index',
    [
        'product' => Product::all()
    ]);
    
});


Auth::routes();
Route::get('/admin_logout', 'HomeController@admin_logout')->name('admin_logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'ProductController@index')->name('index');
Route::post('/shop', 'ProductController@shop')->name('shop');//index form
Route::get('/cart/{product_id}/{product_name}/{product_price}/{product_image}/{client_id}', 'ProductController@cart')->name('cart');
Route::get('/delete_item/{order_id}', 'ProductController@delete_item')->name('delete_item');
Route::get('/checkout/{order_total_price}', 'ProductController@checkout')->name('checkout');
Route::get('/nav_cart', 'ProductController@nav_cart')->name('nav_cart');
Route::get('/about', 'ProductController@about')->name('about');
Route::get('/services', 'ProductController@services')->name('services');
Route::get('/delete_item_all', 'ProductController@delete_item_all')->name('delete_item_all');
Route::post('/thank_you', 'ProductController@thank_you')->name('thank_you');
Route::get('/back_to_shop', 'ProductController@back_to_shop')->name('back_to_shop');

// dashborad routes
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/show_products', 'DashboardController@show_products')->name('show_products'); //all products
Route::get('/show_orders', 'DashboardController@show_orders')->name('show_orders'); //all orders
Route::get('/delete_product/{product_id}', 'DashboardController@delete_product')->name('delete_product');
Route::post('/create_item', 'DashboardController@create_item')->name('create_item');
Route::get('/create_item_nav', 'DashboardController@create_item_nav')->name('create_item_nav');
Route::get('/show_item/{id}', 'DashboardController@show_item')->name('show_item'); //show one element
Route::get('/update_item/{id}', 'DashboardController@update_item')->name('update_item');
Route::post('/update_store/{id}/{img}', 'DashboardController@update_store')->name('update_store');
Route::get('/delete_all', 'DashboardController@delete_all')->name('delete_all');


});
