<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    function layout_test(){
        $menu = '';
        return view('professor.professor_layout', compact('menu'));
    }
    function intern_supervision_and_information_test(){
        $menu = '';
        return view('professor.intern_supervision_and_information', compact('menu'));
    }
    function intern_information_test(){
        $menu = '';
        return view('professor.intern_information', compact('menu'));
    }
    function former_intern_information_test(){
        $menu = '';
        return view('professor.former_intern_information', compact('menu'));
    }
}
