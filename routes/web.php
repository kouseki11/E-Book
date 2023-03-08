<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\LandingController;
use App\Http\Controllers\Admin\BookPostController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryPostController;

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

Route::middleware(['IsLogin', 'CheckRole:admin'])->group(function(){
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::resource('/dashboard/user', DataUserController::class);
    Route::resource('/dashboard/book', BookPostController::class);
    Route::resource('/dashboard/category', CategoryPostController::class);
    Route::get('/export-excel/users', [DataUserController::class, 'export'])->name('export-excel-users');
    Route::get('/export-excel/books', [BookPostController::class, 'export'])->name('export-excel-books');
});

Route::middleware('IsGuest')->group(function(){
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'registerStore'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('login.auth');
});

Route::middleware('IsLogin', 'CheckRole:admin,user')->group(function(){
    Route::get('/error', [UserController::class, 'error'])->name('error');
    Route::get('/book', [BookController::class, 'index'])->name('book.page');
    Route::get('/book/{book:slug}', [BookController::class, 'show'])->name('book.single');
    Route::get('/export-pdf/{book:slug}', [BookController::class, 'downloadPdf'])->name('export-pdf');
    Route::get('/error', [UserController::class, 'error'])->name('error');
});

Route::middleware('IsLogin', 'CheckRole:user')->group(function(){
});

Route::get('/', [LandingController::class, 'index'])->name('landing.page');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
