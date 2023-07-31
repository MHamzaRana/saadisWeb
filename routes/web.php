<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/explore/{item}', [HomeController::class, 'explore'])->name('explore');
Route::get('/explore/bin-saeed', [HomeController::class, 'binSaeed'])->name('bin-saeed');
Route::get('/explore/alaaya', [HomeController::class, 'alaaya'])->name('alaaya');
Route::get('/explore/all-collections', [HomeController::class, 'allCollection'])->name('all-collections');
Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
