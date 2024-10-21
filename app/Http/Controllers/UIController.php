<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIController extends Controller
{
    function select_menu($menu)
    {
        if ($menu == 'login') {
            return view('/login', compact('menu'));
        } else if ($menu == 'register') {
            return view('register', compact('menu'));
        } else if ($menu == 'student_manual') {
            return view('/student_manual', compact('menu'));
        } else if ($menu == 'student_process') {
            return view('/student_process', compact('menu'));
        } else if ($menu == 'student_status'){
            return view('/student_layout', compact('menu'));
        } else  if ($menu == 'menu_11') {
            return view('/admin_layout', compact('menu'));
        } else if ($menu == 'menu_12') {
            return view('/admin_layout', compact('menu'));
        } else if ($menu == 'menu_13') {
            return view('/admin_layout', compact('menu'));
        } else if ($menu == 'menu_14'){
            return view('/admin_layout', compact('menu'));
        } else if ($menu == 'menu_15'){
            return view('/admin_layout', compact('menu'));
        } 
        
        if ($menu == 'student_process_1') {
            $menu = 'student_process';
            return view('/student_process_1', compact('menu'));
        } else if ($menu == 'student_process_2') {
            $menu = 'student_process';
            return view('/student_process_2', compact('menu'));
        } elseif ($menu == 'student_process_3') {
            $menu = 'student_process';
            return view('/student_process_3', compact('menu'));
        } else if ($menu == 'student_process_4') {
            $menu = 'student_process';
            return view('/student_process_4', compact('menu'));
        }
    }
}
