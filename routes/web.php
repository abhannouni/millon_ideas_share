<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\commentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('/posts', postController::class);
Route::resource('/ideas', postController::class);
// Route::resource('/comments', commentController::class);
// Route::post('/comments', [CommentController::class, 'store']);
// Route::post('/comments', [CommentController::class]);
Route::post('/comments/store', [CommentController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

