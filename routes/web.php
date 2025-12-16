<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\ExpertController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/eap', action: function () {
    return view('eap');
});

Route::post('/contact-request', [ContactRequestController::class, 'store'])->name('contact-request.store');
Route::get('/talk-it-out', action: function () {
    return view('talk_it_out');
})->name('talk.it.out');

Route::get('/load-more-experts', [ExpertController::class, 'ajax_load'])->name('load.more.experts');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
