<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Models\Order;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',  HomeController::class)->name('home');
Route::get('/administrador-pedidos',  [OrderController::class, 'indexWeb'])->name('administrador.index');
Route::get('/administrador-pedidos/{status}',  [OrderController::class, 'searchStatus'])->name('administrador.search');
Route::post('/administrador-timer/{order}', [OrderController::class, 'changeTimer'])->name('administrador.timer');
Route::post('/administrador-status/{order}', [OrderController::class, 'changeStatus'])->name('administrador.status');
