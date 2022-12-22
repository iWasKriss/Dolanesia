<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;

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

Route::get('/', [HalamanController::class, 'home']);
Route::get('/about', [HalamanController::class, 'about']);
Route::get('/contact', [HalamanController::class, 'contact']);
Route::get('/explore', [HalamanController::class, 'explore']);

Route::resource('category', CategoryController::class)->middleware('admin');
Route::resource('destination', DestinationController::class);
Route::post('/checkout', [BuyController::class, 'checkout'])->middleware('tourist')->name('checkout');
Route::get('/history', [BuyController::class, 'history'])->middleware('auth')->name('history');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
