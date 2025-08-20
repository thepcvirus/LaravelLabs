<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

Route::get('/', [PostsController::class, 'home'])->name('home');

Route::get('/posts', [PostsController::class, 'home'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}' , [PostsController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit' , [PostsController::class, 'editPost'])->name('posts.edit');
Route::put('/posts/{id}' , [PostsController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}' , [PostsController::class, 'destroy'])->name('posts.destroy');


Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}/edit' , [CommentsController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id}' , [CommentsController::class, 'update'])->name('comments.update');
Route::delete('/comments/{id}' , [CommentsController::class, 'destroy'])->name('comments.destroy');


Route::fallback(function () {
    return 404;
});

