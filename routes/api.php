<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketcategoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Models\Ticketcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/categories', [TicketcategoryController::class, 'getall']);
Route::get('/category/{ticket}', [TicketcategoryController::class, 'getone']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{customer}', [OrderController::class, 'ordersby']);

Route::get('/tickets', [TicketController::class, 'tickets']);
Route::get('/tickets/{customer}', [TicketController::class, 'ticketsby']);
Route::get('/ticketsfor/{employee}', [TicketController::class, 'ticketsfor']);
Route::get('/countticketsfor/{employee}', [TicketController::class, 'countticketsfor']);
Route::get('/ticket/{ticket}', [TicketController::class, 'ticket']);
Route::post('/ticket/transfer', [TicketController::class, 'transfer']);

Route::get('/commentsforticket/{ticket}', [CommentController::class, 'getcommentsforticket']);
Route::get('/countcommentsforticket/{ticket}', [CommentController::class, 'countcommentsforticket']);
Route::post('/comment/store', [CommentController::class, 'store']);


