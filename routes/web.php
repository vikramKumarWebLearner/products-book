<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Proudct
Route::get('/products', [ProductController::class,'index'])->name('products');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}',[ProductController::class,'delete'])->name('product');


// OrderController
Route::get('/orders', [OrderController::class,'index'])->name("orders");
Route::get('/order/create',[OrderController::class,'create'])->name('order.create');
Route::post('/order/store',[OrderController::class,'store'])->name('order.store');
Route::get('/order/{id}',[OrderController::class,'edit'])->name('order.edit');


