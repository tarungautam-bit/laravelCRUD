<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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



Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');//Create view




//CRUD OPERATIONS
Route::post('/products/store',[ProductsController::class,'store'])->name('products.store');//Create Function

Route::get('/', [ProductsController::class,'index'])->name('products.index');//Read Function
Route::get('products/edit/{id}',[ProductsController::class,'edit'])->name('products.edit');//(Read Product on basis of id) Edit View

Route::put('products/update/{id}',[ProductsController::class,'update'])->name('products.update');//Update Function

Route::get('products/delete/{id}',[ProductsController::class,'delete'])->name('products.delete');//Delete

Route::delete('products/delete/{id}',[ProductsController::class,'delete'])->name('products.delete');//Delete

Route::get('products/show/{id}',[ProductsController::class,'show'])->name('products.show');