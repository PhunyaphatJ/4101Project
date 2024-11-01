<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login()
    {
        $menu = 'login';
        $invalid = false;
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('ui_layout.login', compact('menu', 'invalid'));
    }
}
