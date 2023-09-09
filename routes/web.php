<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\User;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authentication'])->name('authentication');
Route::get('/forget-password', [UserController::class, 'forget'])->name('password.forget');
Route::post('/forget-password', [UserController::class, 'submitForget'])->name('password.post.forget');
Route::get('/reset-password/{token}', [UserController::class, 'resetForm'])->name('password.reset');
Route::post('/reset-password/{token}', [UserController::class, 'resetPassword'])->name('password.reset.change');
Route::middleware('auth.admin')->prefix('manage')->group(function () {
    Route::get('/', [ManageController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ManageController::class, 'profile'])->name('profile');
    Route::patch('/profile', [ManageController::class, 'updateProfile'])->name('update.profile');
    Route::get('/logout', [ManageController::class, 'logout'])->name('logout');
    Route::get('/products/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/products/add', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products', [ProductController::class, 'index'])->name('product.list');
    Route::get('/categories/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/categories/add', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/categories/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});