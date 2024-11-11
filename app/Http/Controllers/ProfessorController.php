<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Internship_info;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    function layout_test(){
        $menu = '';
        return view('professor.professor_layout', compact('menu'));
    }
    function index(){
        $menu = '';
        $students = Internship_info::where('professor_id',Auth::user()->person->professor->professor_id)->paginate(5);
        return view('professor.intern_supervision_and_information', compact('menu','students'));
    }
    function intern_information($internship_id){
        $menu = '';
        $internship = Internship_info::where('internship_id',$internship_id)->first();

        if(!$internship){
            return redirect()->back()->withErrors('ไม่พบข้อมูล');
        }
        return view('professor.intern_information', compact('menu','internship','internship_id'));
    }

    function request_appreciation($internship_id){
        $internship = Internship_info::where('internship_id',$internship_id)->first();
        if(!$internship){
            return redirect()->back()->withErrors('ไม่พบข้อมูล');
        }

        $application = Application::where('application_type','Appreciation')
        ->where('student_id',$internship->student_id);
        // dd($application);
        if ($application->exists()) {  // This checks if no records exist
            return redirect()->back()->withErrors('มีเอกสารอยู่ในระบบแล้ว');
        }

        DB::beginTransaction();

        try{
            $notification = Notification::create([
                'sender_email' => Auth::user()->email,
                'receiver_email' => Admin::first()->email,
                'subject' => 'ขอเอกสารขอบคุณ : ' . $internship->student_id,
                'details' => $internship->student_id  ,
            ]); 

            $app = Application::create([
                'student_id' => $internship->student_id,
                'applicant_email' => Auth::user()->email,
                'application_type' => 'Appreciation',
                'application_status' => 'approval_pending',
                'notification_id' => $notification->notification_id,
                'internship_detail_id' => $internship->internship_detail_id,
            ]);

            DB::commit();
            $notification->sendNotification();
            $menu = '';
            return view('professor.response_appreciation_application',compact('menu'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }

    }

    function assign_grade(Request $request,$internship_id){
        $internship = Internship_info::where('internship_id',$internship_id)->first();
        if(!$internship){
            return redirect()->back()->withErrors('ไม่พบข้อมูล');
        }

        $application = Application::where('student_id',$internship->student_id)
        ->where('application_type','Appreciation')
        ->where('application_status','completed');

        if(!$application->exists()){
            return redirect()->back()->withErrors('สถานะหนังสือขอบคุณต้องเป็น complete');
        }
        DB::beginTransaction();

        try{
            $internship->grade = $request->select_grade;
            $student = Student::where('student_id',$internship->student_id)->first();
            $student->student_type = 'former';

            $internship->save();
            $student->save();

            DB::commit();
            return redirect()->back()->with('success', 'บันทึกเกรดเสร็จสิ้น');
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }
    function former_intern_information_test(){
        $menu = '';
        return view('professor.former_intern_information', compact('menu'));
    }
    function response_test(){
        $menu = '';
        return view('professor.response_appreciation_application', compact('menu'));
    }
}
