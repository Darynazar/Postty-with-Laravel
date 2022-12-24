<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

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

Route::get('/', function(){
    return view('home');
 })->name('home');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');
//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

 //Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Post

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts', [PostController::class, 'destroy'])->name('posts.destroy');
//Postlike
Route::get('/posts/{post}/like', [PostLikeController::class, 'destroy'])->name('posts.unlike');
Route::post('/posts/{post}/like', [PostLikeController::class, 'store'])->name('posts.likes');


