<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Guest routes (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', [RegisterController::class, 'store']);
});

// Auth routes (sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    
    Route::get('/dashboard', function () {
        $categories1 = Post::where('category_id', 1)->count();
        $categories2 = Post::where('category_id', 2)->count();
        return view('dashboard.index', compact('categories1', 'categories2'));
    });
    
    Route::get('/dashboard/posts/checkSlug', [PostController::class, 'checkSlug']);
    Route::resource('/dashboard/posts', PostController::class);
});