<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminCategory;
use App\Http\Controllers\Admin\AdminBook;
use App\Http\Controllers\Admin\AdminRack;
use App\Http\Controllers\Admin\AdminUser;
use App\Http\Controllers\Auth\AuthController;

// Route::get('/', function () {
//     return redirect('/admin');
// });

Route::get('/', [HomeController::class, 'index']);

// ADMIN AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// ADMIN PAGE
Route::group(['prefix'=> 'admin','middleware'=>['auth']], function(){
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/book', [AdminBook::class, 'index']);
    Route::get('/category', [AdminCategory::class, 'index']);
    Route::get('/rack', [AdminRack::class, 'index']);
    Route::get('/user', [AdminUser::class, 'index']);
    
    Route::post('/book', [AdminBook::class, 'postHandler']);
    Route::post('/category', [AdminCategory::class, 'postHandler']);
    Route::post('/rack', [AdminRack::class, 'postHandler']);
    Route::post('/user', [AdminUser::class, 'postHandler']);
});

// API
Route::group(['prefix'=> 'api'], function(){
    Route::get('book/{book:id}', [APIController::class, 'Book']);
    Route::get('category/{category:id}', [APIController::class, 'Category']);
    Route::get('rack/{rack:id}', [APIController::class, 'Rack']);
    Route::get('user/{user:id}', [APIController::class, 'User']);
});
