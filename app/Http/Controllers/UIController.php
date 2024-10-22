<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIController extends Controller
{
    function select_menu($menu)
    {
        if ($menu == 'loginn') {
            return view('ui_layout.login', compact('menu'));
        } else if ($menu == 'registerr') {
            return view('student.register', compact('menu'));
        } else if ($menu == 'student_manual') {
            return view('student.student_manual', compact('menu'));
        } else if ($menu == 'student_process') {
            return view('student.student_process', compact('menu'));
        } else if ($menu == 'student_status'){
            return view('student.student_layout', compact('menu'));
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
            return view('student.student_process_register_for_internship', compact('menu'));
        } else if ($menu == 'student_process_company') {
            $menu = 'student_process';
            return view('student.student_process_company', compact('menu'));
        } else if ($menu == 'student_process_company_rec') {
            $menu = 'student_process';
            return view('student.student_process_company_rec', compact('menu'));
        } else if ($menu == 'student_process_company_rec_search_address') {
            $menu = 'student_process';
            return view('student.student_process_company_rec_search_address', compact('menu'));
        } else if ($menu == 'student_process_company_rec_add_address') {
            $menu = 'student_process';
            return view('student.student_process_company_rec_add_address', compact('menu'));
        } else if ($menu == 'student_process_company_rec_choose_address') {
            $menu = 'student_process';
            return view('student.student_process_company_rec_choose_address', compact('menu'));
        } else if ($menu == 'student_process_3') {
            $menu = 'student_process';
            return view('student.student_process_3', compact('menu'));
        } else if ($menu == 'student_process_4') {
            $menu = 'student_process';
            return view('student.student_process_4', compact('menu'));
        }
    }
}
