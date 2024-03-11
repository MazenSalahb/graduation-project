<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth routes
Route::get('/users', UserController::class . '@index');
Route::post('/signup', UserController::class . '@store')->middleware('guest');
Route::post('/signin', UserController::class . '@login')->middleware('guest');


// Book routes
Route::get('/books', BookController::class . '@index');
Route::get('/books/swap', BookController::class . '@swap');
Route::get('/books/{id}', BookController::class . '@show');
Route::get('/books/user/{id}', BookController::class . '@userBooks');
Route::post('/books', BookController::class . '@store')->middleware('auth:sanctum');
Route::delete('/books/{id}', BookController::class . '@destroy')->middleware('auth:sanctum');


// Category routes
Route::get('/categories', CategoryController::class . '@index');
Route::post('/categories', CategoryController::class . '@store');


// Review routes
Route::get('/reviews', ReviewController::class . '@index');
Route::post('/reviews', ReviewController::class . '@store')->middleware('auth:sanctum');
