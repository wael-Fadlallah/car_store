<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/',[CarController::class,'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/cars', CarController::class);
    Route::resource('/stores', StoreController::class);
    Route::resource('/categories', CategoryController::class);
});
Route::get('/change_lang/{lang}', [HomeController::class, 'lang'])->name('lang');

Auth::routes();
