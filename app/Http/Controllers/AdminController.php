<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // จัดการคำร้อง อนุมัติคำร้อง ,หน้าแรก แสดงรายการคำร้องทั้งหมดที่อยูในสถานะรอการอนุมัติ
    function application_approval()
    {
        $menu = 'manage_application';
        $application_type = 'all';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
        $applications = [
            [
                'application_id' => '001',
                'student_id' => '6105001111',
                'name' => 'กล้วยหอม',
                'lastname' => 'จอมซน',
                'date' => '2024-10-01',
                'application_type' => 'internship_register',
                'application_status' => 'approval_pending'
            ],
            [
                'application_id' => '002',
                'student_id' => '6405002222',
                'name' => 'ทอมแอนด์',
                'lastname' => 'เจอร์รี่',
                'date' => '2024-10-02',
                'application_type' => 'internship_request',
                'application_status' => 'approval_pending'
            ],
            [
                'application_id' => '003',
                'student_id' => '6305003333',
                'name' => 'สตรอเบอร์รี่',
                'lastname' => 'เค้ก',
                'date' => '2024-10-03',
                'application_type' => 'recommendation',
                'application_status' => 'approval_pending'
            ],
            [
                'application_id' => '004',
                'student_id' => '6405004444',
                'name' => 'หมูเด้ง',
                'lastname' => 'ขาหมู',
                'date' => '2024-10-04',
                'application_type' => 'appreciation',
                'application_status' => 'approval_pending'
            ],
            [
                'application_id' => '005',
                'student_id' => '6505005555',
                'name' => 'อันเดอร์',
                'lastname' => 'เดอะซี',
                'date' => '2024-10-04',
                'application_type' => 'internship_request',
                'application_status' => 'approval_pending'
            ],
        ];
        return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
    }
    // จัดการคำร้อง อนุมัติคำร้อง ,แสดงรายการคำร้องตามประเภทคำร้อง
    function application_approval_list($application_type)
    {
        $menu = 'manage_application';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        if ($application_type == 'internship_register') {
            // ตัวอย่างข้อมูล คำร้องขึ้นทะเบียนฝึกงาน ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '001',
                    'student_id' => '6105001111',
                    'name' => 'กล้วยหอม',
                    'lastname' => 'จอมซน',
                    'date' => '2024-10-01',
                    'application_type' => 'internship_register',
                    'application_status' => 'approval_pending'
                ]
            ];
            return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'internship_request') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอความอนุเคราะห์ ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '002',
                    'student_id' => '6405002222',
                    'name' => 'ทอมแอนด์',
                    'lastname' => 'เจอร์รี่',
                    'date' => '2024-10-02',
                    'application_type' => 'internship_request',
                    'application_status' => 'approval_pending'
                ],
                [
                    'application_id' => '005',
                    'student_id' => '6505005555',
                    'name' => 'อันเดอร์',
                    'lastname' => 'เดอะซี',
                    'date' => '2024-10-04',
                    'application_type' => 'internship_request',
                    'application_status' => 'approval_pending'
                ],
            ];
            return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'recommendation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือส่งตัวฝึกงาน ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '003',
                    'student_id' => '6305003333',
                    'name' => 'สตรอเบอร์รี่',
                    'lastname' => 'เค้ก',
                    'date' => '2024-10-03',
                    'application_type' => 'recommendation',
                    'application_status' => 'approval_pending'
                ]
            ];
            return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'appreciation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอบคุณ ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '004',
                    'student_id' => '6405004444',
                    'name' => 'หมูเด้ง',
                    'lastname' => 'ขาหมู',
                    'date' => '2024-10-04',
                    'application_type' => 'appreciation',
                    'application_status' => 'approval_pending'
                ]
            ];
            return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
        }
    }
    // จัดการคำร้อง อนุมัติคำร้อง ,ข้อมูลรายละเอียดคำร้อง
    function application_approval_detail($application_type, $application_id)
    {
        $menu = 'manage_application';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
        $applications = [
            [
                // ข้อมูล application
                'application_id' => '001',
                'date' => '2024-10-01',
                'application_type' => 'internship_register',
                'application_status' => 'approval_pending',
                // ข้อมูล student
                'student_id' => '6105001111',
                'prefix' => 'MR.',
                'name' => 'กล้วยหอม',
                'lastname' => 'จอมซน',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'banana@rumail.ru.ac.th',
                // ข้อมูล evidence
                'idcard_path' => '#idcard_path',
                'transcript_path' => '#transcript_path',
                'recentreceipt_path' => '#recentreceipt_path',
            ],
            [
                // ข้อมูล application
                'application_id' => '002',
                'date' => '2024-10-02',
                'application_type' => 'internship_request',
                'application_status' => 'approval_pending',
                // ข้อมูล student
                'student_id' => '6405002222',
                'prefix' => 'MR.',
                'name' => 'ทอมแอนด์',
                'lastname' => 'เจอร์รี่',
                'department' => 'IT',
                'phone' => '094xxx',
                'email' => 'tomandjerry@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'ทอมแอนด์เจอร์รี่ มหาชน จำกัด.',
                'company_address' => '2 หมู่ที่ 2 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'ข้าวเหนียว มะม่วง'
            ],
            [
                // ข้อมูล application
                'application_id' => '003',
                'date' => '2024-10-03',
                'application_type' => 'recommendation',
                'application_status' => 'approval_pending',
                // ข้อมูล student
                'student_id' => '6305003333',
                'prefix' => 'MS.',
                'name' => 'สตรอเบอร์รี่',
                'lastname' => 'เค้ก',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'strawberrycake@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'เค้กแสนอร่อย จำกัด.',
                'company_address' => '3 หมู่ที่ 3 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'คัพเค้ก นุ่มนวล',
                // ข้อมูลพี่เลี้ยง
                'mentor_name' => 'ภาพวาด',
                'mentor_lastname' => 'งามตา',
                'mentor_email' => 'butii@email.com',
                'mentor_position' => 'xxx',
                'mentor_phone'=> '02xxx',
                'mentor_fax'=> '02xxx',
                // เอกสาร2
                'response_file_path' => '#response_file_path'
            ],
            [
                // ข้อมูล application
                'application_id' => '004',
                'date' => '2024-10-04',
                'application_type' => 'appreciation',
                'application_status' => 'approval_pending',
                // ข้อมูล student
                'student_id' => '6405004444',
                'prefix' => 'MS.',
                'name' => 'หมูเด้ง',
                'lastname' => 'ขาหมู',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'hiphippo@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'สวนสัตว์เขาเขียว',
                'company_address' => '4 หมู่ที่ 4 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'ต้นกล้า งอกงาม',
                // ข้อมูลอาจารย์ที่ปรึกษา
                'professor_id' => '01',
                'professor_prefix'=>'MR.',
                'professor_name' => 'นภา',
                'professor_lastname' => 'กว้างใหญ่',
                'professor_email' => 'sky@ruamail.ac.th',
                'professor_phone'=> '02xxx',
                'professor_remark'=> '',
            ],
            [
                // ข้อมูล application
                'application_id' => '005',
                'date' => '2024-10-04',
                'application_type' => 'internship_request',
                'application_status' => 'approval_pending',
                // ข้อมูล student
                'student_id' => '6505005555',
                'prefix' => 'MS.',
                'name' => 'อันเดอร์',
                'lastname' => 'เดอะซี',
                'department' => 'IT',
                'phone' => '094xxx',
                'email' => 'underthesea@rumail.ru.ac.th',
                'company_name' => 'อควาเรียม',
                'company_address' => '5 หมู่ที่ 5 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'เซบาสเตียน ศรีเมือง'
            ],
        ];
        foreach ($applications as $application) {
            if ($application_id == $application['application_id']) {
                return view('admin.application_approval_detail', compact('menu', 'application'));
            }
        }
    }
    // จัดการคำร้อง อนุมัติคำร้อง ,อนุมัติคำร้อง
    function approve_application($application_type, $application_id)
    {
        $menu = 'manage_application';
        $event = 'approve';
        // .....เปลี่ยนสถานะคำร้องใน DB เป็น completed กรณีเป็นคำร้องขึ้นทะเบียนฝึกงาน......
        // .....เปลี่ยนสถานะคำร้องใน DB เป็น document_pending กรณีเป็นคำร้องอื่นๆ.......
        $noti_subject = 'คำร้องได้รับการอนุมัติ';
        $noti_detail = 'เลขที่คำร้อง:' . $application_id;
        if ($application_type == 'internship_register') {
            $noti_detail = $noti_detail . ' ,การขึ้นทะเบียนฝึกงานได้รับการอนุมัติ';
        } elseif ($application_type == 'internship_request') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอความอนุเคราะห์ได้รับการอนุมัติและกำลังจัดทำเอกสาร';
        } elseif ($application_type == 'recommendation') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารส่งตัวได้รับการอนุมัติและกำลังจัดทำเอกสาร';
        } elseif ($application_type == 'appreciation') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอบคุณได้รับการอนุมัติและกำลังจัดทำเอกสาร';
        }
        // ..............บันทึกแจ้งเตือน................
        return view('admin.application_approval_response', compact('menu', 'event'));
    }
    // จัดการคำร้อง อนุมัติคำร้อง ,ไม่อนุมัติคำร้อง aka.ปฏิเสธ
    function reject_application($application_type, $application_id, Request $request)
    {
        $menu = 'manage_application';
        $event = 'reject';
        $request->validate(
            [
                'response_detail' => 'required'
            ],
            [
                'response_detail.required' => 'กรุณาป้อนข้อความ'
            ]
        );
        // .....เปลี่ยนสถานะคำร้องใน DB เป็น reject......
        $noti_subject = 'คำร้องได้รับการปฏิเสธ';
        $noti_detail = 'เลขที่คำร้อง:' . $application_id;   // . คือการ concat string
        if ($application_type == 'internship_register') {
            $noti_detail = $noti_detail . ',การขึ้นทะเบียนฝึกงานได้รับการปฏิเสธ';
        } elseif ($application_type == 'internship_request') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอความอนุเคราะห์ได้รับการปฏิเสธ';
        } elseif ($application_type == 'recommendation') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารส่งตัวได้รับการปฏิเสธ';
        } elseif ($application_type == 'appreciation') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอบคุณได้รับการปฏิเสธ';
        }
        $noti_detail = $noti_detail . ',เหตุผลการปฏิเสธคำร้อง ' . $request->response_detail;
        // ..............บันทึกแจ้งเตือน................
        return view('admin.application_approval_response', compact('menu', 'event'));
    }

    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,หน้าแรก แสดงรายการคำร้องทั้งหมดที่อยูในสถานะกำลังจัดทำ
    function application_update_document_status()
    {
        $menu = 'manage_application';
        $application_type = 'all';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
        $applications = [
            [
                'application_id' => '002',
                'student_id' => '6405002222',
                'name' => 'ทอมแอนด์',
                'lastname' => 'เจอร์รี่',
                'date' => '2024-10-02',
                'application_type' => 'internship_request',
                'application_status' => 'document_pending'
            ],
            [
                'application_id' => '003',
                'student_id' => '6305003333',
                'name' => 'สตรอเบอร์รี่',
                'lastname' => 'เค้ก',
                'date' => '2024-10-03',
                'application_type' => 'recommendation',
                'application_status' => 'document_pending'
            ],
            [
                'application_id' => '004',
                'student_id' => '6405004444',
                'name' => 'หมูเด้ง',
                'lastname' => 'ขาหมู',
                'date' => '2024-10-04',
                'application_type' => 'appreciation',
                'application_status' => 'document_pending'
            ],
            [
                'application_id' => '005',
                'student_id' => '6505005555',
                'name' => 'อันเดอร์',
                'lastname' => 'เดอะซี',
                'date' => '2024-10-04',
                'application_type' => 'internship_request',
                'application_status' => 'document_pending'
            ],
        ];
        return view('admin.application_update_document_status', compact('menu', 'application_type', 'applications'));
    }
    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,แสดงรายการคำร้องตามประเภทคำร้อง
    function application_update_document_status_list($application_type)
    {
        $menu = 'manage_application';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        if ($application_type == 'internship_request') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอความอนุเคราะห์ ที่อยู่ในสถานะกำลังจัดทำ
            $applications = [
                [
                    'application_id' => '002',
                    'student_id' => '6405002222',
                    'name' => 'ทอมแอนด์',
                    'lastname' => 'เจอร์รี่',
                    'date' => '2024-10-02',
                    'application_type' => 'internship_request',
                    'application_status' => 'document_pending'
                ],
                [
                    'application_id' => '005',
                    'student_id' => '6505005555',
                    'name' => 'อันเดอร์',
                    'lastname' => 'เดอะซี',
                    'date' => '2024-10-04',
                    'application_type' => 'internship_request',
                    'application_status' => 'document_pending'
                ],
            ];
            return view('admin.application_update_document_status', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'recommendation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือส่งตัวฝึกงาน ที่อยู่ในสถานะกำลังจัดทำ
            $applications = [
                [
                    'application_id' => '003',
                    'student_id' => '6305003333',
                    'name' => 'สตรอเบอร์รี่',
                    'lastname' => 'เค้ก',
                    'date' => '2024-10-03',
                    'application_type' => 'recommendation',
                    'application_status' => 'document_pending'
                ]
            ];
            return view('admin.application_update_document_status', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'appreciation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอบคุณ ที่อยู่ในสถานะกำลังจัดทำ
            $applications = [
                [
                    'application_id' => '004',
                    'student_id' => '6405004444',
                    'name' => 'หมูเด้ง',
                    'lastname' => 'ขาหมู',
                    'date' => '2024-10-04',
                    'application_type' => 'appreciation',
                    'application_status' => 'document_pending'
                ]
            ];
            return view('admin.application_update_document_status', compact('menu', 'application_type', 'applications'));
        }
    }
    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,ข้อมูลรายละเอียดคำร้อง
    function application_update_document_status_detail($application_type, $application_id){
        $menu = 'manage_application';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะกำลังจัดทำ
        $applications = [
            [
                // ข้อมูล application
                'application_id' => '002',
                'date' => '2024-10-02',
                'application_type' => 'internship_request',
                'application_status' => 'document_pending',
                // ข้อมูล student
                'student_id' => '6405002222',
                'prefix' => 'MR.',
                'name' => 'ทอมแอนด์',
                'lastname' => 'เจอร์รี่',
                'department' => 'IT',
                'phone' => '094xxx',
                'email' => 'tomandjerry@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'ทอมแอนด์เจอร์รี่ มหาชน จำกัด.',
                'company_address' => '2 หมู่ที่ 2 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'ข้าวเหนียว มะม่วง'
            ],
            [
                // ข้อมูล application
                'application_id' => '003',
                'date' => '2024-10-03',
                'application_type' => 'recommendation',
                'application_status' => 'document_pending',
                // ข้อมูล student
                'student_id' => '6305003333',
                'prefix' => 'MS.',
                'name' => 'สตรอเบอร์รี่',
                'lastname' => 'เค้ก',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'strawberrycake@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'เค้กแสนอร่อย จำกัด.',
                'company_address' => '3 หมู่ที่ 3 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'คัพเค้ก นุ่มนวล',
                // ข้อมูลพี่เลี้ยง
                'mentor_name' => 'ภาพวาด',
                'mentor_lastname' => 'งามตา',
                'mentor_email' => 'butii@email.com',
                'mentor_position' => 'xxx',
                'mentor_phone'=> '02xxx',
                'mentor_fax'=> '02xxx',
                // เอกสาร2
                'response_file_path' => '#response_file_path'
            ],
            [
                // ข้อมูล application
                'application_id' => '004',
                'date' => '2024-10-04',
                'application_type' => 'appreciation',
                'application_status' => 'document_pending',
                // ข้อมูล student
                'student_id' => '6405004444',
                'prefix' => 'MS.',
                'name' => 'หมูเด้ง',
                'lastname' => 'ขาหมู',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'hiphippo@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'สวนสัตว์เขาเขียว',
                'company_address' => '4 หมู่ที่ 4 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'ต้นกล้า งอกงาม',
                // ข้อมูลอาจารย์ที่ปรึกษา
                'professor_id' => '01',
                'professor_prefix'=>'MR.',
                'professor_name' => 'นภา',
                'professor_lastname' => 'กว้างใหญ่',
                'professor_email' => 'sky@ruamail.ac.th',
                'professor_phone'=> '02xxx',
                'professor_remark'=> '',
            ],
            [
                // ข้อมูล application
                'application_id' => '005',
                'date' => '2024-10-04',
                'application_type' => 'internship_request',
                'application_status' => 'document_pending',
                // ข้อมูล student
                'student_id' => '6505005555',
                'prefix' => 'MS.',
                'name' => 'อันเดอร์',
                'lastname' => 'เดอะซี',
                'department' => 'IT',
                'phone' => '094xxx',
                'email' => 'underthesea@rumail.ru.ac.th',
                'company_name' => 'อควาเรียม',
                'company_address' => '5 หมู่ที่ 5 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'เซบาสเตียน ศรีเมือง'
            ],
        ];
        foreach ($applications as $application) {
            if ($application_id == $application['application_id']) {
                return view('admin.application_update_document_status_detail', compact('menu', 'application'));
            }
        }
    }
    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,อัพเดตสถานะการจัดทำเอกสาร aka.ทำเอกสารเสร็จแล้ว
    function application_update_document_status_complete($application_type, $application_id){
        $menu = 'manage_application';
        // .....เปลี่ยนสถานะคำร้องใน DB เป็น completed......
        $noti_subject = 'จัดทำเอกสารเสร็จสิ้น';
        $noti_detail = 'เลขที่คำร้อง:' . $application_id;
        if ($application_type == 'internship_request') {
            $noti_detail = $noti_detail . ' ,เอกสารขอความอนุเคราะห์จัดทำเสร็จสิ้นแล้วสามารถรับได้ที่คณะวิทยาศาสตร์ ภาควิชาวิทยาการคอมพิวเตอร์';
        } elseif ($application_type == 'recommendation') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารส่งตัวจัดทำเสร็จสิ้นแล้วสามารถรับได้ที่คณะวิทยาศาสตร์ ภาควิชาวิทยาการคอมพิวเตอร์';
        } elseif ($application_type == 'appreciation') {
            $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอบคุณจัดทำเสร็จสิ้นแล้วสามารถรับได้ที่คณะวิทยาศาสตร์ ภาควิชาวิทยาการคอมพิวเตอร์';
        }
        // ..............บันทึกแจ้งเตือน................
        return view('admin.application_update_document_status_response', compact('menu'));
    }

    // จัดการคำร้อง ประวัติคำร้อง ,หน้าแรก แสดงรายการคำร้องทั้งหมด
    function application_history()
    {
        $menu = 'manage_application';
        $application_type = 'all';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        // ข้อมูลตัวอย่าง application ทั้งหมด
        $applications = [
            [
                'application_id' => '001',
                'student_id' => '6105001111',
                'name' => 'กล้วยหอม',
                'lastname' => 'จอมซน',
                'date' => '2024-10-01',
                'application_type' => 'internship_register',
                'application_status' => 'completed'
            ],
            [
                'application_id' => '002',
                'student_id' => '6405002222',
                'name' => 'ทอมแอนด์',
                'lastname' => 'เจอร์รี่',
                'date' => '2024-10-02',
                'application_type' => 'internship_request',
                'application_status' => 'document_pending'
            ],
            [
                'application_id' => '003',
                'student_id' => '6305003333',
                'name' => 'สตรอเบอร์รี่',
                'lastname' => 'เค้ก',
                'date' => '2024-10-03',
                'application_type' => 'recommendation',
                'application_status' => 'document_pending'
            ],
            [
                'application_id' => '004',
                'student_id' => '6405004444',
                'name' => 'หมูเด้ง',
                'lastname' => 'ขาหมู',
                'date' => '2024-10-04',
                'application_type' => 'appreciation',
                'application_status' => 'approval_pending'
            ],
            [
                'application_id' => '005',
                'student_id' => '6505005555',
                'name' => 'อันเดอร์',
                'lastname' => 'เดอะซี',
                'date' => '2024-10-04',
                'application_type' => 'internship_request',
                'application_status' => 'reject'
            ],
        ];
        return view('admin.application_history', compact('menu', 'application_type', 'applications'));
    }
    // จัดการคำร้อง ประวัติคำร้อง ,แสดงรายการคำร้องตามประเภทคำร้อง
    function application_history_list($application_type)
    {
        $menu = 'manage_application';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        if ($application_type == 'internship_register') {
            // ตัวอย่างข้อมูล คำร้องขึ้นทะเบียนฝึกงาน ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '001',
                    'student_id' => '6105001111',
                    'name' => 'กล้วยหอม',
                    'lastname' => 'จอมซน',
                    'date' => '2024-10-01',
                    'application_type' => 'internship_register',
                    'application_status' => 'completed'
                ]
            ];
            return view('admin.application_history', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'internship_request') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอความอนุเคราะห์ ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '002',
                    'student_id' => '6405002222',
                    'name' => 'ทอมแอนด์',
                    'lastname' => 'เจอร์รี่',
                    'date' => '2024-10-02',
                    'application_type' => 'internship_request',
                    'application_status' => 'document_pending'
                ],
                [
                    'application_id' => '005',
                    'student_id' => '6505005555',
                    'name' => 'อันเดอร์',
                    'lastname' => 'เดอะซี',
                    'date' => '2024-10-04',
                    'application_type' => 'internship_request',
                    'application_status' => 'reject'
                ],
            ];
            return view('admin.application_history', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'recommendation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือส่งตัวฝึกงาน ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '003',
                    'student_id' => '6305003333',
                    'name' => 'สตรอเบอร์รี่',
                    'lastname' => 'เค้ก',
                    'date' => '2024-10-03',
                    'application_type' => 'recommendation',
                    'application_status' => 'document_pending'
                ]
            ];
            return view('admin.application_history', compact('menu', 'application_type', 'applications'));
        } else if ($application_type == 'appreciation') {
            // ตัวอย่างข้อมูล คำร้องขอหนังสือขอบคุณ ที่อยู่ในสถานะรอการอนุมัติ
            $applications = [
                [
                    'application_id' => '004',
                    'student_id' => '6405004444',
                    'name' => 'หมูเด้ง',
                    'lastname' => 'ขาหมู',
                    'date' => '2024-10-04',
                    'application_type' => 'appreciation',
                    'application_status' => 'approval_pending'
                ]
            ];
            return view('admin.application_history', compact('menu', 'application_type', 'applications'));
        }
    }
    // จัดการคำร้อง ประวัติคำร้อง ,ข้อมูลรายละเอียดคำร้อง
    function application_history_detail($application_type, $application_id){
        $menu = 'manage_application';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
        $applications = [
            [
                // ข้อมูล application
                'application_id' => '001',
                'date' => '2024-10-01',
                'application_type' => 'internship_register',
                'application_status' => 'completed',
                // ข้อมูล student
                'student_id' => '6105001111',
                'prefix' => 'MR.',
                'name' => 'กล้วยหอม',
                'lastname' => 'จอมซน',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'banana@rumail.ru.ac.th',
                // ข้อมูล evidence
                'idcard_path' => '#idcard_path',
                'transcript_path' => '#transcript_path',
                'recentreceipt_path' => '#recentreceipt_path',
            ],
            [
                // ข้อมูล application
                'application_id' => '002',
                'date' => '2024-10-02',
                'application_type' => 'internship_request',
                'application_status' => 'document_pending',
                // ข้อมูล student
                'student_id' => '6405002222',
                'prefix' => 'MR.',
                'name' => 'ทอมแอนด์',
                'lastname' => 'เจอร์รี่',
                'department' => 'IT',
                'phone' => '094xxx',
                'email' => 'tomandjerry@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'ทอมแอนด์เจอร์รี่ มหาชน จำกัด.',
                'company_address' => '2 หมู่ที่ 2 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'ข้าวเหนียว มะม่วง'
            ],
            [
                // ข้อมูล application
                'application_id' => '003',
                'date' => '2024-10-03',
                'application_type' => 'recommendation',
                'application_status' => 'document_pending',
                // ข้อมูล student
                'student_id' => '6305003333',
                'prefix' => 'MS.',
                'name' => 'สตรอเบอร์รี่',
                'lastname' => 'เค้ก',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'strawberrycake@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'เค้กแสนอร่อย จำกัด.',
                'company_address' => '3 หมู่ที่ 3 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'คัพเค้ก นุ่มนวล',
                // ข้อมูลพี่เลี้ยง
                'mentor_name' => 'ภาพวาด',
                'mentor_lastname' => 'งามตา',
                'mentor_email' => 'butii@email.com',
                'mentor_position' => 'xxx',
                'mentor_phone'=> '02xxx',
                'mentor_fax'=> '02xxx',
                // เอกสาร2
                'response_file_path' => '#response_file_path'
            ],
            [
                // ข้อมูล application
                'application_id' => '004',
                'date' => '2024-10-04',
                'application_type' => 'appreciation',
                'application_status' => 'approval_pending',
                // ข้อมูล student
                'student_id' => '6405004444',
                'prefix' => 'MS.',
                'name' => 'หมูเด้ง',
                'lastname' => 'ขาหมู',
                'department' => 'CS',
                'phone' => '094xxx',
                'email' => 'hiphippo@rumail.ru.ac.th',
                // ข้อมูลสถานที่ฝึกงาน
                'company_name' => 'สวนสัตว์เขาเขียว',
                'company_address' => '4 หมู่ที่ 4 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'ต้นกล้า งอกงาม',
                // ข้อมูลอาจารย์ที่ปรึกษา
                'professor_id' => '01',
                'professor_prefix'=>'MR.',
                'professor_name' => 'นภา',
                'professor_lastname' => 'กว้างใหญ่',
                'professor_email' => 'sky@ruamail.ac.th',
                'professor_phone'=> '02xxx',
                'professor_remark'=> '',
            ],
            [
                // ข้อมูล application
                'application_id' => '005',
                'date' => '2024-10-04',
                'application_type' => 'internship_request',
                'application_status' => 'reject',
                // ข้อมูล student
                'student_id' => '6505005555',
                'prefix' => 'MS.',
                'name' => 'อันเดอร์',
                'lastname' => 'เดอะซี',
                'department' => 'IT',
                'phone' => '094xxx',
                'email' => 'underthesea@rumail.ru.ac.th',
                'company_name' => 'อควาเรียม',
                'company_address' => '5 หมู่ที่ 5 ถนน รามคำแหง00 อำเภอ/เขต บางกะปิ ตำบล/แขวง หัวหมาก จังหวัด กรุงเทพมหานคร รหัสไปรษณีย์ 102xx',
                'company_phone'=> '02xxx',
                'company_fax'=> '02xxx',
                // ข้อมูลรายละเอียดการฝึกงาน
                'register_semester'=>'S',
                'year'=>'2567',
                'start_date'=>'2024-10-30',
                'end_date'=>'2025-2-10',
                'attend_to'=>'เซบาสเตียน ศรีเมือง'
            ],
        ];
        foreach ($applications as $application) {
            if ($application_id == $application['application_id']) {
                return view('admin.application_history_detail', compact('menu', 'application'));
            }
        }
    }

    // จัดการเอกสาร ,หน้าแรก
    function manage_document()
    {
        $menu = 'manage_document';
        return view('admin.admin_layout', compact('menu'));
    }

    // จัดการข้อมูลผู้ใช้งาน อาจารย์ ,หน้าแรก
    function manage_user_professor()
    {
        $menu = 'menage_user';
        return view('admin.admin_layout', compact('menu'));
    }

    // จัดการข้อมูลผู้ใช้งาน นักศึกษา ,หน้าแรก
    function manage_user_student()
    {
        $menu = 'menage_user';
        return view('admin.admin_layout', compact('menu'));
    }
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

    // ตรวจสอบเกรด ,หน้าแรก
    function check_grade()
    {
        $menu = 'check_grade';
        return view('admin.admin_layout', compact('menu'));
    }
}
