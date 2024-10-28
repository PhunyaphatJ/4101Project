<?php
use App\Http\Controllers\AdminController;

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', function () { return view('admin.fake_login'); })->name('admin.dashboard');
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