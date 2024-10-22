<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UIController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ui_layout.login');
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

Route::get('/{menu}',[UIController::class,'select_menu']);
