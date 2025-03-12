<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get("/profile/{id}", [AuthController::class, "profile"])->name('profile');


Route::get("/", [PagesController::class, 'index'])->name('index');

Route::post('/posts/{post}/comment', [PostController::class, 'comment'])->name('post.comment');
Route::delete('/comment/{comment}', [PostController::class, 'destroyComment'])->name('comment.destroy');

Route::resource('/post', PostController::class);
