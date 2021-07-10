<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;




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



Route::get('get-categories',[CategoryController::class,'index']);
Route::get('get-products',[ProductController::class,'index']);
Route::get('getProductThroughCategory/{id}',[ProductController::class,'getProductThroughCategory']);
Route::post('add-order',[OrdersController::class,'store']);

Route::get('get-order',[OrdersController::class,'index']);

