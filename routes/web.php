<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageController;
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
Route::prefix('manage')->group(function () {
    Route::get('/', [ManageController::class, 'index'])->name('dashboard');
});