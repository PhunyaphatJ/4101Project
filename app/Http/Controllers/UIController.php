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
        } else if ($menu == 'manual') {
            return view('/manual', compact('menu'));
        } else if ($menu == 'process') {
            return view('/process', compact('menu'));
        } else if ($menu == 'status'){
            return view('/layout_student', compact('menu'));
        } else  if ($menu == 'menu_11') {
            return view('/layout_admin', compact('menu'));
        } else if ($menu == 'menu_12') {
            return view('/layout_admin', compact('menu'));
        } else if ($menu == 'menu_13') {
            return view('/layout_admin', compact('menu'));
        } else if ($menu == 'menu_14'){
            return view('/layout_admin', compact('menu'));
        } else if ($menu == 'menu_15'){
            return view('/layout_admin', compact('menu'));
        } 
        
        if ($menu == 'process_1') {
            $menu = 'process';
            return view('/process_1', compact('menu'));
        } else if ($menu == 'process_2') {
            $menu = 'process';
            return view('/process_2', compact('menu'));
        } elseif ($menu == 'process_3') {
            $menu = 'process';
            return view('/process_3', compact('menu'));
        } else if ($menu == 'process_4') {
            $menu = 'process';
            return view('/process_4', compact('menu'));
        }
    }
}
