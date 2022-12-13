<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ImageUploadController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('orders', OrderController::class);

Route::resource('detailOrders', DetailOrderController::class);

Route::resource('tables', TableController::class);

Route::get('searchOrder/{id}', [OrderController::class, 'orderStatus']);

Route::post('/upload', [ImageUploadController::class, 'uploadImage'])->name('images.upload');
