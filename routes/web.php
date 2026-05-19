<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Static\StaticController;
use Illuminate\Support\Facades\Route;

// Admin Dashboard Route
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Client Dashboard Route
Route::get('/client', [ClientController::class, 'index'])->name('client.dashboard');

// Static Pages Routes
Route::get('/', [StaticController::class, 'home'])->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
});

require __DIR__.'/settings.php';
