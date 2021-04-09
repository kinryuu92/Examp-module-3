<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('product.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}  ', [AdminProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}  ', [AdminProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}  ', [AdminProductController::class, 'delete'])->name('product.delete');
    });
});



