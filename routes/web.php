<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommetController;

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


Route::get('/',function(){
    return view('home');
})->name('home');
Route::get('/home',function(){
    return view('home');
})->name('home');


Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->name('register')->middleware('guest');
Route::get('/login',[RegisterController::class,'loginForm'])->name('login')->middleware('guest');
Route::post('/login',[RegisterController::class,'login'])->name('login')->middleware('guest');
Route::post('/logout',[RegisterController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

// post routes
Route::get('/posts',[PostsController::class,'index'])->name('posts');
Route::post('/posts',[PostsController::class,'store'])->name('posts');

// like routes
Route::post('/posts/{post}/like',[LikeController::class,'store'])->name('like');
Route::delete('/posts/{post}/dislike',[LikeController::class,'deleteLike'])->name('deletelike');

// Comment routes 
// Route::get('/posts/{post}/comment',[CommetController::class,'index'])->name('comments');
Route::post('/posts/{post}/comment',[CommetController::class,'get'])->name('comments');
