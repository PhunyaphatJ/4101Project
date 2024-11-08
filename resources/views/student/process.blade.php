{{-- path หน้าเว็บเป็น /student/process/{student_process_status} --}}
@extends('student.student_layout')
@section('title', 'process')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
{{-- @section('body_header', 'ข้อมูลนักศึกษา') --}}
@section('style')
    <style>
        #bookmark_icon {
            position: absolute;
            top: 0%;
            right: 0%;
            font-size: 300%;
            translate: 0% -10%;
        }

        #bookmark_text {
            color: #000000;
            translate: 120% -130%;
        }
    </style>
@endsection
@section('body_content')
    <section> {{-- แสดงข้อมูลนักศึกษา --}}
        @foreach ($students as $student)
            <div class="modal modal-sheet position-static d-block" tabindex="-1" role="dialog" id="modalTour"
                style="color: #ffffff">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-0 shadow" style="background-color: rgba(0,0,0,0.7)">
                        <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
                        <div class="modal-body p-5">
                            <p class="float-end " id="bookmark_text">{{ $student['department'] }}</p>
                            <h4 class="mb-0"><i class="bi bi-folder-fill me-2"></i>ข้อมูลนักศึกษา</h4>

                            <ul class="d-grid gap-2 my-4 justify-content-center list-unstyled small">
                                <li class="d-flex gap-5">
                                    <i class="bi bi-person-vcard-fill" style="font-size: 48px"></i>
                                    <div class="mt-3">
                                        <h6 class="mb-0" style="font-size: 18px">รหัสนักศึกษา</h6>
                                        <p class="mb-0" style="font-size: 15px">{{ $student['student_id'] }}</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-5">
                                    <i class="bi bi-person-bounding-box" style="font-size: 48px"></i>
                                    <div class="mt-3">
                                        <h6 class="mb-0" style="font-size: 18px">ชื่อ</h6>
                                        <p class="mb-0" style="font-size: 15px">{{ $student['prefix'] }} {{ $student['fname'] }} {{ $student['lname'] }}</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-5">
                                    <i class="bi bi-telephone-fill" style="font-size: 48px"></i>
                                    <div class="mt-3">
                                        <h6 class="mb-0" style="font-size: 18px">โทรศัพท์</h6>
                                        <p class="mb-0" style="font-size: 15px">{{ $student['phone'] }}</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-5">
                                    <i class="bi bi-envelope-open-fill" style="font-size: 48px"></i>
                                    <div class="mt-3">
                                        <h6 class="mb-0" style="font-size: 18px">email</h6>
                                        <p class="mb-0" style="font-size: 15px">{{ $student['email'] }}</p>
                                    </div>
                                </li>
                            </ul>
                            @if ($student_process_status == 'กำลังดำเนินการ')
                                <a href="/student/process/process_register_for_internship/{{ $student_process_status }}"><button
                                        type="button" class="btn btn-lg submit_color mt-4 w-100 p-3  rounded-5"
                                        data-bs-dismiss="modal" style="font-size: 18px">ลงทะเบียนขอฝึกงาน</button></a>
                            @else
                                @if (
                                    $student_process_status == 'register_pending' ||
                                        $student_process_status == 'register_completed' ||
                                        $student_process_status == 'company_pending' ||
                                        $student_process_status == 'internship')
                                    <a
                                        href="/student/process/process_register_for_internship/{{ $student_process_status }}"><button
                                            type="button"
                                            class="btn btn-lg submit_color mt-4 w-100 p-3  rounded-5 disabled"
                                            data-bs-dismiss="modal" style="font-size: 18px">ลงทะเบียนขอฝึกงาน</button></a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
