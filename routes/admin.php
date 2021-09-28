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

Route::redirect('/', '/admin/dashboard');

require __DIR__.'/admin_auth.php';

Route::middleware('auth:admin')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resources([
        'users' => \App\Http\Controllers\Admin\UserController::class,
        'posts' => \App\Http\Controllers\Admin\PostController::class,
    ]);

    Route::get('posts/{post}/comments/{comment}', [\App\Http\Controllers\Admin\PostCommentController::class, 'destroy'])->name('comments.destroy');
});
