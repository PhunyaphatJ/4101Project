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

Route::get('/student/{menu}',[StudentController::class,'student_register']);

Route::get('/student/{student_process_status}/{app_type}/{report}/{menu}',[StudentController::class,'student_menu']);