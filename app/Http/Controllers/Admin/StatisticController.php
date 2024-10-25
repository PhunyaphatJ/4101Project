<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
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
}
