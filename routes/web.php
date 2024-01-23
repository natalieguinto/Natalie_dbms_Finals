<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
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

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/participant', [ParticipantController::class, 'show'])->name('show');

Route::prefix('events')->group(function () {
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    Route::delete('/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::prefix('participants')->group(function () {
    Route::post('/', [ParticipantController::class, 'store'])->name('participants.store');
    Route::delete('/{id}', [ParticipantController::class, 'destroy'])->name('participants.destroy');
    Route::get('/participants/{id}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
    Route::put('/participants/{id}', [ParticipantController::class, 'update'])->name('participants.update');
    Route::get('/participants/{id}', [ParticipantController::class, 'show'])->name('participants.show');

});
