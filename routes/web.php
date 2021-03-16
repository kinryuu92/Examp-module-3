<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

//Route::prefix('categories')->group(function () {
//    Route::get('/create', [
//        'as' => 'categories.create',
//        'user' => [CategoryController::class, 'create']
//    ]);
//});

Route::prefix('categories')->group(function () {
    Route::get('/create', [CategoryController::class, 'create']);
});