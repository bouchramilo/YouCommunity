<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


// ********************************************************************************************************
// get views
Route::get('/events/create', function () {
    return view('createEvent');
})->middleware(['auth', 'verified'])->name('events.create');

Route::get('/allevents', function () {
    return view('allEvents');
})->middleware(['auth', 'verified'])->name('show.allevents');







Route::middleware('auth')->group(function () {
    Route::get('/myEvents', [EventController::class, 'showMyEvents'])->name('events.myEvents');
    Route::post('event/create', [EventController::class, 'store'])->name('event.create');
    Route::get('event/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::delete('event/delete/{event}', [EventController::class, 'destroy'])->name('event.delete');
    Route::get('/detailsEvent/{event}', [EventController::class, 'show'])->name('event.show');
});
