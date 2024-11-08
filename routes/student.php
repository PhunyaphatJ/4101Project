<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::post('/', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [StudentController::class, 'register'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// get ได้เเค่ data เเต่ get เธอกลับมาไม่ได้ 🥺

Route::prefix('student')->middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::view('/', 'student.test')->name('student');
    // Route::get('/')
    
    Route::get('/manual/{student_process_status}', [StudentController::class, 'manual'])->name('manual');
    Route::get('/process/{student_process_status}', [StudentController::class, 'process'])->name('process');
    Route::get('/process/process_register_for_internship/{student_process_status}', [StudentController::class, 'process_register_for_internship'])->name('process_register_for_internship');
    Route::post('/compare_internship_register', [StudentController::class, 'compare_internship_register'])->name('compare_internship_register');
    Route::get('/process/process_company/{student_process_status}', [StudentController::class, 'process_company'])->name('process_company');
    Route::get('/process/process_company_rec/{student_process_status}/{app_type}', [StudentController::class, 'process_company_rec'])->name('process_company_rec');
    Route::get('/process/process_company_rec_with_request/{student_process_status}/{app_type}', [StudentController::class, 'process_company_rec_with_request'])->name('process_company_rec_with_request');

    Route::get('/process/process_company_search_address/{student_process_status}/{app_type}', [StudentController::class, 'process_company_search_address'])->name('process_company_search_address');
    Route::post('/company_search_address/{student_process_status}/{app_type}', [StudentController::class, 'company_search_address'])->name('company_search_address');
    Route::get('select_company/{student_process_status}/{app_type}/{company_id}', [StudentController::class, 'select_company'])->name('select_company');

    Route::get('/process/process_company_add_address/{student_process_status}/{app_type}', [StudentController::class, 'process_company_add_address'])->name('process_company_add_address');
    Route::post('/compare_company/{student_process_status}/{app_type}', [StudentController::class, 'compare_company'])->name('compare_company');

    Route::get('/process/process_company_choose_address/{student_process_status}/{app_type}', [StudentController::class, 'process_company_choose_address'])->name('process_company_choose_address');
    Route::post('/compare_internship_info/{student_process_status}/{app_type}', [StudentController::class, 'compare_internship_info'])->name('compare_internship_info');
    Route::get('/process/add_mentor/{student_process_status}/{app_type}', [StudentController::class, 'add_mentor'])->name('add_mentor');
    Route::post('/compare_mentor/{student_process_status}/{app_type}', [StudentController::class, 'compare_mentor'])->name('compare_mentor');

    Route::get('/process/professor_info/{student_process_status}', [StudentController::class, 'professor_info'])->name('professor_info');
    Route::get('/process/report/{student_process_status}', [StudentController::class, 'report'])->name('report');
    Route::post('/add_report/{student_process_status}', [StudentController::class, 'add_report'])->name('add_report');
    Route::get('/app_status/{student_process_status}', [StudentController::class, 'app_status'])->name('app_status');



});
