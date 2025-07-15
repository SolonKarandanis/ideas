<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.create');
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
Route::get('ideas/{id}',[IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{id}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');
Route::put('/ideas/{id}', [IdeaController::class, 'update'])->name('ideas.update');

Route::post('/ideas/{id}/comments', [CommentController::class, 'store'])->name('ideas.comments.create');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

