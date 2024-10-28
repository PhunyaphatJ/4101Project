<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    // student_process_status = (no_register, register_pending, register_completed, company_pending, internship)
    // student_process_status = (rec, request, rec_with_request, rec_no_request)
    // report = (no_report, edit_report, have_report)

    function register()
    {
        $menu = 'register';
        $path = public_path('raw_database.json');    
        $data = json_decode(file_get_contents($path), false);
        $provinces = array_map(function ($item) {
            return $item->province;
        }, $data);
        $provinces = array_unique($provinces);
        $provinces = array_values($provinces);
        
        $amphoes = [];
        $tambons = [];
        return view('student.register' ,compact('menu','provinces','amphoes','tambons'));
    }

    function compare_register(Request $request)
    {
        $register = [
            'prefix' => $request->prefix,
            'department' => $request->department,
            'student_id' => $request->student_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'house_no' => $request->house_no,
            'village_no' => $request->village_no,
            'road' => $request->road,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'postcode' => $request->postcode,
            'email' => $request->email,
            'password' => $request->password,
            'confirm_password' => $request->confirm_password,
        ];
        if ($register['password'] == $register['confirm_password']) {
            $menu = 'manual';
            $student_process_status = 'no_register';
            return view('student.manual', compact('menu', 'student_process_status'));
        }
    }

    function manual($student_process_status)
    {
        $menu = 'manual';
        return view('student.manual', compact('menu', 'student_process_status'));
    }

    function process($student_process_status)
    {
        $menu = 'process';
        $students = [
            [
                'prefix' => 'prefix',
                'department' => 'COS',
                'student_id' => 'student_id',
                'fname' => 'fname',
                'lname' => 'lname',
                'phone' => '000-000-0000',
                'email' => '0000000000@rumail.ru.ac.th',
            ],
        ];
        return view('student.process', compact('menu', 'student_process_status', 'students'));
    }

    function process_register_for_internship($student_process_status)
    {
        $menu = 'process';
        $students = [
            [
                'prefix' => 'prefix',
                'department' => 'COS',
                'student_id' => 'student_id',
                'fname' => 'fname',
                'lname' => 'lname',
                'phone' => '000-000-0000',
                'email' => '0000000000@rumail.ru.ac.th',
            ],
        ];
        $internship_register = [
            [
                'transcript' => 'transcript',
                'student_card' => 'student_card',
                'recentreceipt' => 'recentreceipt',
            ],
        ];
        return view('student.process_register_for_internship', compact('menu', 'student_process_status', 'students', 'internship_register'));
    }

    function compare_internship_register(Request $request)
    {
        $internship_register_files = [
            'transcript' => $request->transcript,
            'student_card' => $request->student_card,
            'recentreceipt' => $request->recentreceipt,
        ];
        $student_process_status = 'register_pending';
        return redirect(route('process_register_for_internship', $student_process_status));
    }

    function process_company($student_process_status)
    {
        $menu = 'process';
        $company_addresses = [
            [
                'company_id' => 'company_id',
                'company_name' => 'บริษัท ccc จำกัด',
                'house_no' => 'house_no',
                'village_no' => 'village_no',
                'road' => 'road',
                'province' => 'province',
                'district' => 'district',
                'sub_district' => 'sub_district',
                'postcode' => 'postcode',
                'phone' => '000-000-0000',
                'fax' => '000-000-0000'
            ],
        ];
        $internship_info = [
            [
                'semester' => '1',
                'years' => '2555',
                'doc2' => 'doc2',
                'start_date' => '10/10/11',
                'end_date' => '14/20/50',
                'attend_to' => 'xxxx xxxx',
            ],
        ];
        $mentors = [
            [
                'fname' => 'fname',
                'lname' => 'lname',
                'position' => 'position',
                'phone' => '000-000-0000',
                'fax' => 'fax',
                'email' => 'name@example.com',
            ],
        ];
        return view('student.process_company', compact('menu', 'student_process_status', 'company_addresses', 'internship_info', 'mentors'));
    }

    function process_company_rec($student_process_status, $app_type)
    {
        $menu = 'process';
        return view('student.process_company_rec', compact('menu', 'student_process_status', 'app_type'));
    }

    function process_company_rec_with_request($student_process_status, $app_type)
    {
        $menu = 'process';
        //ตัวอย่างข้อมูล company ที่ได้ทำการขอเอกสารขอความอนุเคราะห์
        $company_addresses = [
            [
                'company_id' => 'บริษัท ccc จำกัด',
                'company_name' => 'บริษัท ccc จำกัด',
                'house_no' => 'house_no',
                'village_no' => 'village_no',
                'road' => 'road',
                'province' => 'province',
                'district' => 'district',
                'sub_district' => 'sub_district',
                'postcode' => 'postcode',
                'phone' => '000-000-0000',
                'fax' => '000-000-0000'
            ],
        ];
        return view('student.process_company_rec_with_request', compact('menu', 'student_process_status', 'app_type', 'company_addresses'));
    }


    function process_company_search_address($student_process_status, $app_type)
    {
        $menu = 'process';
        //ตัวอย่างข้อมูล company address ที่มีอยู่ในระบบ
        $company_addresses = [
            [
                'company_id' => 'บริษัท aaa จำกัด',
                'company_name' => 'บริษัท aaa จำกัด',
                'house_no' => 'house_no',
                'village_no' => 'village_no',
                'road' => 'road',
                'province' => 'province',
                'district' => 'district',
                'sub_district' => 'sub_district',
                'postcode' => 'postcode',
                'phone' => '000-000-0000',
                'fax' => '000-000-0000'
            ],
            [
                'company_id' => 'บริษัท ccc จำกัด',
                'company_name' => 'บริษัท ccc จำกัด',
                'house_no' => 'house_no',
                'village_no' => 'village_no',
                'road' => 'road',
                'province' => 'province',
                'district' => 'district',
                'sub_district' => 'sub_district',
                'postcode' => 'postcode',
                'phone' => '000-000-0000',
                'fax' => '000-000-0000'
            ],
        ];
        return view('student.process_company_search_address', compact('menu', 'student_process_status', 'app_type', 'company_addresses'));
    }

    function company_search_address(Request $request, $student_process_status, $app_type)
    {
        $search_address = [
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'company_name' => $request->company_name,
        ];
        //ตัวอย่างข้อมูล company address ที่ค้นหาเจอ
        $company_addresses = [
            [
                'company_id' => 'บริษัท ccc จำกัด',
                'company_name' => 'บริษัท ccc จำกัด',
                'house_no' => 'house_no',
                'village_no' => 'village_no',
                'road' => 'road',
                'province' => 'province',
                'district' => 'district',
                'sub_district' => 'sub_district',
                'postcode' => 'postcode',
                'phone' => '000-000-0000',
                'fax' => '000-000-0000'
            ],
        ];
        $menu = 'process';
        return view('student.process_company_search_address', compact('menu', 'student_process_status', 'app_type', 'company_addresses'));
    }

    function select_company($student_process_status, $app_type, $company_id)
    {
        $company_addresses = [
            [
                'company_id' => 'บริษัท ccc จำกัด',
                'company_name' => 'บริษัท zc จำกัด',
                'house_no' => 'house_no',
                'village_no' => 'village_no',
                'road' => 'road',
                'province' => 'province',
                'district' => 'district',
                'sub_district' => 'sub_district',
                'postcode' => 'postcode',
                'phone' => '000-000-0000',
                'fax' => '000-000-0000'
            ],

        ];
        if ($app_type == 'rec_with_request') {
            $internship_info = [
                [
                    'semester' => '1',
                    'years' => '2555',
                    'doc2' => 'doc2',
                    'start_date' => '10/10/11',
                    'end_date' => '14/20/50',
                    'attend_to' => 'xxxx xxxx',
                ],
            ];
        } else {
            $internship_info = [];
        }
        //ตัวอย่างพี่เลี้ยงที่ทำงานใน company นี้
        $mentors = [
            [
                'fname' => 'fname',
                'lname' => 'lname',
                'position' => 'position',
                'phone' => '000-000-0000',
                'fax' => 'fax',
                'email' => 'name@example.com',
            ],
        ];
        foreach ($company_addresses as $company_address) {
            if ($company_id == $company_address['company_id']) {
                $menu = 'process';
                return view('student.process_company_choose_address', compact('menu', 'student_process_status', 'app_type', 'company_addresses', 'internship_info', 'mentors'));
            }
        }
    }

    function process_company_add_address($student_process_status, $app_type)
    {
        $menu = 'process';
        return view('student.process_company_add_address', compact('menu', 'student_process_status', 'app_type'));
    }

    function compare_company(Request $request, $student_process_status, $app_type)
    {
        $company_addresses = [
            [
                'company_name' => $request->company_name,
                'fax' => $request->fax,
                'phone' => $request->phone,
                'house_no' => $request->house_no,
                'village_no' => $request->village_no,
                'road' => $request->road,
                'province' => $request->province,
                'district' => $request->district,
                'sub_district' => $request->sub_district,
                'postcode' => $request->postcode,
            ],
        ];
        //ตัวอย่างพี่เลี้ยงที่ทำงานใน company นี้
        $mentors = [
            [
                'fname' => 'fname',
                'lname' => 'lname',
                'position' => 'position',
                'phone' => '000-000-0000',
                'fax' => 'fax',
                'email' => 'name@example.com',
            ],
        ];
        $menu = 'process';
        return view('student.process_company_choose_address', compact('menu', 'student_process_status', 'app_type', 'company_addresses', 'mentors'));
    }

    function process_company_choose_address($student_process_status, $app_type)
    {
        $menu = 'process';
        $company_addresses = [
            [
                'company_id' => 'company_id',
                'company_name' => 'บริษัท ccc จำกัด',
                'house_no' => 'house_no',
                'village_no' => 'village_no',
                'road' => 'road',
                'province' => 'province',
                'district' => 'district',
                'sub_district' => 'sub_district',
                'postcode' => 'postcode',
                'phone' => '000-000-0000',
                'fax' => '000-000-0000'
            ],
        ];
        $internship_info = [
            [
                'semester' => '1',
                'years' => '2555',
                'doc2' => 'doc2',
                'start_date' => '10/10/11',
                'end_date' => '14/20/50',
                'attend_to' => 'xxxx xxxx',
            ],
        ];
        $mentors = [
            [
                'fname' => 'fname',
                'lname' => 'lname',
                'position' => 'position',
                'phone' => '000-000-0000',
                'fax' => 'fax',
                'email' => 'name@example.com',
            ],
        ];
        return view('student.process_company_choose_address', compact('menu', 'student_process_status', 'app_type',  'company_addresses', 'internship_info', 'mentors'));
    }

    function compare_internship_info(Request $request, $student_process_status, $app_type)
    {
        $internship_info = [
            [
                'semester' => $request->semester,
                'years' => $request->years,
                'doc2' => $request->doc2,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'attend_to' => $request->attend_to,
            ],
        ];
        $student_process_status = 'company_pending';
        return redirect(route('process_company_choose_address',[$student_process_status, $app_type]));
    }

    function add_mentor($student_process_status, $app_type)
    {
        $menu = 'process';
        return view('student.add_mentor', compact('menu', 'student_process_status', 'app_type'));
    }

    function compare_mentor(Request $request, $student_process_status, $app_type)
    {
        $mentors = [
            [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'position' => $request->position,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
            ],
        ];
        return redirect(route('process_company_choose_address',[$student_process_status, $app_type]));
    }

    function professor_info($student_process_status)
    {
        $menu = 'process';
        $professors = [
            [
                'prefix' => 'prefix',
                'fname' => 'fname',
                'lname' => 'lname',
                'phone' => '000-000-0000',
                'email' => '0000000000@rumail.ru.ac.th',
                'remark' => 'สามารถเข้าพบได้ทุกวัน ช่วงบ่าย',
            ],
        ];
        return view('student.professor_info', compact('menu', 'student_process_status', 'professors'));
    }

    function report($student_process_status)
    {
        $menu = 'process';
        $report_files = [];
        // $report_files = [
        //     [
        //        'report_file' => 'report_file', 
        //     ]
        // ];
        if ($report_files == null) {
            $report = 'no_report';
        } else {
            if ($report_files != null) {
                $report = 'have_report';
            }
        }
        return view('student.report', compact('menu', 'student_process_status', 'report'));
    }

    function add_report(Request $request, $student_process_status)
    {
        $report_files = [
            'report_file' => $request->report_file,
        ];
        return redirect(route('report', $student_process_status));
    }

    function app_status($student_process_status)
    {
        $menu = 'app_status';
        //ตัวอย่างข้อมูล application
        $applications = [
            [
                'application_id' => '12345',
                'company_name' => 'บริษัท',
                'application_date' => '24/10/2567',
                'application_status' => 'สมบูรณ์',
                'application_type' => 'internship_request'
            ],
            [
                'application_id' => '12345',
                'company_name' => 'บริษัท',
                'application_date' => '24/10/2567',
                'application_status' => 'กำลังดำเนินการ',
                'application_type' => 'internship_request'
            ],
            [
                'application_id' => '12345',
                'company_name' => 'บริษัท',
                'application_date' => '24/10/2567',
                'application_status' => 'รอการอนุมัติ',
                'application_type' => 'internship_request'
            ],
            [
                'application_id' => '12345',
                'company_name' => 'บริษัท',
                'application_date' => '24/10/2567',
                'application_status' => 'ปฎิเสธ',
                'application_type' => 'internship_request'
            ],
            [
                'application_id' => '12345',
                'company_name' => 'บริษัท',
                'application_date' => '24/10/2567',
                'application_status' => 'รอการอนุมัติ',
                'application_type' => 'internship_rec'
            ],
            [
                'application_id' => '12345',
                'company_name' => 'บริษัท',
                'application_date' => '24/10/2567',
                'application_status' => 'กำลังดำเนินการ',
                'application_type' => 'internship_register'
            ],
        ];
        return view('student.app_status', compact('menu', 'applications', 'student_process_status'));
    }
}
