{{-- path หน้าเว็บเป็น /student/menu(manual หมายถึงเมนูคู่มือการใช้งานระบบ,  process หมายถึงเมนูprocess การฝึกงาน, status หมายถึงเมนูตรวจสอบสถานะคำร้อง) --}}
@extends('ui_layout.navbar_layout')
@section('layout_style')
    <style>
        #sidebar {
            position: sticky;
            top: 37%;
        }
    </style>
@endsection
@section('sidebar')
    <div class="row mt-3">
        <div class="col-3">
            <div class="card sidebar_color sticky-top" style="border-radius: 20px">
                <div class="card-body mx-2">
                    <h6 class="card-title"><i class="bi bi-menu-button-fill me-2"></i>เมนู</h6>
                    <ul class="list-group list-group-flush">
                        <a class="list-group-item p-3 my-1 @yield('student_manual')" href="student_manual"><i
                                class="bi bi-back ms-3 me-2"></i>คู่มือการใช้งานระบบ</a> {{-- @yield('manual') จะรับค่า "สี" มาจากไฟล์ที่เรียกใช้ layout(เลือกใช้สีจาก style ที่ตั้งไว้) manual หมายถึงเมนูคู่มือการใช้งานระบบ ให้ใส่สีเฉพาะเมนูที่กำลังทำงานอยู่ --}}
                        <a class="list-group-item p-3 my-1 @yield('student_process')" href="student_process"><i
                                class="bi bi-back ms-3 me-2"></i>process การฝึกงาน</a> {{-- process หมายถึงเมนูprocess การฝึกงาน --}}
                        <a class="list-group-item p-3 my-1 @yield('student_app_status')" href="student_app_status"><i
                                class="bi bi-back ms-3 me-2"></i>ตรวจสอบสถานะคำร้อง</a> {{-- status หมายถึงเมนูตรวจสอบสถานะคำร้อง --}}
                    </ul>
                </div>
            </div>
            @if ($menu == 'student_process')
                <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                    <div class="card-body mx-2">
                        <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                                class="bi bi-circle-fill float-end"></i></h6>
                        <ul class="list-group list-group-flush mt-4">
                            <a class="list-group-item p-3 my-1 mt-3 @yield('student_process_register_for_internship')"
                                href="student_process_register_for_internship"><i
                                    class="bi bi-dice-1 ms-3 me-2"></i>1.ลงทะเบียนขอฝึกงาน</a>
                            @if ($student_process_status == 'register_pending' || $student_process_status == 'no_register')
                                <a class="list-group-item p-3 my-1 @yield('student_process_company') disabled"
                                    href="student_process_company"><i class="bi bi-dice-2 ms-3 me-2"></i>2.สถานที่ฝึกงาน</a>
                                <a class="list-group-item p-3 my-1 @yield('student_professor') disabled" href="student_professor"><i
                                        class="bi bi-dice-3 ms-3 me-2"></i>3.พบอาจารย์ที่ปรึกษา
                                </a> {{-- process_3 หมายถึงเมนูพบอาจารย์ที่ปรึกษา --}}
                                <a class="list-group-item p-3 my-1 @yield('student_report') disabled" href="student_report"><i
                                        class="bi bi-dice-4 ms-3 me-2"></i>4.รายงานผลการฝึกงาน
                                </a> {{-- process_4 หมายถึงเมนูรายงานผลการฝึกงาน --}}
                            @else
                                @if ($student_process_status == 'register_completed' || $student_process_status == 'company_pending')
                                    <a class="list-group-item p-3 my-1 @yield('student_process_company')" href="student_process_company"><i
                                            class="bi bi-dice-2 ms-3 me-2"></i>2.สถานที่ฝึกงาน</a>
                                    <a class="list-group-item p-3 my-1 @yield('student_professor') disabled" href="student_professor"><i
                                            class="bi bi-dice-3 ms-3 me-2"></i>3.พบอาจารย์ที่ปรึกษา
                                    </a> {{-- process_3 หมายถึงเมนูพบอาจารย์ที่ปรึกษา --}}
                                    <a class="list-group-item p-3 my-1 @yield('student_report') disabled" href="student_report"><i
                                            class="bi bi-dice-4 ms-3 me-2"></i>4.รายงานผลการฝึกงาน
                                    </a> {{-- process_4 หมายถึงเมนูรายงานผลการฝึกงาน --}}
                                @else @if ($student_process_status == 'internship')
                                    <a class="list-group-item p-3 my-1 @yield('student_process_company')" href="student_process_company"><i
                                            class="bi bi-dice-2 ms-3 me-2"></i>2.สถานที่ฝึกงาน</a>
                                    <a class="list-group-item p-3 my-1 @yield('student_professor')" href="student_professor"><i
                                            class="bi bi-dice-3 ms-3 me-2"></i>3.พบอาจารย์ที่ปรึกษา
                                    </a> {{-- process_3 หมายถึงเมนูพบอาจารย์ที่ปรึกษา --}}
                                    <a class="list-group-item p-3 my-1 @yield('student_report')" href="student_report"><i
                                            class="bi bi-dice-4 ms-3 me-2"></i>4.รายงานผลการฝึกงาน
                                    </a> {{-- process_4 หมายถึงเมนูรายงานผลการฝึกงาน --}}
                                    @endif
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-9">
            <div class="card body_color" style="border-radius: 0px 20px 0px 20px">
                <div class="card-body" style="margin: 4% 7%">
                    <div>
                        <h4 class="text-center">@yield('body_header')</h4> {{-- @yield('body_header') จะรับค่า "หัวข้อ" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                    <div class="my-4">
                        @yield('body_content') {{-- @yield('body_content') จะรับค่า "content" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                </div>
            </div>
            <div class="card border-0" style="background-color: transparent">
                <div class="card-body" style="margin: 4% 3%">
                    <div>
                        <h5>@yield('out_body_header')</h5> {{-- @yield('body_header') จะรับค่า "หัวข้อ" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                    <div class="my-4 mx-3">
                        @yield('out_body_content') {{-- @yield('body_content') จะรับค่า "content" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
