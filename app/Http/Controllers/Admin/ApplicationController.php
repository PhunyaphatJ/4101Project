<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Professor;
use App\Models\Notification;
use App\Models\Internship_info;
use App\Models\Internship_detail;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ApplicationController extends Controller
{
    // จัดการคำร้อง อนุมัติคำร้อง ,หน้าแรก แสดงรายการคำร้องทั้งหมดที่อยูในสถานะรอการอนุมัติ
    function application_approval(Request $request)
    {
        $menu = 'manage_application';
        $application_type = 'all';

        $sort = $request->input('sort');
        $direction = $request->input('direction', 'asc');

        if (!$sort) {
            $applications = Application::where('application_status', 'approval_pending')
                ->join('notifications', 'applications.notification_id', '=', 'notifications.notification_id')
                ->select('applications.*', 'notifications.datetime')
                ->orderBy('notifications.datetime', 'asc')
                ->paginate(10);
        } else {
            // If sorting by application_id is requested
            $applications = Application::where('application_status', 'approval_pending')
                ->join('notifications', 'applications.notification_id', '=', 'notifications.notification_id')
                ->select('applications.*', 'notifications.datetime')
                ->orderBy($sort, $direction)
                ->paginate(10);
        }

        return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
    }

    // จัดการคำร้อง อนุมัติคำร้อง ,แสดงรายการคำร้องตามประเภทคำร้อง
    function application_approval_list($application_type)
    {
        $menu = 'manage_application';
        $applications = Application::where('application_type', $application_type)
            ->where('application_status', 'approval_pending')
            ->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.application_approval', compact('menu', 'application_type', 'applications'));
    }

    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,หน้าแรก
    function application_detail($application_type, $application_id)
    {
        $menu = 'manage_application';
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
        $application = Application::findOrFail($application_id);

        if ($application->application_status == 'document_pending') {
            return view('admin.application_update_document_status_detail', compact('menu', 'application'));
        }
        return view('admin.application_approval_detail', compact('menu', 'application'));
    }

    //for approve application
    function approve_application($application_type, $application_id)
    {
        $menu = 'manage_application';
        $event = 'approve';

        DB::beginTransaction();

        try {

            $application = Application::findOrFail($application_id);
            if ($application->application_status === 'completed' || $application->application_status === 'reject') {
                return redirect()->back()->withErrors(['message' => 'สถานะคำร้องไม่ถูกต้อง']);
            }
            // .....เปลี่ยนสถานะคำร้องใน DB เป็น completed กรณีเป็นคำร้องขึ้นทะเบียนฝึกงาน......
            // .....เปลี่ยนสถานะคำร้องใน DB เป็น document_pending กรณีเป็นคำร้องอื่นๆ.......
            if ($application->application_type == 'Internship_Register') {
                $application->application_status = 'completed';
                $student = Student::where('student_id', $application->student_id)->first();
                $student->student_type = 'general';
                $student->save();
            } else {
                $application->application_status = 'document_pending';
                if ($application->application_type == 'Internship_Request') {
                    $applications = Application::where('student_id', $application->student_id)
                        ->where('application_id', '<>', $application->application_id)
                        ->where('application_type','Internship_Request')->get();
                    foreach ($applications as $other_application) {
                        $other_application->application_status = 'reject';
                        $other_application->save();
                    }
                }
            }
            $noti_subject = 'คำร้องได้รับการอนุมัติ';
            $noti_detail = 'เลขที่คำร้อง:' . $application->application_id;
            if ($application->application_type == 'Internship_Register') {
                $noti_detail = $noti_detail . ' ,การขึ้นทะเบียนฝึกงานได้รับการอนุมัติ';
            } elseif ($application->pplication_type == 'Internship_Request') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอความอนุเคราะห์ได้รับการอนุมัติและกำลังจัดทำเอกสาร';
            } elseif ($application->application_type == 'Recommendation') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารส่งตัวได้รับการอนุมัติและกำลังจัดทำเอกสาร';
            } elseif ($application->application_type == 'Appreciation') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอบคุณได้รับการอนุมัติและกำลังจัดทำเอกสาร';
            }
            // ..............บันทึกแจ้งเตือน................
            $notification = Notification::findOrFail($application->notification_id);
            $notification->subject = $noti_subject;
            $notification->details =  $noti_detail;
            $notification->datetime = Carbon::now()->format('Y-m-d H:i:s');

            $notification->save();
            $application->save();

            $notification->sendNotification();

            DB::commit();

            return view('admin.application_approval_response', compact('menu', 'event', 'application'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }

    //return all professor and professor in queue to view 
    function assign_professor($application_id)
    {
        $application = Application::findOrFail($application_id);
        $professors = Professor::get();
        $timeNow = Carbon::now();
        $queue_professor = Professor::where('status', 'active')
            ->OrderBy('last_assigned_at', 'asc')->first();

        $menu = 'manage_application';

        return view('admin.application_approval_assign_professor', compact('menu', 'application', 'professors', 'queue_professor'));
    }

    function approve_recommendation(Request $request, $application_id)
    {
        DB::beginTransaction();

        try {
            $professor = Professor::findOrFail($request->selected_professor);
            $application = Application::findOrFail($application_id);
            $internship_info = Internship_info::where('student_id',$application->student_id)->first();
            $internship_info->professor_id = $professor->professor_id;


            $professor->last_assigned_at = now();
            $application->application_status = 'document_pending';

            $internship_info->save();
            $professor->save();
            $application->save();

            $menu = 'manage_application';
            $event = 'approve';
            DB::commit();
            return view('admin.application_approval_response', compact('menu', 'event', 'application'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }

    // จัดการคำร้อง อนุมัติคำร้อง ,ไม่อนุมัติคำร้อง aka.ปฏิเสธ
    function reject_application($application_type, $application_id, Request $request)
    {
        $request->validate(
            [
                'response_detail' => 'required'
            ],
            [
                'response_detail.required' => 'กรุณาป้อนข้อความ'
            ]
        );

        $menu = 'manage_application';
        $event = 'reject';

        DB::beginTransaction();

        try {
            $application = Application::findOrFail($application_id);
            if ($application->application_status == 'completed' || $application->application_status == 'reject' || $application->application_status == 'document_pending') {
                return redirect()->back()->withErrors(['message' => 'สถานะคำร้องไม่ถูกต้อง']);
            }

            // .....เปลี่ยนสถานะคำร้องใน DB เป็น reject......
            $application->application_status = 'reject';

            $noti_subject = 'คำร้องได้รับการปฏิเสธ';
            $noti_detail = 'เลขที่คำร้อง:' . $application_id;   // . คือการ concat string
            if ($application->application_type == 'Internship_Register') {
                $noti_detail = $noti_detail . ',การขึ้นทะเบียนฝึกงานได้รับการปฏิเสธ';
            } elseif ($application->application_type == 'Internship_Request') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอความอนุเคราะห์ได้รับการปฏิเสธ';
            } elseif ($application->application_type == 'Recommendation') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารส่งตัวได้รับการปฏิเสธ';
            } elseif ($application->application_type == 'Appreciation') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอบคุณได้รับการปฏิเสธ';
            }
            $noti_detail = $noti_detail . ',เหตุผลการปฏิเสธคำร้อง ' . $request->response_detail;

            // ..............บันทึกแจ้งเตือน................
            $notification = Notification::findOrFail($application->notification_id);
            $notification->subject = $noti_subject;
            $notification->details =  $noti_detail;
            $notification->datetime = Carbon::now()->format('Y-m-d H:i:s');

            $notification->save();
            $application->save();
            $notification->sendNotification();

            DB::commit();

            return view('admin.application_approval_response', compact('menu', 'event'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }

    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,หน้าแรก แสดงรายการคำร้องทั้งหมดที่อยูในสถานะกำลังจัดทำ
    function application_update_document_status()
    {
        $menu = 'manage_application';
        $application_type = 'all';
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
        $applications = Application::where('application_status', 'document_pending')
            ->join('notifications', 'applications.notification_id', '=', 'notifications.notification_id')
            ->select('applications.*', 'notifications.datetime')
            ->orderBy('notifications.datetime', 'asc')->paginate(10);
        return view('admin.application_update_document_status', compact('menu', 'application_type', 'applications'));
    }

    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,แสดงรายการคำร้องตามประเภทคำร้อง
    function application_update_document_status_list($application_type)
    {
        $menu = 'manage_application';
        $applications = Application::where('application_type', $application_type)
            ->where('application_status', 'document_pending')
            ->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.application_update_document_status', compact('menu', 'application_type', 'applications'));
    }



    // จัดการคำร้อง อัพเดตสถานะการจัดทำเอกสาร ,อัพเดตสถานะการจัดทำเอกสาร aka.ทำเอกสารเสร็จแล้ว
    function application_update_document_status_complete($application_type, $application_id)
    {
        $menu = 'manage_application';

        DB::beginTransaction();

        try {
            // .....เปลี่ยนสถานะคำร้องใน DB เป็น completed......
            $application = Application::findOrFail($application_id);
            if ($application->application_status != 'document_pending') {
                return redirect()->back()->withErrors(['message' => 'สถานะคำร้องไม่ถูกต้อง']);
            }

            $application->application_status = 'completed';

            if ($application->application_type == 'Recommendation') {
                $student = Student::where('student_id', $application->student_id)->first();
                $student->student_type = 'internship';
                $student->save();
            }

            $noti_subject = 'จัดทำเอกสารเสร็จสิ้น';
            $noti_detail = 'เลขที่คำร้อง:' . $application_id;
            if ($application->application_type == 'Internship_Request') {
                $noti_detail = $noti_detail . ' ,เอกสารขอความอนุเคราะห์จัดทำเสร็จสิ้นแล้วสามารถรับได้ที่คณะวิทยาศาสตร์ ภาควิชาวิทยาการคอมพิวเตอร์';
            } elseif ($application->application_type == 'Recommendation') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารส่งตัวจัดทำเสร็จสิ้นแล้วสามารถรับได้ที่คณะวิทยาศาสตร์ ภาควิชาวิทยาการคอมพิวเตอร์';
            } elseif ($application->application_type == 'Appreciation') {
                $noti_detail = $noti_detail . ' ,คำร้องขอเอกสารขอบคุณจัดทำเสร็จสิ้นแล้วสามารถรับได้ที่คณะวิทยาศาสตร์ ภาควิชาวิทยาการคอมพิวเตอร์';
            }
            // ..............บันทึกแจ้งเตือน................
            $notification = Notification::findOrFail($application->notification_id);
            $notification->subject = $noti_subject;
            $notification->details =  $noti_detail;
            $notification->datetime = Carbon::now()->format('Y-m-d H:i:s');

            $notification->save();
            $application->save();
            $notification->sendNotification();

            DB::commit();

            return view('admin.application_update_document_status_response', compact('menu'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }

    // จัดการคำร้อง ประวัติคำร้อง ,หน้าแรก แสดงรายการคำร้องทั้งหมด
    function application_history()
    {
        $menu = 'manage_application';
        $application_type = 'all';
        // ข้อมูลตัวอย่าง application ทั้งหมดที่อยู่ในสถานะรอการอนุมัติ
        $applications = Application::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.application_history', compact('menu', 'application_type', 'applications'));
    }
    // จัดการคำร้อง ประวัติคำร้อง ,แสดงรายการคำร้องตามประเภทคำร้อง
    function application_history_list($application_type)
    {
        $menu = 'manage_application';
        $applications = Application::where('application_type', $application_type)
            ->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.application_history', compact('menu', 'application_type', 'applications'));
    }

    function application_history_detail($application_type, $application_id)
    {
        $menu = 'manage_application';
        // .......ดึงข้อมูลใน DB มาแทนที่ข้อมูลตัวอย่าง.......
        $application = Application::findOrFail($application_id);

        return view('admin.application_history_detail', compact('menu', 'application'));
    }
}
