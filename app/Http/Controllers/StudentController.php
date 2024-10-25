<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function student_register($menu)
    {
        if ($menu == 'login') {
            return view('ui_layout.login', compact('menu'));
        } else if ($menu == 'register') {
            return view('student.register', compact('menu'));
        }
    }

    // student_process_status = (no_register, register_pending, register_completed, company_pending, internship)
    // student_process_status = (no_app, rec, request, rec_with_request, rec_no_request)
    // report = (no_report, edit_report, have_report)
    // menu = (student_manual, student_process, student_app_status, student_process_register_for_internship, student_process_company, student_process_company_rec, student_process_company_search_address, student_process_company_add_address, student_process_company_choose_address, student_process_company_rec_with_request, student_professor, student_report)
    function student_menu($student_process_status, $app_type, $report, $menu)
    {
        if ($student_process_status == 'no_register' || $student_process_status == 'register_pending' ||$student_process_status == 'register_completed' || $student_process_status == 'company_pending' || $student_process_status == 'internship') {
            if ($app_type == 'no_app' || $app_type == 'rec' || $app_type == 'request' || $app_type == 'rec_with_request' || $app_type == 'rec_no_request') {
                if ($menu == 'student_manual') {
                    return view('student.student_manual', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process') {
                    return view('student.student_process', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_app_status') {
                    //ตัวอย่างข้อมูล application
                    $applications = [
                        [
                            'application_id' => '12345',
                            'company_name' => 'บริษัท',
                            'application_date' => '24/10/2567',
                            'application_status' => 'สมบูรณ์',
                            'application_type' => 'internship_request'
                        ],
                        [
                            'application_id' => '12345',
                            'company_name' => 'บริษัท',
                            'application_date' => '24/10/2567',
                            'application_status' => 'กำลังดำเนินการ',
                            'application_type' => 'internship_request'
                        ],
                        [
                            'application_id' => '12345',
                            'company_name' => 'บริษัท',
                            'application_date' => '24/10/2567',
                            'application_status' => 'รอการอนุมัติ',
                            'application_type' => 'internship_request'
                        ],
                        [
                            'application_id' => '12345',
                            'company_name' => 'บริษัท',
                            'application_date' => '24/10/2567',
                            'application_status' => 'ปฎิเสธ',
                            'application_type' => 'internship_request'
                        ],
                        [
                            'application_id' => '12345',
                            'company_name' => 'บริษัท',
                            'application_date' => '24/10/2567',
                            'application_status' => 'รอการอนุมัติ',
                            'application_type' => 'internship_rec'
                        ],
                        [
                            'application_id' => '12345',
                            'company_name' => 'บริษัท',
                            'application_date' => '24/10/2567',
                            'application_status' => 'กำลังดำเนินการ',
                            'application_type' => 'internship_register'
                        ],
                    ];
                    return view('student.student_app_status', compact('menu', 'student_process_status', 'applications'));
                }

                if ($menu == 'student_process_register_for_internship') {
                    $menu = 'student_process';
                    return view('student.student_process_register_for_internship', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process_company') {
                    $menu = 'student_process';
                    return view('student.student_process_company', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process_company_rec') {
                    $menu = 'student_process';
                    return view('student.student_process_company_rec', compact('menu', 'student_process_status', 'app_type'));
                } else if ($menu == 'student_process_company_search_address') {
                    $menu = 'student_process';
                    //ตัวอย่างข้อมูล company ที่ค้นหาได้
                    $company_address = [
                        [
                            'company_name' => 'บริษัท aaa จำกัด',
                            'phone' => '000-000-0000',
                            'company_address' => 'a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx',
                            'fax' => '000-000-0000'
                        ],
                        [
                            'company_name' => 'บริษัท bbb จำกัด',
                            'phone' => '000-000-0000',
                            'company_address' => 'a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx',
                            'fax' => '000-000-0000'
                        ],
                    ];
                    return view('student.student_process_company_search_address', compact('menu', 'student_process_status', 'app_type', 'company_address'));
                } else if ($menu == 'student_process_company_add_address') {
                    $menu = 'student_process';
                    return view('student.student_process_company_add_address', compact('menu', 'student_process_status', 'app_type'));
                } else if ($menu == 'student_process_company_choose_address') {
                    $menu = 'student_process';
                    return view('student.student_process_company_choose_address', compact('menu', 'student_process_status', 'app_type'));
                } else  if ($menu == 'student_process_company_rec_with_request') {
                    $menu = 'student_process';
                    //ตัวอย่างข้อมูล company ที่ได้ทำการขอเอกสารขอความอนุเคราะห์
                    $company_address = [
                        [
                            'company_name' => 'บริษัท aaa จำกัด',
                            'phone' => '000-000-0000',
                            'company_address' => 'a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx',
                            'fax' => '000-000-0000'
                        ],
                        [
                            'company_name' => 'บริษัท bbb จำกัด',
                            'phone' => '000-000-0000',
                            'company_address' => 'a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx',
                            'fax' => '000-000-0000'
                        ],
                        [
                            'company_name' => 'บริษัท ccc จำกัด',
                            'phone' => '000-000-0000',
                            'company_address' => 'a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx',
                            'fax' => '000-000-0000'
                        ],
                    ];
                    return view('student.student_process_company_rec_with_request', compact('menu', 'student_process_status', 'app_type', 'company_address'));
                } else  if ($menu == 'student_professor') {
                    $menu = 'student_process';
                    return view('student.student_professor', compact('menu', 'student_process_status'));
                } else  if ($menu == 'student_report') {
                    $menu = 'student_process';
                    return view('student.student_report', compact('menu', 'student_process_status', 'app_type', 'report'));
                }
            }
        }
    }
}
