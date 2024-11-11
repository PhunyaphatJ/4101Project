<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;




Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
->name('logout');

require __DIR__.'/admin.php';
require __DIR__.'/student.php';
require __DIR__.'/professor.php';
require __DIR__.'/auth.php';


