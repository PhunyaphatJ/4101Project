<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function student_register($menu)
    {
        if ($menu == 'login') {
            return view('ui_layout.login', compact('menu'));
        } else if ($menu == 'register') {
            return view('student.register', compact('menu'));
        }
    }

    function internship_register($student_process_status, $menu)
    {
        if ($student_process_status == 'no_register' || $student_process_status == 'register_pending' || $student_process_status == 'register_completed' || $student_process_status == 'company_pending' || $student_process_status == 'internship') {
            if ($menu == 'student_manual') {
                return view('student.student_manual', compact('menu', 'student_process_status'));
            } else if ($menu == 'student_process') {
                return view('student.student_process', compact('menu', 'student_process_status'));
            } else if ($menu == 'student_app_status') {
                return view('student.student_app_status', compact('menu', 'student_process_status'));
            }

            if ($menu == 'student_process_register_for_internship') {
                $menu = 'student_process';
                return view('student.student_process_register_for_internship', compact('menu', 'student_process_status'));
            } else if ($menu == 'student_process_company') {
                $menu = 'student_process';
                return view('student.student_process_company', compact('menu', 'student_process_status'));
            }
        }
    }

    function internship_company($student_process_status, $app_type, $menu)
    {
        if ($student_process_status == 'no_register' || $student_process_status == 'register_pending' || $student_process_status == 'register_completed' || $student_process_status == 'company_pending' || $student_process_status == 'internship') {
            if ($app_type == 'rec' || $app_type == 'request' || $app_type == 'rec_with_request' || $app_type == 'rec_no_request') {
                if ($menu == 'student_manual') {
                    return view('student.student_manual', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process') {
                    return view('student.student_process', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_app_status') {
                    return view('student.student_app_status', compact('menu', 'student_process_status'));
                }

                if ($menu == 'student_process_register_for_internship') {
                    $menu = 'student_process';
                    return view('student.student_process_register_for_internship', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process_company') {
                    $menu = 'student_process';
                    return view('student.student_process_company', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process_company_rec') {
                    $menu = 'student_process';
                    return view('student.student_process_company_rec', compact('menu', 'student_process_status', 'app_type'));
                } else if ($menu == 'student_process_company_search_address') {
                    $menu = 'student_process';
                    return view('student.student_process_company_search_address', compact('menu', 'student_process_status', 'app_type'));
                } else if ($menu == 'student_process_company_add_address') {
                    $menu = 'student_process';
                    return view('student.student_process_company_add_address', compact('menu', 'student_process_status', 'app_type'));
                } else if ($menu == 'student_process_company_choose_address') {
                    $menu = 'student_process';
                    return view('student.student_process_company_choose_address', compact('menu', 'student_process_status', 'app_type'));
                } else  if ($menu == 'student_process_company_rec_with_request') {
                    $menu = 'student_process';
                    return view('student.student_process_company_rec_with_request', compact('menu', 'student_process_status', 'app_type'));
                } else  if ($menu == 'student_professor') {
                    $menu = 'student_process';
                    return view('student.student_professor', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_report') {
                    $menu = 'student_process';
                    $report = 'no_report';
                    return view('student.student_report', compact('menu', 'student_process_status','app_type', 'report'));
                }
            }
        }
    }

    function internship_report($student_process_status, $app_type, $report , $menu)
    {
        if ($student_process_status == 'no_register' || $student_process_status == 'register_pending' || $student_process_status == 'register_completed' || $student_process_status == 'company_pending' || $student_process_status == 'internship') {
            if ($app_type == 'rec' || $app_type == 'request' || $app_type == 'rec_with_request' || $app_type == 'rec_no_request' || $app_type == 'have_company') {
                if ($menu == 'student_manual') {
                    return view('student.student_manual', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process') {
                    return view('student.student_process', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_app_status') {
                    return view('student.student_app_status', compact('menu', 'student_process_status'));
                }

                if ($menu == 'student_process_register_for_internship') {
                    $menu = 'student_process';
                    return view('student.student_process_register_for_internship', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_process_company') {
                    $menu = 'student_process';
                    return view('student.student_process_company', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_professor') {
                    $menu = 'student_process';
                    return view('student.student_professor', compact('menu', 'student_process_status'));
                } else if ($menu == 'student_report') {
                    $menu = 'student_process';
                    return view('student.student_report', compact('menu', 'student_process_status', 'app_type', 'report'));
                }
            }
        }
    }
}
