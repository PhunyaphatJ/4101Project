<?php
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/', function () { return view('admin.fake_login'); });
    // sidebar
    Route::get('/manage_application/approval',[ApplicationController::class,'application_approval'])->name('application_approval');
    Route::get('/manage_application/update_document_status',[ApplicationController::class,'application_update_document_status'])->name('application_update_document_status');
    Route::get('/manage_application/history',[ApplicationController::class,'application_history'])->name('application_history');
    Route::get('/manage_user/professor',[ApplicationController::class,'manage_user_professor'])->name('manage_user_professor');
    Route::get('/manage_user/student',[ApplicationController::class,'manage_user_student'])->name('manage_user_student');
    Route::get('/statistics/yearly',[ApplicationController::class,'statistics_yearly'])->name('statistics_yearly');
    Route::get('/statistics/compare_yearly',[ApplicationController::class,'statistics_compare_yearly'])->name('statistics_compare_yearly');
    Route::get('/statistics/evaluation',[ApplicationController::class,'statistics_evaluation'])->name('statistics_evaluation');
    Route::get('/check_grade',[ApplicationController::class,'check_grade'])->name('check_grade');
    // application approval
    Route::get('/manage_application/approval/{application_type}',[ApplicationController::class,'application_approval_list'])->name('application_approval_list');
    Route::get('/manage_application/approval/{application_type}/{application_id}',[ApplicationController::class,'application_detail'])->name('application_detail');
    Route::get('/manage_application/approval/{application_type}/{application_id}/approve',[ApplicationController::class,'approve_application'])->name('approve_application');
    Route::post('/manage_application/approval/{application_type}/{application_id}/reject',[ApplicationController::class,'reject_application'])->name('reject_application');
    //select professor
    Route::get('/manage_application/approval/Recommendation/{application_id}/assign_professor',[ApplicationController::class,'assign_professor'])->name('assign_professor');
    Route::post('/manage_application/approval/Recommendation/{application_id}/assign_professor',[ApplicationController::class,'approve_recommendation']);
    // application update document status
    Route::get('/manage_application/update_document_status/{application_type}',[ApplicationController::class,'application_update_document_status_list'])->name('application_update_document_status_list');
    Route::get('/manage_application/update_document_status/{application_type}/{application_id}',[ApplicationController::class,'application_detail'])->name('application_update_document_status_detail');
    Route::get('/manage_application/update_document_status/{application_type}/{application_id}/completed',[ApplicationController::class,'application_update_document_status_complete'])->name('application_update_document_status_complete');
    // application history
    Route::get('/manage_application/history/{application_type}',[ApplicationController::class,'application_history_list'])->name('application_history_list');
    Route::get('/manage_application/history/{application_type}/{application_id}',[ApplicationController::class,'application_history_detail'])->name('application_history_detail');
    //document
    Route::get('/manage_document',[DocumentController::class,'document_form'])->name('manage_document');
    Route::post('/upload-document', [DocumentController::class, 'create_document'])->name('create_document');
    //users
    Route::get('/users',[UserController::class,'users'])->name('users');
    Route::get('/user/{user_id}',[UserController::class,'user_detail'])->name('user_detail');
});