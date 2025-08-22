<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;


Route::get('/', [PostsController::class, 'home'])->name('home');

Route::prefix('/posts')->controller(PostsController::class)->group(function () {

Route::get('/','home')->name('posts.index');
Route::get('/create','create')->name('posts.create');
Route::post('/','store')->name('posts.store');
Route::get('/{id}' ,'show')->name('posts.show');
Route::get('/{id}/edit' ,'editPost')->name('posts.edit');
Route::put('/{id}' ,'update')->name('posts.update');
Route::delete('/{id}' ,'destroy')->name('posts.destroy');

});

Route::prefix('/comments')->controller(CommentsController::class)->group(function () {
    Route::post('/','store')->name('comments.store');
Route::get('/{id}/edit', 'edit')->name('comments.edit');
Route::put('/{id}' ,'update')->name('comments.update');
Route::delete('/{id}' ,'destroy')->name('comments.destroy');
});




Route::fallback(function () {
    return 404;
});

