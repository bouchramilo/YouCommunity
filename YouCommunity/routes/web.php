<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\InvitationController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


// ********************************************************************************************************

Route::get('/dashboard', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// get views
Route::get('/events/create', function () {
    return view('createEvent');
})->middleware(['auth', 'verified'])->name('events.create');

Route::middleware('auth')->group(function () {
    // Route::get('/allevents', [EventController::class, 'index'])->name('show.allevents');
    Route::get('/myEvents', [EventController::class, 'showMyEvents'])->name('events.myEvents');
    Route::post('event/create', [EventController::class, 'store'])->name('event.create');
    Route::put('/event/update/{event}', [EventController::class, 'update'])->name('event.update');
    Route::get('event/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::delete('event/delete/{event}', [EventController::class, 'destroy'])->name('event.delete');
    Route::get('/detailsEvent/{event}', [EventController::class, 'show'])->name('event.show');
});

Route::middleware('auth')->group(function () {
    Route::post('/detailsEvent/{event}/comment/add', [CommentController::class, 'store'])->name('event.comment.add');
    Route::post('/detailsEvent/{event}/comment/delete', [CommentController::class, 'destroy'])->name('event.comment.delete');
});


Route::post('/event/{event}/inscriptions', [EventRegistrationController::class, 'destroy'])->name('event.delete.inscriptions')->middleware('auth');
Route::get('/event/{event}/inscriptions', [EventRegistrationController::class, 'show'])->name('event.show.inscriptions')->middleware('auth');
Route::post('/event/register', [EventRegistrationController::class, 'register'])->name('event.register')->middleware('auth');
Route::post('/event/{eventId}/unregister', [EventRegistrationController::class, 'unregister'])->name('event.unregister')->middleware('auth');


Route::middleware('auth')->get('/event/{event_id}/is-registered', [EventRegistrationController::class, 'isRegistered'])->name('event.isRegistered');
Route::middleware('auth')->get('/myInscriptions', [EventRegistrationController::class, 'showAll'])->name('my.inscription');



Route::get('/myInvitation', [InvitationController::class, 'show'])->name('my.invitation')->middleware('auth');
