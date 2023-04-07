<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');

Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('/admin/products/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
