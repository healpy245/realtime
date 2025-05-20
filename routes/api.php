<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Broadcast;

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

// Message routes
Route::middleware('auth:sanctum')->post('/messages', function (Request $request) {
    $request->validate([
        'message' => 'required|string'
    ]);

    
    // Broadcast the message
    Broadcast(new MessageSent($request->message));
    
    
    return response()->json([
        'message' => 'Message sent successfully',
        'data' => $request->message
    ], 201);
})->name('messages.store');

