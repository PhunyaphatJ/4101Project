<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function login()
    {
        $menu = 'login';
        return view('ui_layout.login', compact('menu'));
    }

    function login_verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $users = [
            [
                'email' => 'student@rumail.ru.ac.th',
                'password' => '12345',
                'role' => 'student',
                'student_type' => 'no_register'
            ],
            [
                'email' => 'admin@rumail.ru.ac.th',
                'password' => '12345',
                'role' => 'admin'
            ]
        ];
        foreach ($users as $user) {
            if ($request['email'] == $user['email'] && $request['password'] == $user['password'] && $user['role'] == 'student') {
                $menu = 'manual';
                $student_process_status = $user['student_type'];
                return view('student.manual', compact('menu', 'student_process_status'));
            } elseif ($request['email'] == $user['email'] && $request['password'] == $user['password'] && $user['role'] == 'admin') {
                $menu = 'manage_application';
                $application_type = 'all';
                // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
                // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
                $applications = [
                    [
                        'application_id' => '001',
                        'student_id' => '6105001111',
                        'name' => 'กล้วยหอม',
                        'lastname' => 'จอมซน',
                        'date' => '2024-10-01',
                        'application_type' => 'internship_register',
                        'application_status' => 'approval_pending'
                    ],
                    [
                        'application_id' => '002',
                        'student_id' => '6405002222',
                        'name' => 'ทอมแอนด์',
                        'lastname' => 'เจอร์รี่',
                        'date' => '2024-10-02',
                        'application_type' => 'internship_request',
                        'application_status' => 'approval_pending'
                    ],
                    [
                        'application_id' => '003',
                        'student_id' => '6305003333',
                        'name' => 'สตรอเบอร์รี่',
                        'lastname' => 'เค้ก',
                        'date' => '2024-10-03',
                        'application_type' => 'recommendation',
                        'application_status' => 'approval_pending'
                    ],
                    [
                        'application_id' => '004',
                        'student_id' => '6405004444',
                        'name' => 'หมูเด้ง',
                        'lastname' => 'ขาหมู',
                        'date' => '2024-10-04',
                        'application_type' => 'appreciation',
                        'application_status' => 'approval_pending'
                    ],
                    [
                        'application_id' => '005',
                        'student_id' => '6505005555',
                        'name' => 'อันเดอร์',
                        'lastname' => 'เดอะซี',
                        'date' => '2024-10-04',
                        'application_type' => 'internship_request',
                        'application_status' => 'approval_pending'
                    ],
                ];
                return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
            }
        }
        $menu = 'login';
        return view('ui_layout.login', compact('menu'));
    }
}
