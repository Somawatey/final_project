<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});
Route::controller(AuthController::class)->group(function (){
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');

    Route::get('logout','logout')->middleware('auth')->name('logout');

});

Route::middleware('auth')->group(function () {
    Route::get('dashboard' , function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function (){
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');

    });

    Route::controller(CategoryController::class)->prefix('categories')->group(function (){
        Route::get('', 'index')->name('categories');
        Route::get('create', 'create')->name('categories.create');
        Route::post('store', 'store')->name('categories.store');
        Route::get('show/{id}', 'show')->name('categories.show');
        Route::get('edit/{id}', 'edit')->name('categories.edit');
        Route::put('edit/{id}', 'update')->name('categories.update');
        Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');

    });

    Route::controller(UserController::class)->prefix('users')->group(function (){
        Route::get('', 'index')->name('users');
        Route::post('store', 'store')->name('users.store');
        Route::get('show/{id}', 'show')->name('users.show');
        Route::delete('destroy/{id}', 'destroy')->name('users.destroy');

    });


    Route::get('profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
