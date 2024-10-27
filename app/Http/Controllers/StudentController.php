<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    // student_process_status = (no_register, register_pending, register_completed, company_pending, internship)
    // student_process_status = (rec, request, rec_with_request, rec_no_request)
    // report = (no_report, edit_report, have_report)

    function login()
    {
        $menu = 'login';
        return view('ui_layout.login', compact('menu'));
    }

    function compare_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $users = [
            [
                'email' => 'student@rumail.ru.ac.th',
                'password' => '12345',
                'role' => 'student'
            ],
            [
                'email' => 'admin@rumail.ru.ac.th',
                'password' => '12345',
                'role' => 'admin'
            ]
        ];
        foreach ($users as $user) {
            if ($login['email'] == $user['email'] && $login['password'] == $user['password']) {
                if ($user['role'] == 'student') {
                    $menu = 'manual';
                    $student_process_status = 'no_register';
                    return view('student.manual', compact('menu', 'student_process_status'));
                } elseif ($user['role'] == 'admin')
                    return;
            }
        }
    }

    function register()
    {
        $menu = 'register';
        return view('student.register', compact('menu'));
    }

    function compare_register(Request $request)
    {
        $register = [
            'prefix' => $request->prefix,
            'department' => $request->department,
            'student_id' => $request->student_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'house_no' => $request->house_no,
            'village_no' => $request->village_no,
            'emame' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'house_no' => $request->house_no,
            'village_no' => $request->village_no,
            'road' => $request->road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'postcode' => $request->postcode,
            'email' => $request->email,
            'password' => $request->password,
            'confirm_password' => $request->confirm_password,
        ];
        if ($register['password'] == $register['confirm_password']) {
            $menu = 'manual';
            $student_process_status = 'no_register';
            return view('student.manual', compact('menu', 'student_process_status'));
        }
    }

    function manual($student_process_status)
    {
        $menu = 'manual';
        return view('student.manual', compact('menu', 'student_process_status'));
    }

    function process($student_process_status)
    {
        $menu = 'process';
        return view('student.process', compact('menu', 'student_process_status'));
    }

    function process_register_for_internship($student_process_status)
    {
        $menu = 'process';
        return view('student.process_register_for_internship', compact('menu', 'student_process_status'));
    }

    function process_company($student_process_status)
    {
        $menu = 'process';
        return view('student.process_company', compact('menu', 'student_process_status'));
    }

    function process_company_rec($student_process_status, $app_type)
    {
        $menu = 'process';
        return view('student.process_company_rec', compact('menu', 'student_process_status', 'app_type'));
    }

    function process_company_rec_with_request($student_process_status, $app_type)
    {
        $menu = 'process';
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
        return view('student.process_company_rec_with_request', compact('menu', 'student_process_status', 'app_type', 'company_address'));
    }

    function process_company_search_address($student_process_status, $app_type)
    {
        $menu = 'process';
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
        return view('student.process_company_search_address', compact('menu', 'student_process_status', 'app_type', 'company_address'));
    }

    function process_company_add_address($student_process_status, $app_type)
    {
        $menu = 'process';
        return view('student.process_company_add_address', compact('menu', 'student_process_status', 'app_type'));
    }

    function process_company_choose_address($student_process_status, $app_type)
    {
        $menu = 'process';
        return view('student.process_company_choose_address', compact('menu', 'student_process_status', 'app_type'));
    }

    function professor_info($student_process_status)
    {
        $menu = 'process';
        return view('student.professor_info', compact('menu', 'student_process_status'));
    }

    function report($student_process_status, $report)
    {
        $menu = 'process';
        return view('student.report', compact('menu', 'student_process_status', 'report'));
    }

    function app_status($student_process_status)
    {
        $menu = 'app_status';
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
        return view('student.app_status', compact('menu', 'applications', 'student_process_status'));
    }
}
