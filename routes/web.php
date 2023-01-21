<?php

declare(strict_types=1);

use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StorePostController;
use Illuminate\Support\Facades\Route;

Route::get('/', PostController::class)
    ->name('posts.index');

Route::get('/create', CreatePostController::class)
    ->name('posts.create');

Route::post('/store', StorePostController::class)
    ->name('posts.store');
