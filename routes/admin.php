<?php

use Illuminate\Support\Facades\Route;

Route::get('/', AdminController::class); // route('admin')

Route::resource('users', UserController::class);

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('jobs', OrderController::class);
