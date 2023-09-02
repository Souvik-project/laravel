<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MyController;
use App\Http\Controllers\UserController;

Route::get('/user/home', [UserController::class, 'homelayout'])->name('user.layout.homelayout');
Route::get('/user/index', [UserController::class, 'index'])->name('user.layout.index');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.layout.show');
Route::post('/user/layout/add', [UserController::class, 'add'])->name('user.layout.add');
Route::get('/user/cart/{id}', [UserController::class, 'cart'])->name('user.layout.cart');
Route::delete('/{id}', [UserController::class, 'remove'])->name('user.layout.remove');

//////////////////// Server Side Routes////////////////////

Route::get('/admin/create', [MyController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [MyController::class, 'store'])->name('admin.store');
Route::get('/admin/index', [MyController::class, 'index'])->name('admin.index');
Route::get('/admin/datatable', [MyController::class, 'datatable'])->name('admin.datatable');
Route::get('/admin/{id}/edit', [MyController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [MyController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [MyController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/{id}', [MyController::class, 'show'])->name('admin.show');

