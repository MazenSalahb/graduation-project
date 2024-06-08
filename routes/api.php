<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookMarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
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
Route::put('/users/{id}', UserController::class . '@update')->middleware('auth:sanctum');
// Change password route
Route::put('/users/{id}/password', UserController::class . '@changePassword')->middleware('auth:sanctum');
// delete user route
Route::delete('/users/{id}', UserController::class . '@destroy')->middleware('auth:sanctum');


// Book routes
Route::get('/books', BookController::class . '@index');
Route::get('/books/swap', BookController::class . '@swap');
Route::get('/books/{id}', BookController::class . '@show');
Route::get('/books/user/{id}', BookController::class . '@userBooks');
Route::get('/books/category/{id}', BookController::class . '@categoryBooks');
Route::post('/books', BookController::class . '@store')->middleware('auth:sanctum');
Route::put('/books/{id}', BookController::class . '@update')->middleware('auth:sanctum');
Route::delete('/books/{id}', BookController::class . '@destroy')->middleware('auth:sanctum');
Route::put('/books/sold/{id}', BookController::class . '@sold')->middleware('auth:sanctum');
// Search route
Route::post('/books/search', BookController::class . '@search');


// Category routes
Route::get('/categories', CategoryController::class . '@index');
Route::post('/categories', CategoryController::class . '@store');


// Review routes
Route::get('/reviews', ReviewController::class . '@index');
Route::get('/reviews/{id}', ReviewController::class . '@show');
Route::get('/reviews/user/{id}', ReviewController::class . '@userReviews');
Route::get('/reviews/book/{id}', ReviewController::class . '@bookReviews');
Route::post('/reviews', ReviewController::class . '@store')->middleware('auth:sanctum');
Route::delete('/reviews/{id}', ReviewController::class . '@destroy')->middleware('auth:sanctum');


// Chats routes
Route::get('/chats', ChatController::class . '@index');
Route::get('/chats/{id}', ChatController::class . '@show');
Route::get('/chats/userBuying/{id}', ChatController::class . '@userBuyingChats');
Route::get('/chats/userSelling/{id}', ChatController::class . '@userSellingChats');
Route::get('/chats/user/{id}', ChatController::class . '@userChats');
Route::get('/chats/book/{id}', ChatController::class . '@bookChats');
Route::get('/chats/exist/{seller}/{buyer}/{bookid}', ChatController::class . '@checkChatExistence');
Route::post('/chats', ChatController::class . '@store')->middleware('auth:sanctum');
Route::delete('/chats/{id}', ChatController::class . '@destroy')->middleware('auth:sanctum');


// Message routes
Route::get('/messages', MessageController::class . '@index');
Route::get('/messages/{id}', MessageController::class . '@show');
Route::get('/messages/chat/{id}', MessageController::class . '@chatMessages');
Route::post('/messages', MessageController::class . '@store')->middleware('auth:sanctum');
Route::delete('/messages/{id}', MessageController::class . '@destroy')->middleware('auth:sanctum');


// Notification routes
Route::get('/notifications', NotificationController::class . '@index')->middleware('auth:sanctum');


// * Bookmarks routes
Route::get('/bookmarks', BookMarkController::class . '@index');
Route::get('/bookmarks/{id}', BookMarkController::class . '@show');
Route::get('/bookmarks/user/{id}', BookMarkController::class . '@userBookmarks');
Route::post('/bookmarks', BookMarkController::class . '@store');
Route::delete('/bookmarks/{id}', BookMarkController::class . '@destroy')->middleware('auth:sanctum');


// * Admin routes
Route::get('/admin/books/count', BookController::class . '@countBooks');
Route::get('/admin/users/count', UserController::class . '@countUsers');
Route::get('/admin/books/pending', BookController::class . '@pendingBooks');
Route::get('/admin/books/approval', BookController::class . '@approvalBooks');
Route::put('/admin/books/approve/{id}', BookController::class . '@approveBooks');
Route::get('/admin/books/rejected', BookController::class . '@rejectedBooks');
Route::put('/admin/books/reject/{id}', BookController::class . '@rejectBooks');
Route::delete('/admin/books/{id}', BookController::class . '@destroy');
// ->middleware('auth:sanctum', 'admin');
