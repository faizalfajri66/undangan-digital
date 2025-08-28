<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\UndanganPublicController;
use App\Http\Controllers\MusicController;
use App\Models\Undangan;

Route::get('/dashboard', [DataController::class, 'index'])->name('adminn.index');
Route::get('/', function () {
    return view('index');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DataController::class, 'index'])->name('index');
    Route::post('/store', [DataController::class, 'store'])->name('store');
    Route::delete('/{undangan}', [DataController::class, 'destroy'])->name('destroy');
});

Route::get('undangan', [UndanganController::class, 'index'])->name('undangan.index');
Route::get('/undangan/{slug}', [UndanganController::class, 'show'])->name('undangan.show');
Route::post('/rsvp/{slug}', [RsvpController::class, 'store'])->name('rsvp.store');
Route::get('/admin/rsvp/{slug}', [RsvpController::class, 'index'])->name('rsvp.index');
Route::get('/music', [MusicController::class, 'index'])->name('music.index');
Route::post('/music', [MusicController::class, 'store'])->name('music.store');
Route::post('/admin/data', [DataController::class, 'store'])->name('undangan.store');
