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
Route::prefix('student')->middleware(['auth','verified','role:student'])->group(function(){
    Route::get('/', function () {
        return redirect()->route('manual');
    });
    Route::get('/manual', [StudentController::class, 'manual'])->name('manual');
    
    Route::prefix('process')->group(function(){
        Route::get('/', [StudentController::class, 'process'])->name('process');
        Route::get('/register_internship', [StudentController::class, 'register_internship_form'])->name('process_register_for_internship');
        Route::post('/register_internship', [StudentController::class, 'register_internship']);
        Route::get('/process_company', [StudentController::class, 'process_company'])->name('process_company');
        Route::get('/search_company/{type}', [StudentController::class, 'search_company'])->name('search_company'); //เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่ไม่มีการยืนหนังสือขอความอนุเคราะห์
        Route::get('/add_company/{type}', [StudentController::class, 'add_company_form'])->name('add_company'); //ฟังก์ชันรับข้อมูล company ที่ต้องการค้นหา และ return ข้อมูล company_addresses เป็นข้อมูลที่ค้นหาได้
        Route::post('/add_company/{type}', [StudentController::class, 'add_company']); 
        Route::get('/recommendation', [StudentController::class, 'recommendation'])->name('recommendation');
        Route::get('/recommendation/request', [StudentController::class, 'company_recommendation_request'])->name('recommendation_request');
        Route::post('/request_document/{type}/{application_id?}', [StudentController::class, 'request_document'])->name('request_document'); //ฟังก์ชันรับข้อมูลรายละเอียดการฝึกงาน
        Route::get('/add_mentor/{type}/{company_id}/{application_id?}', [StudentController::class, 'add_mentor_form'])->name('add_mentor_form'); //เมื่อกดปุ่มเพิ่มพี่เลี้ยง
        Route::post('/add_mentor/{type}/{company_id}/{application_id?}', [StudentController::class, 'add_mentor'])->name('add_mentor'); //เมื่อกดปุ่มเพิ่มพี่เลี้ยง
        Route::get('/process_company_add_address', [StudentController::class, 'process_company_add_address'])->name('process_company_add_address'); //เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่ไม่มีการยืนหนังสือขอความอนุเคราะห์และเลือกเพิ่มสถานที่ฝึกงาน
        Route::get('/professor_info', [StudentController::class, 'professor_info'])->name('professor_info'); //เมนู "process การฝึกงาน" เมนูย่อย "พบอาจารย์ที่ปรึกษา"
        Route::get('/select_company/{type}/{company_id}/{application_id?}', [StudentController::class, 'select_company'])->name('select_company'); //ฟังก์ชันเมื่อกดเลือกสถานที่ฝึกกงานจะรับข้อมูล company_id ของสถานที่ที่เลือก เพื่อไปดึงข้อมูลจากดาต้าเบสมาเก็บไว้ที่ company_addresses แล้ว return ข้อมูล company_addresses(ข้อมูลสถานที่ฝึกงานที่เลือก), หาก app_type = 'rec_with_request' จะส่งขอมูล internship_info ไปด้วย, ข้อมูลพี่เลี้ยงที่ทำงานใน company นี้ เพื่อแสดงเป็นแนะนำพี้เลี้ยงในส่วนค้นหาพี่เลี้ยง
        Route::get('/report', [StudentController::class, 'report'])->name('report'); //เมนู "process การฝึกงาน" เมนูย่อย "รายงานผลการฝึกงาน"
        Route::post('/report', [StudentController::class, 'add_report']); //ฟังก์ชันรับข้อมูลรายงาน
    });

    Route::get('/app_status', [StudentController::class, 'app_status'])->name('app_status'); //เมนู "ตรวจสอบสถานะคำร้อง" แสดงรายการคำร้องตามข้อมูลใน applications ที่ return ไป
});
