<?php

use App\Http\Controllers\ProductController;
use App\product;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::post('login','AuthController@login')->name('user.login');
Route::view('login', 'auth.login')->name('login');
Route::view('register','auth.register')->name('register');
Route::resource('user', 'UserController');


Route::group(['middleware' => 'auth'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('getPage', 'product.index');
    Route::get('logout','AuthController@logout')->name('user.logout');
});




Route::resource('home', 'HomeController');
Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
Route::resource('orders', 'OrdersController');




