<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // จัดการคำร้อง
    function application_approval(){
        $menu = 'manage_application';
        return view('admin.application_approval', compact('menu'));
    }
    function application_update_document_status(){
        $menu = 'manage_application';
        return view('admin.application_update_document_status', compact('menu'));
    }
    function appplication_history(){
        $menu = 'manage_application';
        return view('admin.application_history', compact('menu'));
    }
    // จัดการเอกสาร
    function manage_document(){
        $menu = 'manage_document';
        return view('admin.admin_layout', compact('menu'));
    }
    // จัดการข้อมูลผู้ใช้งาน
    function manage_user_professor(){
        $menu = 'menage_user';
        return view('admin.admin_layout', compact('menu'));
    }
    function manage_user_student(){
        $menu = 'menage_user';
        return view('admin.admin_layout', compact('menu'));
    }
    // สถิติ
    function statistics_yearly(){
        $menu = 'statistics';
        return view('admin.admin_layout', compact('menu'));
    }
    function statistics_compare_yearly(){
        $menu = 'statistics';
        return view('admin.admin_layout', compact('menu'));
    }
    function statistics_evaluation(){
        $menu = 'statistics';
        return view('admin.admin_layout', compact('menu'));
    }
    // ตรวจสอบเกรด
    function check_grade(){
        $menu = 'check_grade';
        return view('admin.admin_layout', compact('menu'));
    }
    
    // ไม่ใช้
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
            if ($submenu == 'yearly'){
                return view('#');
            }else if ($submenu == 'compare_yearly') {
                return view('#');
            }else if ($submenu == 'evaluation') {
                return view('#');
            }
        } else if ($menu == 'check_grade') {    //ตรวจสอบเกรด
            return view('#', compact('menu'));
        }
    }
}
