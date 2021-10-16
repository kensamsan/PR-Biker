<?php

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
    return view('home');
})->name('out');

Route::get('/login', function () {
    return view('login');
});

Route::get('/store',"UserController@store");

Route::get('/logout','UserController@logout')->name('logout');
    
Route::post('/authenticate','UserController@authenticate')->name('authenticate');
Route::get('/register', function () {
    return view('register');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/password', function () {
    return view('password');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/test', function () {
    return view('test');
});
Route::group(['middleware'=>['auth']],function (){
    Route::get('/homeaccount', function () {
        return view('homeaccount');
    });
});


Route::get('/product', function () {
    return view('product');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/billing', function () {
    return view('checkout.billing');
});

Route::get('/shipping', function () {
    return view('checkout.shipping');
});

Route::get('/payment', function () {
    return view('checkout.payment');
});

Route::get('/cart', function () {
    return view('checkout.cart');
});

Route::get('/productview', function () {
    return view('product_view.productview');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/costumer', function () {
    return view('admin.costumer');
});

Route::get('/product-details', function () {
    return view('admin.product-details');
});

Route::get('/products', function () {
    return view('admin.products');
});

Route::get('/rental', function () {
    return view('admin.rental');
});

Route::get('/rental-details', function () {
    return view('admin.rental-details');
});

Route::get('/users', function () {
    return view('admin.users');
});

Route::get('/user-details', function () {
    return view('admin.user-details');
});