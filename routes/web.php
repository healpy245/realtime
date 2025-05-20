<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/create', function () {
    return view('messages/create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/messages', function () {
    return view('messages.index');
})->middleware(['auth', 'verified'])->name('messages');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/test-pusher', function () {
    return [
        'PUSHER_APP_ID' => config('broadcasting.connections.pusher.app_id'),
        'PUSHER_APP_KEY' => config('broadcasting.connections.pusher.key'),
        'PUSHER_APP_SECRET' => config('broadcasting.connections.pusher.secret'),
        'PUSHER_APP_CLUSTER' => config('broadcasting.connections.pusher.options.cluster'),
    ];
});




require __DIR__.'/auth.php';
