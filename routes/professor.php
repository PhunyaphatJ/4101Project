<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Models\Professor;

Route::prefix('professor')->middleware('auth','role:professor')->group(function(){

    Route::get('/',[ProfessorController::class,'index'])->name('index');
    Route::get('/internship_infomation/{internship_id}',[ProfessorController::class,'intern_information'])->name('internship_information');
    Route::get('/request_appreciation/{internship_id}',[ProfessorController::class,'request_appreciation'])->name('request_appreciatoin');
    Route::post('/assign_grade/{internship_id}',[ProfessorController::class,'assign_grade'])->name('assign_grade');

});
