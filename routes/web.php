<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [PublicController::class, 'index'])->name('index');

Route::middleware('only_guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function(){
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('profile', [UserController::class,'profile'])->middleware('only_client');
    Route::post('/', [RentLogController::class, 'rentBook'])->name('rentbook');

    Route::prefix('admin')->middleware('only_admin')->group(function() {
        Route::get('dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

        Route::get('books',[BookController::class,'index'])->name('admin.books');
        Route::get('book-add',[BookController::class,'add'])->name('admin.book.add');
        Route::post('book-add',[BookController::class, 'store'])->name('admin.book.store');
        Route::get('book-edit/{slug}', [BookController::class,'edit'])->name('admin.book.edit');
        Route::post('book-edit/{slug}', [BookController::class,'update'])->name('admin.book.update');
        Route::get('book-delete/{slug}', [BookController::class,'delete'])->name('admin.book.delete');
        Route::get('book-destroy/{slug}',[BookController::class,'destroy'])->name('admin.book.destroy');
        Route::get('book-restore/{slug}',[BookController::class,'restore'])->name('admin.book.restore');
        Route::get('book-deleted',[BookController::class,'deletedBook'])->name('admin.deletedbook');

        Route::get('categories',[CategoryController::class,'index'])->name('admin.category');
        Route::get('category-add',[CategoryController::class,'add'])->name('admin.category.add');
        Route::post('category-add',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('category-edit/{name} ',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('category-edit/{name}',[CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('category-delete/{name}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('category-destroy/{name}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        Route::get('category-restore/{name}', [CategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory'])->name('admin.deletedcategory');

        Route::get('users',[UserController::class,'index'])->name('admin.users');
        Route::get('registered-users',[UserController::class, 'registeredUser'])->name('admin.registeredusers');
        Route::get('user-detail/{slug}', [UserController::class, 'show'])->name('admin.user.detail');
        Route::get('user-approve/{slug}', [UserController::class, 'approve'])->name('admin.user.approve');
        Route::get('user-ban/{slug}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('user-restore/{slug}', [UserController::class, 'restore'])->name('admin.user.restore');
        Route::get('user-banned', [UserController::class, 'bannedUser'])->name('admin.bannedusers');

        Route::get('rent-logs',[RentLogController::class,'index'])->name('admin.rentlogs');
    });

    });
