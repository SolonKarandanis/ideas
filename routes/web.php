<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['prefix' => 'ideas','as'=>'ideas.'], function () {
    Route::post('', [IdeaController::class, 'store'])->name('create');
    Route::delete('/{id}', [IdeaController::class, 'destroy'])->name('destroy');
    Route::get('/{id}',[IdeaController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [IdeaController::class, 'update'])->name('update');

    Route::post('/ideas/{id}/comments', [CommentController::class, 'store'])->name('comments.create');
})
    ->middleware(['auth']);

Route::group(['prefix' => 'users','as'=>'users.'], function () {
    Route::get('/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
})->middleware(['auth']);

Route::get('profile', [UserController::class, 'profile'])->name('profile')
    ->middleware(['auth']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

