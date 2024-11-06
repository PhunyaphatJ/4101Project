<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\StatisticController;


Route::get('/student_grade',[GradeController::class,'students_grade']);

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
->name('logout');

require __DIR__.'/admin.php';
require __DIR__.'/student.php';
require __DIR__.'/auth.php';


