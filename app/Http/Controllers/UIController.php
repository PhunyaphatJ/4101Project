<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIController extends Controller
{
    function select_menu($menu)
    {
        if ($menu == 'calendar') {
            return view('ui_layout.calendar', compact('menu'));
        } else if ($menu == 'loginn') {
            return view('ui_layout.login', compact('menu'));
        } else if ($menu == 'registerr') {
            return view('student.register', compact('menu'));
        } else if ($menu == 'student_manual') {
            $student_process_status = 'register_pending';
            return view('student.student_manual', compact('menu', 'student_process_status'));
        } else if ($menu == 'student_process') {
            // $student_process_status = 'no_register';
            // $student_process_status = 'register_pending';
            // $student_process_status = 'register_completed';
            $student_process_status = 'internship';
            return view('student.student_process', compact('menu', 'student_process_status'));
        } else if ($menu == 'student_status'){
            $student_process_status = 'register_pending';
            return view('student.student_status', compact('menu', 'student_process_status'));
        } else  if ($menu == 'menu_11') {
            return view('ui_layout.admin_layout', compact('menu'));
        } else if ($menu == 'menu_12') {
            return view('ui_layout.admin_layout', compact('menu'));
        } else if ($menu == 'menu_13') {
            return view('ui_layout.admin_layout', compact('menu'));
        } else if ($menu == 'menu_14'){
            return view('ui_layout.admin_layout', compact('menu'));
        } else if ($menu == 'menu_15'){
            return view('ui_layout.admin_layout', compact('menu'));
        } 
        
        if ($menu == 'student_process_register_for_internship') {
            $menu = 'student_process';
            // $student_process_status = 'no_register';
            // $student_process_status = 'register_pending';
            $student_process_status = 'register_completed';
            return view('student.student_process_register_for_internship', compact('menu', 'student_process_status'));
        } else if ($menu == 'student_process_company') {
            $menu = 'student_process';
            $student_process_status = 'register_completed';
            return view('student.student_process_company', compact('menu', 'student_process_status'));
        } else if ($menu == 'student_process_company_rec') {
            $menu = 'student_process';
            $student_process_status = 'register_completed';
            // $app_type = 'request';
            // $app_type = 'rec_has_request';
            $app_type = 'rec_no_request';
            return view('student.student_process_company_rec', compact('menu', 'student_process_status', 'app_type'));
        } else if ($menu == 'student_process_company_search_address') {
            $menu = 'student_process';
            $student_process_status = 'register_completed';
            $app_type = 'request';
            return view('student.student_process_company_search_address', compact('menu', 'student_process_status', 'app_type'));
        } else if ($menu == 'student_process_company_add_address') {
            $menu = 'student_process';
            $student_process_status = 'register_completed';
            $app_type = 'request';
            return view('student.student_process_company_add_address', compact('menu', 'student_process_status', 'app_type'));
        } else if ($menu == 'student_process_company_choose_address') {
            $menu = 'student_process';
            $student_process_status = 'register_completed';
            // $app_type = 'request';
            // $app_type = 'rec_with_request';
            $app_type = 'rec_no_request';
            return view('student.student_process_company_choose_address', compact('menu', 'student_process_status', 'app_type'));
        } else  if ($menu == 'student_process_company_rec_with_request') {
            $menu = 'student_process';
            $student_process_status = 'register_completed';
            $app_type = 'rec_with_request';
            return view('student.student_process_company_rec_with_request', compact('menu', 'student_process_status', 'app_type'));
        } else  if ($menu == 'student_professor') {
            $menu = 'student_process';
            $student_process_status = 'internship';
            return view('student.student_professor', compact('menu', 'student_process_status'));
        } else if ($menu == 'student_report') {
            $menu = 'student_process';
            $student_process_status = 'internship';
            $report = 'true';
            // $report = 'false';
            $edit = 'true';
            // $edit = 'false';
            return view('student.student_report', compact('menu', 'student_process_status', 'report', 'edit'));
        }
    }
}
