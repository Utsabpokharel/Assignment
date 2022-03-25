<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//home
Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('homepage');
//register
Route::get('/register', [App\Http\Controllers\AdminController::class, 'register'])->name('register');
Route::post('/store-user', [App\Http\Controllers\AdminController::class, 'store'])->name('user.store');
//login
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(
    ['middleware' => ['auth']],
    function () {
        //questions
        Route::resource('question', QuestionController::class);
        //comment
        Route::resource('comment', CommentController::class);
    }
);
