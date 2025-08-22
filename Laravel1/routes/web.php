<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ApiController;


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

Route::prefix('/api')->controller(ApiController::class)->group(function () {
    Route::get('/', function () {
    return response()->json(['message' => 'API is working']);
})->name('api.index');
Route::get('/posts/{id}', 'getPost')->name('api.getPost');
Route::get('/posts', 'getAllPosts')->name('api.getAllPosts');
Route::post('/posts', 'CreatePost')->name('api.createPost');
});




Route::fallback(function () {
    return 404;
});

