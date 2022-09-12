<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReferUserController;
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
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/refered_users', [App\Http\Controllers\ReferUserController::class, 'index'])->name('refers');
Route::get('/refered_user/create', [App\Http\Controllers\ReferUserController::class, 'create'])->name('refers.create');
Route::post('/refered_user/store', [App\Http\Controllers\ReferUserController::class, 'store'])->name('refers.store');
Route::get('/product_purchased/{refer_id}', [App\Http\Controllers\ReferUserController::class, 'product_purchased'])->name('product_purchased');
