<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/',[UserController::class,'login'])->name('login');
Route::post('/',[UserController::class,'login_verify'])->name('login_verify');

Route::prefix('admin')->group(function(){
    Route::get('/', function () { return view('admin.fake_login'); });
    // sidebar
    Route::get('/manage_application/approval',[AdminController::class,'application_approval'])->name('application_approval');
    Route::get('/manage_application/update_document_status',[AdminController::class,'application_update_document_status'])->name('application_update_document_status');
    Route::get('/manage_application/history',[AdminController::class,'application_history'])->name('application_history');
    Route::get('/manage_document',[AdminController::class,'manage_document'])->name('manage_document');
    Route::get('/manage_user/professor',[AdminController::class,'manage_user_professor'])->name('manage_user_professor');
    Route::get('/manage_user/student',[AdminController::class,'manage_user_student'])->name('manage_user_student');
    Route::get('/statistics/yearly',[AdminController::class,'statistics_yearly'])->name('statistics_yearly');
    Route::get('/statistics/compare_yearly',[AdminController::class,'statistics_compare_yearly'])->name('statistics_compare_yearly');
    Route::get('/statistics/evaluation',[AdminController::class,'statistics_evaluation'])->name('statistics_evaluation');
    Route::get('/check_grade',[AdminController::class,'check_grade'])->name('check_grade');
    // application approval
    Route::get('/manage_application/approval/{application_type}',[AdminController::class,'application_approval_list'])->name('application_approval_list');
    Route::get('/manage_application/approval/{application_type}/{application_id}',[AdminController::class,'application_approval_detail'])->name('application_approval_detail');
    Route::get('/manage_application/approval/{application_type}/{application_id}/approve',[AdminController::class,'approve_application'])->name('approve_application');
    Route::post('/manage_application/approval/{application_type}/{application_id}/reject',[AdminController::class,'reject_application'])->name('reject_application');
    Route::get('/manage_application/approval/{application_type}/{application_id}/assign_professor',[AdminController::class,'assign_professor'])->name('assign_professor');
    // application update document status
    Route::get('/manage_application/update_document_status/{application_type}',[AdminController::class,'application_update_document_status_list'])->name('application_update_document_status_list');
    Route::get('/manage_application/update_document_status/{application_type}/{application_id}',[AdminController::class,'application_update_document_status_detail'])->name('application_update_document_status_detail');
    Route::get('/manage_application/update_document_status/{application_type}/{application_id}/completed',[AdminController::class,'application_update_document_status_complete'])->name('application_update_document_status_complete');
    // application history
    Route::get('/manage_application/history/{application_type}',[AdminController::class,'application_history_list'])->name('application_history_list');
    Route::get('/manage_application/history/{application_type}/{application_id}',[AdminController::class,'application_history_detail'])->name('application_history_detail');
});

// ----------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/registerr',[StudentController::class,'register']);
Route::post('/compare_register',[StudentController::class,'compare_register'])->name('register');

Route::prefix('student')->group(function(){
    Route::get('/manual/{student_process_status}',[StudentController::class,'manual'])->name('manual');
    Route::get('/process/{student_process_status}',[StudentController::class,'process'])->name('process');
    Route::get('/process/process_register_for_internship/{student_process_status}',[StudentController::class,'process_register_for_internship'])->name('process_register_for_internship');
    Route::post('/compare_internship_register',[StudentController::class,'compare_internship_register'])->name('compare_internship_register');
    Route::get('/process/process_company/{student_process_status}',[StudentController::class,'process_company'])->name('process_company');
    Route::get('/process/process_company_rec/{student_process_status}/{app_type}',[StudentController::class,'process_company_rec'])->name('process_company_rec');
    Route::get('/process/process_company_rec_with_request/{student_process_status}/{app_type}',[StudentController::class,'process_company_rec_with_request'])->name('process_company_rec_with_request');
    
    Route::get('/process/process_company_search_address/{student_process_status}/{app_type}',[StudentController::class,'process_company_search_address'])->name('process_company_search_address');
    Route::post('/company_search_address/{student_process_status}/{app_type}',[StudentController::class,'company_search_address'])->name('company_search_address');
    Route::get('select_company/{student_process_status}/{app_type}/{company_id}',[StudentController::class,'select_company'])->name('select_company');

    Route::get('/process/process_company_add_address/{student_process_status}/{app_type}',[StudentController::class,'process_company_add_address'])->name('process_company_add_address');
    Route::post('/compare_company/{student_process_status}/{app_type}',[StudentController::class,'compare_company'])->name('compare_company');

    Route::get('/process/process_company_choose_address/{student_process_status}/{app_type}',[StudentController::class,'process_company_choose_address'])->name('process_company_choose_address');
    Route::post('/compare_internship_info/{student_process_status}/{app_type}',[StudentController::class,'compare_internship_info'])->name('compare_internship_info');
    Route::get('/process/add_mentor/{student_process_status}/{app_type}',[StudentController::class,'add_mentor'])->name('add_mentor');
    Route::post('/compare_mentor/{student_process_status}/{app_type}',[StudentController::class,'compare_mentor'])->name('compare_mentor');

    Route::get('/process/professor_info/{student_process_status}',[StudentController::class,'professor_info'])->name('professor_info');
    Route::get('/process/report/{student_process_status}',[StudentController::class,'report'])->name('report');
    Route::post('/add_report/{student_process_status}',[StudentController::class,'add_report'])->name('add_report');
    Route::get('/app_status/{student_process_status}',[StudentController::class,'app_status'])->name('app_status');
});