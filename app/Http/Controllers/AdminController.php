<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // จัดการคำร้อง อนุมัติคำร้อง ,หน้าแรก แสดงรายการคำร้องทั้งหมดที่อยูในสถานะรอการอนุมัติ
    function application_approval()
    {
        $menu = 'manage_application';
        $application_type = 'all';
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
        return view('admin.application_approval', compact('menu','application_type', 'applications'));
    }
    // จัดการคำร้อง อนุมัติคำร้อง ,แสดงรายการคำร้องตามประเภทคำร้อง
    function application_approval_list($application_type)
    {
        $menu = 'manage_application';
        if ($application_type == 'internship_register') {
            // ตัวอย่างข้อมูล คำร้องขึ้นทะเบียนฝึกงาน ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '001',
                    'student_id' => '6105001111',
                    'name' => 'กล้วยหอม',
                    'lastname' => 'จอมซน',
                    'date' => '2024-10-01',
                    'application_type' => 'internship_register',
                    'application_status' => 'approval_pending'
                ]
            ];
            return view('admin.application_approval', compact('menu','application_type', 'applications'));
        } else if ($application_type == 'internship_request') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอความอนุเคราะห์ ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
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
                    'application_id' => '005',
                    'student_id' => '6505005555',
                    'name' => 'อันเดอร์',
                    'lastname' => 'เดอะซี',
                    'date' => '2024-10-04',
                    'application_type' => 'internship_request',
                    'application_status' => 'approval_pending'
                ],
            ];
            return view('admin.application_approval', compact('menu','application_type', 'applications'));
        } else if ($application_type == 'recommendation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือส่งตัวฝึกงาน ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '003',
                    'student_id' => '6305003333',
                    'name' => 'สตรอเบอร์รี่',
                    'lastname' => 'เค้ก',
                    'date' => '2024-10-03',
                    'application_type' => 'recommendation',
                    'application_status' => 'approval_pending'
                ]
            ];
            return view('admin.application_approval', compact('menu','application_type', 'applications'));
        } else if ($application_type == 'appreciation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอบคุณ ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '004',
                    'student_id' => '6405004444',
                    'name' => 'หมูเด้ง',
                    'lastname' => 'ขาหมู',
                    'date' => '2024-10-04',
                    'application_type' => 'appreciation',
                    'application_status' => 'approval_pending'
                ]
            ];
            return view('admin.application_approval', compact('menu','application_type', 'applications'));
        }
    }
    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,หน้าแรก
    function application_update_document_status()
    {
        $menu = 'manage_application';
        return view('admin.application_update_document_status', compact('menu'));
    }
    // จัดการคำร้อง ประวัติคำร้อง ,หน้าแรก
    function appplication_history()
    {
        $menu = 'manage_application';
        return view('admin.application_history', compact('menu'));
    }
    // จัดการเอกสาร ,หน้าแรก
    function manage_document()
    {
        $menu = 'manage_document';
        return view('admin.admin_layout', compact('menu'));
    }
    // จัดการข้อมูลผู้ใช้งาน อาจารย์ ,หน้าแรก
    function manage_user_professor()
    {
        $menu = 'menage_user';
        return view('admin.admin_layout', compact('menu'));
    }
    // จัดการข้อมูลผู้ใช้งาน นักศึกษา ,หน้าแรก
    function manage_user_student()
    {
        $menu = 'menage_user';
        return view('admin.admin_layout', compact('menu'));
    }
    // สถิติ รายปี ,หน้าแรก
    function statistics_yearly()
    {
        $menu = 'statistics';
        return view('admin.admin_layout', compact('menu'));
    }
    // สถิติ เปรียบเทียบสถิติรายปี ,หน้าแรก
    function statistics_compare_yearly()
    {
        $menu = 'statistics';
        return view('admin.admin_layout', compact('menu'));
    }
    // สถิติ แบบประเมิน ,หน้าแรก
    function statistics_evaluation()
    {
        $menu = 'statistics';
        return view('admin.admin_layout', compact('menu'));
    }
    // ตรวจสอบเกรด ,หน้าแรก
    function check_grade()
    {
        $menu = 'check_grade';
        return view('admin.admin_layout', compact('menu'));
    }

    // ข้างล่างนี้ไม่ได้ใช้
    function select_sidebar_menu($menu, $submenu)
    {
        if ($menu == 'manage_application') {    // จัดการคำร้อง
            if ($submenu == 'approval') {
                return view('admin.application_approval', compact('menu'));
            } else if ($submenu == 'update_document_satus') {
                return view('admin.application_update_doucument_status');
            } else if ($submenu == 'history') {
                return view('#');
            }
        } else if ($menu == 'manage_document') {    // จัดการเอกสาร
            return view('#', compact('menu'));
        } else if ($menu == 'manage_user') {    //จัดการข้อมูลผู้ใช้
            if ($submenu == 'professor') {
                return view('#');
            } else if ($submenu == 'student') {
                return view('#');
            }
        } else if ($menu == 'statistics') {     //สถิติ
            if ($submenu == 'yearly') {
                return view('#');
            } else if ($submenu == 'compare_yearly') {
                return view('#');
            } else if ($submenu == 'evaluation') {
                return view('#');
            }
        } else if ($menu == 'check_grade') {    //ตรวจสอบเกรด
            return view('#', compact('menu'));
        }
    }
}
