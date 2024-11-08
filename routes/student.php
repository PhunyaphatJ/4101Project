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
Route::prefix('student')->middleware(['auth', 'role:student'])->group(function () {
    Route::view('/', 'student.test')->name('student');
    Route::get('/manual/{student_process_status}', [StudentController::class, 'manual'])->name('manual');//คู่มือการใช้งาน
    Route::get('/process/{student_process_status}', [StudentController::class, 'process'])->name('process');//เมนู "process การฝึกงาน" หน้าแสดงข้อมูลนักศึกษาและปุ่มลงทะเบียนขอฝึกงาน
    Route::get('/process/process_register_for_internship/{student_process_status}', [StudentController::class, 'process_register_for_internship'])->name('process_register_for_internship');//เมนู "process การฝึกงาน" เมนูย่อย "ลงทะเบียนขอฝึกงาน" 
    //นักศึกษาสถานะ"กำลังดำเนินการ" แสดงข้อมูลนักศึกษา เพิ่มข้อมูลเอกสาร 3 อย่าง เพื่อลงทะเบียนขอฝึกงาน
    //นักศึกษาสถานะ"register_pending", "register_completed", "company_pending", "internship" แสดงข้อมูลนักศึกษา แสดงข้อมูลเอกสาร 3 อย่างที่ได้อัปโหลดไป
    Route::post('/compare_internship_register', [StudentController::class, 'compare_internship_register'])->name('compare_internship_register');//ฟังก์ชันรับข้อมูลเอกสาร 3 อย่าง
    Route::get('/process/process_company/{student_process_status}', [StudentController::class, 'process_company'])->name('process_company');//เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน"
    //นักศึกษาสถานะ"register_completed", "company_pending" แสดงปุ่มเมนูขอเอกสารส่งตัว ขอเอกสารขอความอนุเคราะห์
    //นักศึกษาสถานะ"internship" แสดงข้อมูลสถานที่ฝึกงาน รายละเอียดการฝึกงาน รายละเอียดพี่เลี้ยง
    Route::get('/process/process_company_rec/{student_process_status}/{app_type}', [StudentController::class, 'process_company_rec'])->name('process_company_rec');//เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัว
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "rec" แสดงปุ่มเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่ไม่มีการยืนหนังสือขอความอนุเคราะห์และมีการยืนหนังสือขอความอนุเคราะห์ ปุ่ม download เอกสาร 2
    Route::get('/process/process_company_rec_with_request/{student_process_status}/{app_type}', [StudentController::class, 'process_company_rec_with_request'])->name('process_company_rec_with_request');//เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่มีการยืนหนังสือขอความอนุเคราะห์
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "rec_with_request" แสดงสถานที่ฝึกงานตามที่ได้ขอเอกสารขอความอนุเคราะห์ไป

    Route::get('/process/process_company_search_address/{student_process_status}/{app_type}', [StudentController::class, 'process_company_search_address'])->name('process_company_search_address');//เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่ไม่มีการยืนหนังสือขอความอนุเคราะห์
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "rec_no_request" แสดงสถานที่ฝึกงานหน้าค้นหาสถานที่ฝึกงาน
    //เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารขอความอนุเคราะห์
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "request" แสดงสถานที่ฝึกงานหน้าค้นหาสถานที่ฝึกงาน
    Route::post('/company_search_address/{student_process_status}/{app_type}', [StudentController::class, 'company_search_address'])->name('company_search_address');//ฟังก์ชันรับข้อมูล company ที่ต้องการค้นหา และ return ข้อมูล company_addresses เป็นข้อมูลที่ค้นหาได้
    Route::get('select_company/{student_process_status}/{app_type}/{company_id}', [StudentController::class, 'select_company'])->name('select_company');//ฟังก์ชันเมื่อกดเลือกสถานที่ฝึกกงานจะรับข้อมูล company_id ของสถานที่ที่เลือก เพื่อไปดึงข้อมูลจากดาต้าเบสมาเก็บไว้ที่ company_addresses แล้ว return ข้อมูล company_addresses(ข้อมูลสถานที่ฝึกงานที่เลือก), หาก app_type = 'rec_with_request' จะส่งขอมูล internship_info ไปด้วย, ข้อมูลพี่เลี้ยงที่ทำงานใน company นี้ เพื่อแสดงเป็นแนะนำพี้เลี้ยงในส่วนค้นหาพี่เลี้ยง

    Route::get('/process/process_company_add_address/{student_process_status}/{app_type}', [StudentController::class, 'process_company_add_address'])->name('process_company_add_address');//เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่ไม่มีการยืนหนังสือขอความอนุเคราะห์และเลือกเพิ่มสถานที่ฝึกงาน
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "rec_no_request" แสดงหน้ารับข้อมูลสถานที่ฝึกงาน
    //เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารขอความอนุเคราะห์และเลือกเพิ่มสถานที่ฝึกงาน
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "request" แสดงหน้ารับข้อมูลสถานที่ฝึกงาน
    Route::post('/compare_company/{student_process_status}/{app_type}', [StudentController::class, 'compare_company'])->name('compare_company');//ฟังก์ชันรับข้อมูลสถานที่ฝึกงาน return ข้อมูล company_addresses(ข้อมูลสถานที่ฝึกงานที่เพิ่ม), ข้อมูลพี่เลี้ยงที่ทำงานใน company นี้ เพื่อแสดงเป็นแนะนำพี้เลี้ยงในส่วนค้นหาพี่เลี้ยง(ใส่เป็น array ว่างไว้ก็ได้)

    Route::get('/process/process_company_choose_address/{student_process_status}/{app_type}', [StudentController::class, 'process_company_choose_address'])->name('process_company_choose_address');//เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่ไม่มีการยืนหนังสือขอความอนุเคราะห์
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "rec_no_request" แสดงข้อมูลสถานที่ฝึกงาน, รับข้อมูลรายละเอียดการฝึกงาน, แสดงปุ่มค้นหาพี่เลี้ยง เพิ่มพี่เลี้ยงและเลือกพี่เลี้ยง
    //เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารส่งตัวสำหรับนักศึกษาที่มีการยืนหนังสือขอความอนุเคราะห์
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "rec_with_request" แสดงข้อมูลสถานที่ฝึกงาน, แสดงข้อมูลรายละเอียดการฝึกงาน, แสดงปุ่มค้นหาพี่เลี้ยง เพิ่มพี่เลี้ยงและเลือกพี่เลี้ยง
    //เมนู "process การฝึกงาน" เมนูย่อย "สถานที่ฝึกงาน" เมื่อเลือกเมนูขอเอกสารขอความอนุเคราะห์
    //นักศึกษาสถานะ"register_completed", "company_pending" , สถานะเอกสาร(app_type) "request" แสดงข้อมูลสถานที่ฝึกงาน, รับข้อมูลรายละเอียดการฝึกงาน
    Route::post('/compare_internship_info/{student_process_status}/{app_type}', [StudentController::class, 'compare_internship_info'])->name('compare_internship_info');//ฟังก์ชันรับข้อมูลรายละเอียดการฝึกงาน
    Route::get('/process/add_mentor/{student_process_status}/{app_type}', [StudentController::class, 'add_mentor'])->name('add_mentor');//เมื่อกดปุ่มเพิ่มพี่เลี้ยง
    Route::post('/compare_mentor/{student_process_status}/{app_type}', [StudentController::class, 'compare_mentor'])->name('compare_mentor');//ฟังก์ชันรับข้อมูลพี่เลี้ยง(ควรทำให้มี return ข้อมูลพี่เลี้ยงที่เพิ่มมาขึ้นในหน้าเลือกพี่เลี้ยง)

    Route::get('/process/professor_info/{student_process_status}', [StudentController::class, 'professor_info'])->name('professor_info');//เมนู "process การฝึกงาน" เมนูย่อย "พบอาจารย์ที่ปรึกษา"
    //นักศึกษาสถานะ"internship" แสดงข้อมูลอาจารย์ที่ปรึกษา
    Route::get('/process/report/{student_process_status}', [StudentController::class, 'report'])->name('report');//เมนู "process การฝึกงาน" เมนูย่อย "รายงานผลการฝึกงาน"
    //นักศึกษาสถานะ"internship" แสดงตัวอย่างรายงานการฝึกงาน, รายงานการฝึกงานของฉัน(ปุ่มจะใช้งานได้เมื่อสถานะreport = 'have_report'), ปุ่มรับข้อมูลรายงาน, ปุ่มบันทึกรายงาน
    Route::post('/add_report/{student_process_status}', [StudentController::class, 'add_report'])->name('add_report');//ฟังก์ชันรับข้อมูลรายงาน
    Route::get('/app_status/{student_process_status}', [StudentController::class, 'app_status'])->name('app_status');//เมนู "ตรวจสอบสถานะคำร้อง" แสดงรายการคำร้องตามข้อมูลใน applications ที่ return ไป
    //ข้อมูลใน applications สามารถดึงมาจากดาต้าเบสได้
});
