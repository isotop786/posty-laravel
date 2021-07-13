<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');

Route::get('/home',function(){
    return view('home');
})->name('home');


Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->name('register')->middleware('guest');
Route::get('/login',[RegisterController::class,'loginForm'])->name('login')->middleware('guest');
Route::post('/login',[RegisterController::class,'login'])->name('login')->middleware('guest');
Route::post('/logout',[RegisterController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');