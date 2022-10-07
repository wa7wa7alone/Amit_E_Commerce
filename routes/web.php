<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


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
    return view('user.home');
});



// Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');

// Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');

// Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');

// Route::get('admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');

// Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');

// Route::patch('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

// Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.',
//     'middleware' => 'auth'
// ], function () {
//     Route::get('/', AdminController::class); // route('admin')
//     Route::resource('users', UserController::class);
// });


// Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {
//     Route::get('/', AdminController::class); // route('admin')
//     Route::resource('users', UserController::class);
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home'); //->middleware('auth')


Route::get('/home', [App\Http\Controllers\UserHomeController::class, 'index'])->name('user.home');
Route::patch('/home/myaccount/{id}', [App\Http\Controllers\UserInfoController::class, 'update'])->name('user.myaccount.update');
Route::get('/home/myaccount/{id}/edit', [App\Http\Controllers\UserInfoController::class, 'edit'])->name('user.myaccount');

// Route::get('/home/cart', function () {
//     return view('user.cart');
// });
Route::get('/home/addcart/{id}', [App\Http\Controllers\UserHomeController::class, 'addcart'])->name('user.addcart');
Route::get('/home/cart', [App\Http\Controllers\UserHomeController::class, 'cart'])->name('user.cart');
Route::delete('/home/deletecart/{id}', [App\Http\Controllers\UserHomeController::class, 'deletecart'])->name('user.deletecart');

Route::get('/home/addfavorite/{id}', [App\Http\Controllers\UserHomeController::class, 'addfavorite'])->name('user.addfavorite');
Route::get('/home/favorite', [App\Http\Controllers\UserHomeController::class, 'favorite'])->name('user.favorite');
Route::get('/home/deletefavorite/{id}', [App\Http\Controllers\UserHomeController::class, 'deletefavorite'])->name('user.deletefavorite');

// Route::get('/home/myaccount', function () {
//     return view('user.myaccount');
// });

Route::get('/search',[App\Http\Controllers\Admin\ProductController::class, 'search']);

// Route::get('/home/myaccount', [UserApiController::class,'index'])->name('user.myaccount');



