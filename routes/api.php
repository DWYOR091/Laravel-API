<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/post', [PostController::class, 'store']);
    Route::put('/update/{id}', [PostController::class, 'update'])->middleware('pemilikPostingan');
    Route::delete('/delete/{id}', [PostController::class, 'delete'])->middleware('pemilikPostingan');

    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/update/{id}', [CommentController::class, 'update'])->middleware('pemilikComment');
    Route::delete('/delete/{id}', [CommentController::class, 'delete'])->middleware('pemilikComment');
});
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);

Route::post('/login', [AuthenticationController::class, 'login']);