<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/seed', [SeedController::class, 'index']);

// POST //

Route::get('/posts', [PostController::class, "index"]);
Route::get('/posts/{post_id}', [PostController::class, "show"]);

Route::get('/user/{user_id}', [UserController::class, "show"]);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/post', PostController::class)->only(["store", "edit", "update", "destroy", "create"]);
    Route::resource('/user', UserController::class)->only(["edit", "update"]);
});

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');



//dodelat edit update delete u POST a pak vse udelat s kategoriema