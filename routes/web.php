<?php

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

Route::redirect('/', '/posts');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::resource('posts', \App\Http\Controllers\PostController::class, ['except' => ['index', 'show']]);

    Route::resources([
        'posts/{post}/comments' => \App\Http\Controllers\PostCommentController::class,
    ]);
});

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
