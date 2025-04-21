<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\UndanganPublicController;
use App\Http\Controllers\MusicController;

Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('undangan', \App\Http\Controllers\Admin\UndanganController::class);
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class);
    Route::resource('love-story', \App\Http\Controllers\Admin\LoveStoryController::class);
    Route::resource('ucapan', \App\Http\Controllers\Admin\UcapanController::class);
});
Route::get('/undangan/{slug}', [UndanganController::class, 'show'])->name('undangan.show');
Route::post('/rsvp/{slug}', [RsvpController::class, 'store'])->name('rsvp.store');
Route::get('/admin/rsvp/{slug}', [RsvpController::class, 'index'])->name('rsvp.index');

Route::get('/music', [MusicController::class, 'index'])->name('music.index');
Route::post('/music', [MusicController::class, 'store'])->name('music.store');

Route::get('/admin/create', [UndanganController::class, 'create'])->name('undangan.create');

