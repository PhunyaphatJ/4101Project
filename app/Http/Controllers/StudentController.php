<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evidence;
use App\Models\Application;
use App\Models\Notification;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use App\Models\Address;
use App\Models\Internship_detail;
use App\Models\Internship_info;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CompanyCreateRequest;
use App\Models\Mentor;
use Illuminate\Support\Facades\Cache;

class StudentController extends Controller
{
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
        return view('student.register', compact('menu', 'provinces', 'amphoes', 'tambons'));
    }

    // function compare_register(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'prefix' => 'required|string|max:10',
    //         'department' => 'required|string|max:255',
    //         'student_id' => 'required|numeric|unique:students,student_id',
    //         'fname' => 'required|string|regex:/^[a-zA-Zก-ฮぁ-ゞー]+$/u', 
    //         'lname' => 'required|string|regex:/^[a-zA-Zก-ฮぁ-ゞー]+$/u', 
    //         'phone' => 'required|regex:/^[0-9]{10}$/', 
    //         'house_no' => 'required|string|max:255',
    //         'village_no' => 'required|string|max:255',
    //         'road' => 'required|string|max:255',
    //         'province' => 'required|string|max:255',
    //         'district' => 'required|string|max:255',
    //         'sub_district' => 'required|string|max:255',
    //         'postcode' => 'required|numeric|digits:5',
    //         'email' => 'required|email|unique:students,email',
    //         'password' => 'required|min:8',
    //         'confirm_password' => 'required|same:password', 
    //     ]);
    //     $register = [
    //         'prefix' => $validatedData['prefix'],
    //         'department' => $validatedData['department'],
    //         'student_id' => $validatedData['student_id'],
    //         'fname' => $validatedData['fname'],
    //         'lname' => $validatedData['lname'],
    //         'phone' => $validatedData['phone'],
    //         'house_no' => $validatedData['house_no'],
    //         'village_no' => $validatedData['village_no'],
    //         'road' => $validatedData['road'],
    //         'province' => $validatedData['province'],
    //         'district' => $validatedData['district'],
    //         'sub_district' => $validatedData['sub_district'],
    //         'postcode' => $validatedData['postcode'],
    //         'email' => $validatedData['email'],
    //         'password' => bcrypt($validatedData['password']),
    //         'confirm_password' => bcrypt($validatedData['confirm_password']),
    //     ];
    //     if ($register['password'] == $register['confirm_password']) {
    //         $menu = 'manual';
    //         $student_process_status = 'no_register';
    //         return view('student.manual', compact('menu', 'student_process_status'));
    //     }
    // }

    function manual()
    {
        $menu = 'manual';
        return view('student.manual', compact('menu'));
    }

    function process()
    {

        $menu = 'process';
        $student_process_status = Auth::user()->person->student->student_type;

        $student = Auth::user()->person->student;
        return view('student.process', compact('menu', 'student_process_status', 'student'));
    }

    function register_internship_form()
    {
        $menu = 'process';
        $application = Application::where('application_type', 'Internship_Register')
            ->where('student_id', Auth::user()->person->student->student_id)->first();

        return view('student.process_register_for_internship', compact('menu', 'application'));
    }

    function register_internship(Request $request)
    {
        if (Auth::user()->person->student->student_type != 'no_register') {
            return redirect()->back()->withErrors('user type invalid');
        }

        $request->validate([
            'transcript' => 'required|file|mimes:pdf',
            'student_card' => 'required|file|mimes:pdf',
            'recentreceipt' => 'required|file|mimes:pdf',
        ]);

        $student_id = Auth::user()->person->student->student_id;

        $fileNames = [
            'transcript' => "transcript.$student_id.pdf",
            'student_card' => "student_card.$student_id.pdf",
            'recentreceipt' => "recentreceipt.$student_id.pdf",
        ];

        $paths = [
            'transcript' => $request->file('transcript')->storeAs('internship_files/transcript', $fileNames['transcript'], 'public'),
            'student_card' => $request->file('student_card')->storeAs('internship_files/student_card', $fileNames['student_card'], 'public'),
            'recentreceipt' => $request->file('recentreceipt')->storeAs('internship_files/recentreceipt', $fileNames['recentreceipt'], 'public'),
        ];

        $evidence = Evidence::where('student_id', $student_id)->first();

        DB::beginTransaction();

        try {
            if ($evidence) {
                $evidence->update([
                    'transcript_path' => $paths['transcript'],
                    'idcard_path' => $paths['student_card'],
                    'recentreceipt_path' => $paths['recentreceipt'],
                ]);
                $message = 'อัปเดตเอกสารสำเร็จ';
            } else {

                Evidence::create([
                    'student_id' => $student_id,
                    'credit' => 100,
                    'transcript_path' => $paths['transcript'],
                    'idcard_path' => $paths['student_card'],
                    'recentreceipt_path' => $paths['recentreceipt'],
                ]);

                $notification = Notification::create([
                    'sender_email' => Auth::user()->email,
                    'receiver_email' => Admin::first()->email,
                    'subject' => 'ลงทะเบียนของฝึกงาน ' . $student_id,
                    'details' => $student_id . ' ' . Auth::user()->person->name . ' ' . Auth::user()->person->surname,
                ]);

                Application::create([
                    'student_id' => $student_id,
                    'applicant_email' => Auth::user()->email,
                    'applicant_type' => 'Internship_Register',
                    'notification_id' => $notification->notification_id,
                ]);

                $notification->sendNotification();
                $message = 'ลงทะเบียนฝึกงานสำเร็จ';
            }
            DB::commit();
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }

    function process_company()
    {
        $menu = 'process';
        if (Auth::user()->person->student->student_id) {
            $internship_info = Internship_info::where('student_id', Auth::user()->person->student->student_id)->first();
            return view('student.process_company', compact('menu', 'internship_info'));
        }

        return view('student.process_company', compact('menu'));
    }

    function recommendation()
    {
        $menu = 'process';
        return view('student.process_company_rec', compact('menu'));
    }
    function company_recommendation_request()

    {
        $application = Application::where('application_type', 'Recommendation')
            ->where('student_id', Auth::user()->person->student->student_id)->first();

        if ($application) {
            return redirect()->back()->withErrors('มีหนังสือส่งตัวอยู่ในระบบแล้ว');
        }

        $application = $applications  = Application::where('student_id', Auth::user()->person->student->student_id)
            ->where('application_type', 'Internship_Request')->get();
        if ($application->isEmpty()) {
            return redirect()->back()->withErrors('ต้องขอหนังสือขอความอนุเคราะห์ก่อน');
        }

        $menu = 'process';
        //ตัวอย่างข้อมูล company ที่ได้ทำการขอเอกสารขอความอนุเคราะห์
        $applications  = Application::where('student_id', Auth::user()->person->student->student_id)
            ->where('application_type', 'Internship_Request')
            ->where('application_status', 'completed')->get();

        return view('student.process_company_rec_with_request', compact('menu', 'applications'));
    }


    function search_company(Request $request, $type)
    {
        $application = Application::where('application_type', 'Recommendation')
            ->where('student_id', Auth::user()->person->student->student_id)->first();
        if ($application) {
            return redirect()->back()->withErrors('มีหนังสือส่งตัวอยู่ในระบบแล้ว');
        }
        $menu = 'process';
        //ตัวอย่างข้อมูล company address ที่มีอยู่ในระบบ
        $path = public_path('raw_database.json');
        $data = json_decode(file_get_contents($path), false);
        $provinces = array_map(function ($item) {
            return $item->province;
        }, $data);
        $provinces = array_unique($provinces);
        $provinces = array_values($provinces);

        $amphoes = [];
        $tambons = [];

        $query = Company::query()
            ->join('addresses', 'companies.address_id', '=', 'addresses.address_id');
        if ($request->filled('province')) {
            $query->where('province', $request->province);
        }

        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }

        if ($request->filled('sub_district')) {
            $query->where('sub_district', $request->sub_district);
        }

        if ($request->filled('company_name')) {
            $query->where('company_name', 'LIKE',  $request->company_name . '%');
        }

        $companies = $query->paginate(5);

        return view('student.process_company_search_address', compact('menu', 'companies', 'type', 'amphoes', 'tambons', 'provinces'));
    }

    function add_company_form($type)
    {
        $menu = 'process';
        $path = public_path('raw_database.json');
        $data = json_decode(file_get_contents($path), false);
        $provinces = array_map(function ($item) {
            return $item->province;
        }, $data);
        $provinces = array_unique($provinces);
        $provinces = array_values($provinces);

        $amphoes = [];
        $tambons = [];
        return view('student.add_company', compact('menu', 'type', 'amphoes', 'tambons', 'provinces'));
    }

    function add_company(CompanyCreateRequest  $request, $type)
    {
        Cache::forget('company');
        Cache::forget('address');
        $menu = 'process';
        $address = [
            'house_no' => $request->house_no,
            'village_no' => $request->village_no,
            'road' => $request->road,
            'sub_district' => $request->sub_district,
            'district' => $request->district,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
        ];

        $company = [
            'company_id' => 0,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'address' => $address['house_no'] . ' ' . $address['village_no'] . ' ' . $address['road'] . ' ' . $address['sub_district'] . ' ' . $address['district'] . ' ' . $address['province'] . ' ' . $address['postal_code'],
        ];

        Cache::put('company_' . Auth::user()->person->student->student_id, $company, now()->addMinutes(30));
        Cache::put('address_' . Auth::user()->person->student->student_id, $address, now()->addMinutes(30));

        $mentors = null;
        $application_id = null;

        return view('student.process_company_select', compact('company', 'address', 'type', 'menu', 'mentors', 'application_id'));
    }

    function select_company(Request $request, $type, $company_id, $application_id = null)
    {
        $menu = 'process';

        $mentors = Cache::get('mentors_' . $company_id . Auth::user()->person->student->student_id);

        if ($company_id == 0) {
            $company = Cache::get('company_' . Auth::user()->person->student->student_id);
            if (!$company) {
                return redirect(route('process_company'))->withErrors('เกิดข้อผิดพลาดขึ้นกรุณาทำรายการใหม่');
            }
            $address = Cache::get('address_' . Auth::user()->person->student->student_id);
            if (!$mentors) {
                $mentors = [];
            }
            return view('student.process_company_select', compact('menu', 'type', 'company', 'mentors', 'address', 'application_id'));
        }

        $company = Company::findOrFail($company_id);
        if (!$mentors) {
            $mentors = Mentor::where('company_id', $company->company_id)->get();
            Cache::put('mentors_' . $company_id . Auth::user()->person->student->student_id, $mentors, now()->addMinutes(30));
        }
        return view('student.process_company_select', compact('menu', 'type', 'company', 'mentors', 'application_id'));
    }

    function request_document(Request $request, $type, $application_id = null)
    {
        if (!($type == 'recommendation' || $type == 'request')) {
            return redirect()->back()->withErrors('ประเภทเอกสารไม่ถูกต้อง');
        }
        // $request->validate([
        //     'semester' => 'required|string',
        //     'years' => 'required|digits:4',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        //     'attend_to' => 'required|string',
        //     'company_id' => 'required|integer',
        // ]);

        if (Auth::user()->person->student->student_type != 'general') {
            return redirect()->back()->withErrors('ประเภทของนักศึกษาไม่ถูกต้อง');
        }

        if ($request->company_id == 0) {
            $company = Cache::get('company_' . Auth::user()->person->student->student_id);
            $address = Cache::get('address_' . Auth::user()->person->student->student_id);
            if (!$company) {
                return redirect(route('process_company'))->withErrors('เกิดข้อผิดพลาดขึ้นกรุณาทำรายการใหม่');
            }
            $address = Address::create([
                'house_no' => $address['house_no'],
                'village_no' => $address['village_no'],
                'road' => $address['road'],
                'sub_district' => $address['sub_district'],
                'district' => $address['district'],
                'province' => $address['province'],
                'postal_code' => $address['postal_code'],
            ]);
            $company = Company::create([
                'company_name' => $company['company_name'],
                'phone' => $company['phone'],
                'fax' => $company['fax'],
                'address_id' => $address['address_id'],
            ]);
        } else {
            $company = Company::findOrFail($request->company_id);
        }

        $student_id = Auth::user()->person->student->student_id;

        if ($type == 'recommendation') {
            $internship_info = Internship_info::where('student_id', $student_id)->first();
            if ($internship_info) { 
                return redirect()->back()->withErrors('คุณมีข้อมูลอยู่ในระบบแล้ว');
            }
        } else {
            $internship_detail = Internship_detail::where('company_id', $company->company_id)
                ->where('student_id', $student_id)
                ->first();
                if ($internship_detail) { 
                    return redirect()->back()->withErrors('คุณมีข้อมูลอยู่ในระบบแล้ว');
                }
        }

        $menu = 'process';

        $application = Application::where('student_id', Auth::user()->person->student->student_id)
            ->where('application_type', 'Recommendation')->get();

        if (!$application->isEmpty()) {
            return redirect()->back()->withErrors('ไม่สามารถขอเอกสารส่งตัวได้เพราะว่ามีเอกสารอยู่แล้ว');
        }

        DB::beginTransaction();
        try {
           

            if ($request->company_id == 0) {
                $company_id = $request->company_id;
            } else {
                $company_id = $company->company_id;
            }

            if ($type == 'recommendation') {
                $mentor = Mentor::where('email', $request->mentor_selection)->first();
                if (!$mentor) {
                    $mentors = Cache::get('mentors_' . $company_id . Auth::user()->person->student->student_id);
                    $mentor = collect($mentors)->firstWhere('email', $request->mentor_selection);
                    // dd($mentor);
                    if (is_array($mentor)) {
                        $mentor = Mentor::create([
                            'email' => $mentor['email'],
                            'name' => $mentor['name'],
                            'surname' => $mentor['surname'],
                            'position' => $mentor['position'],
                            'phone' => $mentor['phone'],
                            'fax' => $mentor['fax'],
                            'company_id' => $company->company_id,
                        ]);
                    }
                }
                if (!$mentor) {
                    return redirect(route('process_company'))->withErrors('เกิดข้อผิดพลาดขึ้นกรุณาทำรายการใหม่');
                }

                $notification = Notification::create([
                    'sender_email' => Auth::user()->email,
                    'receiver_email' => Admin::first()->email,
                    'subject' => 'ขอเอกสารส่งตัว : ' . $student_id,
                    'details' => $student_id . ' ' . Auth::user()->person->name . ' ' . Auth::user()->person->surname,

                ]);

                if ($application_id == null) {
                    $internship_detail = Internship_detail::create([
                        'student_id' => $student_id,
                        'company_id' => $company->company_id,
                        'register_semester' => $request->semester,
                        'year' => $request->years,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'attend_to' => $request->attend_to,
                    ]);
                    // dd($internship_detail);
                    // $internship_detail_id = $internship_detail['internship_detail_id'];
                } else {
                    $internship_detail = Application::findOrFail($application_id)->internship_detail;
                    // $internship_detail_id = $application->internship_detail->internship_detail_id;
                }

                $internship_info = Internship_info::create([
                    'student_id' => $student_id,
                    'mentor_email' => $mentor->email,
                    'internship_detail_id' => $internship_detail->internship_detail_id,
                ]);

                // dd($internship_info);
                $app = Application::create([
                    'student_id' => $student_id,
                    'applicant_email' => Auth::user()->email,
                    'application_type' => 'Recommendation',
                    'application_status' => 'approval_pending',
                    'notification_id' => $notification->notification_id,
                    'internship_detail_id' => $internship_detail->internship_detail_id,
                ]);

                $message = 'ขอหนังสือส่งตัว';
            } elseif ($type == 'request') {
                $notification = Notification::create([
                    'sender_email' => Auth::user()->email,
                    'receiver_email' => Admin::first()->email,
                    'subject' => 'ขอหนังสือขอความอนุเคราะห์ : ' . $student_id,
                    'details' => $student_id . ' ' . Auth::user()->person->name . ' ' . Auth::user()->person->surname,
                ]);

                $internship_detail = Internship_detail::create([
                    'student_id' => $student_id,
                    'company_id' => $company->company_id,
                    'register_semester' => $request->semester,
                    'year' => $request->years,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'attend_to' => $request->attend_to,
                ]);

                $app = Application::create([
                    'student_id' => $student_id,
                    'applicant_email' => Auth::user()->email,
                    'application_type' => 'Internship_Request',
                    'application_status' => 'approval_pending',
                    'notification_id' => $notification->notification_id,
                    'internship_detail_id' => $internship_detail->internship_detail_id,
                ]);
                $message = 'ขอหนังสือขอความอนุเคราะห์';
            }

            // dd('ok');
            DB::commit();
            Cache::flush();
            $notification->sendNotification();
            return view('student.response', compact('menu', 'message'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    function add_mentor_form(Request $request, $type, $company_id, $application_id = null)
    {
        $menu = 'process';
        return view('student.add_mentor', compact('menu', 'type', 'company_id', 'application_id'));
    }

    function add_mentor(Request $request, $type, $company_id, $application_id = null)
    {
        $menu = 'process';
        $checkEmail = User::where('email', $request->input('email'))->first();
        $checkEmailMentor = Mentor::where('email', $request->input('email'))->first();
        if ($checkEmail || $checkEmailMentor) {
            return redirect()->back()->withErrors('Email ซ้ำกับ user ในระบบ');
        }
        $newMentor = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'position' => $request->input('position'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax'),
        ];

        Cache::forget('mentors_' . $company_id . Auth::user()->person->student->student_id);
        if ($company_id == 0) {
            // $mentors[] = $newMentor;
            $mentors = [$newMentor];
            Cache::put('mentors_' . $company_id . Auth::user()->person->student->student_id, $mentors, now()->addMinutes(30));
            return redirect(route('select_company', [$type, $company_id]));
        }

        $mentors = Mentor::where('company_id', $company_id)->get();
        $mentors->push($newMentor);
        Cache::put('mentors_' . $company_id . Auth::user()->person->student->student_id, $mentors, now()->addMinutes(30));

        return redirect(route('select_company', [$type, $company_id, $application_id]));
    }

    function professor_info()
    {
        if (Auth::user()->person->student->student_type != 'internship') {
            return redirect()->back()->withErrors('สถานะไม่ถูกต้อง');
        }
        $menu = 'process';
        $professor = Internship_info::where('student_id', Auth::user()->person->student->student_id)->first()->professor;
        return view('student.professor_info', compact('menu', 'professor'));
    }

    function report()
    {
        if (Auth::user()->person->student->student_type != 'internship') {
            return redirect()->back()->withErrors('สถานะไม่ถูกต้อง');
        }
        $menu = 'process';
        $report = Internship_info::where('student_id', Auth::user()->person->student->student_id)->first()->report_file_path;

        return view('student.report', compact('menu', 'report'));
    }

    function add_report(Request $request)
    {
        $request->validate([
            'report_file' => 'required|file|mimes:pdf',
        ]);

        $student_id = Auth::user()->person->student->student_id;

        $fileName = "report.$student_id.pdf";

        $path = $request->file('report_file')->storeAs('internship_files/reports', $fileName, 'public');

        $internship_info = Internship_info::where('student_id', Auth::user()->person->student->student_id)->first();
        $internship_info->report_file_path = $path;
        $internship_info->save();

        $report = $internship_info->report_file_path;
        $menu = 'process';

        return view('student.report', compact('menu', 'report'));
    }


    function app_status()
    {
        $menu = 'app_status';
        //ตัวอย่างข้อมูล application
        $applications = Application::where('student_id', Auth::user()->person->student->student_id)->get();

        return view('student.app_status', compact('menu', 'applications'));
    }
}
