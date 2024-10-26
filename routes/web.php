<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('ui_layout.login');
});

Route::prefix('admin')->group(function(){
    Route::get('/', function () { return view('admin.fake_login'); });
    Route::get('/manage_application/approval',[AdminController::class,'application_approval'])->name('application_approval');
    Route::get('/manage_application/update_document_status',[AdminController::class,'application_update_document_status'])->name('application_update_document_status');
    Route::get('/manage_application/history',[AdminController::class,'appplication_history'])->name('appplication_history');
    Route::get('/manage_document',[AdminController::class,'manage_document'])->name('manage_document');
    Route::get('/manage_user/professor',[AdminController::class,'manage_user_professor'])->name('manage_user_professor');
    Route::get('/manage_user/student',[AdminController::class,'manage_user_student'])->name('manage_user_student');
    Route::get('/statistics/yearly',[AdminController::class,'statistics_yearly'])->name('statistics_yearly');
    Route::get('/statistics/compare_yearly',[AdminController::class,'statistics_compare_yearly'])->name('statistics_compare_yearly');
    Route::get('/statistics/evaluation',[AdminController::class,'statistics_evaluation'])->name('statistics_evaluation');
    Route::get('/check_grade',[AdminController::class,'check_grade'])->name('check_grade');

    Route::get('/manage_application/approval/{application_type},',[AdminController::class,'application_approval_list'])->name('application_approval_list');
});

Route::get('/test', function(){
    return view('ui_layout.navbar_layout');
});

// Route::prefix('admin')->group(function(){
//     Route::get('/', function () { return view('admin.fake_login'); });
//     Route::get('/{menu}/{submenu}',[AdminController::class,'select_sidebar_menu']);
// });

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


Route::prefix('student')->group(function(){
    Route::get('/login',[StudentController::class,'login']);
    Route::get('/register',[StudentController::class,'register']);
    Route::get('/manual/{student_process_status}',[StudentController::class,'manual']);
    Route::get('/process/{student_process_status}',[StudentController::class,'process']);
    Route::get('/process/process_register_for_internship/{student_process_status}',[StudentController::class,'process_register_for_internship']);
    Route::get('/process/process_company/{student_process_status}',[StudentController::class,'process_company']);
    Route::get('/process/process_company_rec/{student_process_status}/{app_type}',[StudentController::class,'process_company_rec']);
    Route::get('/process/process_company_rec_with_request/{student_process_status}/{app_type}',[StudentController::class,'process_company_rec_with_request']);
    Route::get('/process/process_company_search_address/{student_process_status}/{app_type}',[StudentController::class,'process_company_search_address']);
    Route::get('/process/process_company_add_address/{student_process_status}/{app_type}',[StudentController::class,'process_company_add_address']);
    Route::get('/process/process_company_choose_address/{student_process_status}/{app_type}',[StudentController::class,'process_company_choose_address']);
    Route::get('/process/professor_info/{student_process_status}',[StudentController::class,'professor_info']);
    Route::get('/process/report/{student_process_status}/{report}',[StudentController::class,'report']);
    Route::get('/app_status/{student_process_status}',[StudentController::class,'app_status']);
});