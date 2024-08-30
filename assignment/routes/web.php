<?php

use App\Http\Controllers\TinController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Routes cho Tin Tức
Route::get('/', [TinController::class, 'index'])->name('home');
Route::get('/tin/{id}', [TinController::class, 'chitiet'])->name('chitiet');
Route::get('/bongda', [TinController::class, 'tinBongDa'])->name('tin.bongda');
Route::get('/dulich', [TinController::class, 'tinDuLich'])->name('tin.dulich');
Route::get('/suckhoe', [TinController::class, 'tinSucKhoe'])->name('tin.suckhoe');

// Trang Giới Thiệu
Route::view('/gioi-thieu', 'intro')->name('intro');

// Trang Liên Hệ
Route::view('/lien-he', 'contact')->name('contact');

// Routes cho Quản Trị Danh Mục
Route::prefix('admin/categories')->name('admin.categories.')->middleware(['auth'])->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});

// Routes cho Quản Trị Bài Viết
Route::prefix('admin/articles')->name('admin.articles.')->middleware(['auth'])->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/', [ArticleController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('destroy');
});

// Routes cho Quản Trị Bình Luận
Route::prefix('admin/comments')->name('admin.comments.')->middleware(['auth'])->group(function () {
    Route::get('/', [CommentController::class, 'index'])->name('index');
    Route::delete('/{id}', [CommentController::class, 'destroy'])->name('destroy');
});
// Routes cho Bình Luận của Bài Viết
Route::post('/tin/{id}/comment', [TinController::class, 'storeComment'])->name('comments.store');

// Routes cho Quản Trị Người Dùng
Route::prefix('admin/users')->name('admin.users.')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});

// Routes cho Đăng Nhập/Đăng Ký
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Trang Dashboard cho Admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
