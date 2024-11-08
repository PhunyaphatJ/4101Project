<?php
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth','role:admin')->group(function(){
    Route::get('/', function () { return view('admin.fake_login'); });
    
    // sidebar
    Route::get('/manage_application/approval',[ApplicationController::class,'application_approval'])->name('application_approval');
    Route::get('/manage_application/update_document_status',[ApplicationController::class,'application_update_document_status'])->name('application_update_document_status');
   
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
    Route::get('/manage_application/history',[ApplicationController::class,'application_history'])->name('application_history');
    Route::get('/manage_application/history/{application_type}',[ApplicationController::class,'application_history_list'])->name('application_history_list');
    Route::get('/manage_application/history/{application_type}/{application_id}',[ApplicationController::class,'application_history_detail'])->name('application_history_detail');
    
    //document
    Route::get('/manage_document/{document_type}',[DocumentController::class,'documents'])->name('manage_document');
    Route::get('/upload-document/{document_type}', [DocumentController::class, 'document_form'])->name('document_upload');
    Route::post('/upload-document/{document_type}', [DocumentController::class, 'create_document']);
    //grade
    Route::get('/students_grade',[GradeController::class,'students_grade'])->name('check_grade');
    Route::get('/student_grade/{student_id}',[GradeController::class,'student_grade_detail'])->name('check_grade_detail');
    
    //users
    Route::get('/manage_user/{users_type}', [UserController::class, 'users'])->name('manage_users');
    Route::get('/{user_type}/{user_id}',[UserController::class,'user_detail'])->name('user_detail');
    Route::get('/manage_user/professor/register',[UserController::class,'professor_register'])->name('professor_register');
    Route::post('/manage_user/professor/register',[RegisteredUserController::class, 'store']);
    Route::get('/manage_user/{user_type}/{user_id}/update',[UserController::class, 'user_update'])->name('user_update');
    Route::put('/manage_user/{user_type}/{user_id}/update',[UserController::class, 'professor_update']);

    //static 
    Route::get('/test-statistics', [StatisticController::class, 'statistics_yearly']);
    Route::get('/statistics_yearly', [StatisticController::class, 'statistics_yearly'])->name('statistics_yearly');
    Route::get('/statistics_compare_yearly',[StatisticController::class,'statistics_compare_yearly'])->name('statistics_compare_yearly');
    Route::get('/statistics/evaluation',[StatisticController::class,'statistics_evaluation'])->name('statistics_evaluation');

});