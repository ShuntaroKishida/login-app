<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

// 新規登録画面を表示
Route::get('register', [UsersController::class, 'showRegistrationForm'])->name('register');

// 新規登録処理
Route::post('register', [UsersController::class, 'register']);

// ログイン画面を表示
Route::get('login', [UsersController::class, 'showLoginForm'])->name('login');

// ログイン処理
Route::post('login', [UsersController::class, 'login']);

// マイページ画面を表示
Route::get('/', [UsersController::class, 'index'])->name('home')->middleware('auth');

// ログアウト処理
Route::post('logout', [UsersController::class, 'logout'])->name('logout');
