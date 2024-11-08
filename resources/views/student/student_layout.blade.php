@extends('ui_layout.navbar_layout')
@section('navbar_header', 'สำหรับนักศึกษา')
@section('right_icon')
    <a class="nav-link mx-4 pt-1" href="#"><i class="bi bi-bell-fill"></i></a>
    <a class="nav-link" href="#"><i class="bi bi-person-fill" style="font-size: 110%"></i></a>
    <a class="nav-link text-white ms-3 p-1" href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
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
                        <a class="list-group-item p-3 my-1 @yield('manual')" href="{{ route('manual') }}"><i
                                class="bi bi-back ms-3 me-2"></i>คู่มือการใช้งานระบบ</a> {{-- @yield('manual') จะรับค่า "สี" มาจากไฟล์ที่เรียกใช้ layout(เลือกใช้สีจาก style ที่ตั้งไว้) manual หมายถึงเมนูคู่มือการใช้งานระบบ ให้ใส่สีเฉพาะเมนูที่กำลังทำงานอยู่ --}}
                        <a class="list-group-item p-3 my-1 @yield('process')" href="{{ route('process') }}"><i
                                class="bi bi-back ms-3 me-2"></i>process การฝึกงาน</a> {{-- process หมายถึงเมนูprocess การฝึกงาน --}}
                        <a class="list-group-item p-3 my-1 @yield('app_status')" href="{{ route('app_status') }}"><i
                                class="bi bi-back ms-3 me-2"></i>ตรวจสอบสถานะคำร้อง</a> {{-- status หมายถึงเมนูตรวจสอบสถานะคำร้อง --}}
                    </ul>
                </div>
            </div>
            @if ($menu == 'process')
                <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                    <div class="card-body mx-2">
                        <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                                class="bi bi-circle-fill float-end"></i></h6>
                        <ul class="list-group list-group-flush mt-4">
                            <a class="list-group-item p-3 my-1 mt-3 @yield('process_register_for_internship')"
                                href="{{ route('process_register_for_internship') }}"><i
                                    class="bi bi-dice-1 ms-3 me-2"></i>1.ลงทะเบียนขอฝึกงาน</a>
                            @if (Auth::user()->person->student->student_type == 'no_register')
                                <a class="list-group-item p-3 my-1 @yield('process_company') disabled"
                                    href="{{ route('process_company') }}"><i
                                        class="bi bi-dice-2 ms-3 me-2"></i>2.สถานที่ฝึกงาน</a>
                                <a class="list-group-item p-3 my-1 @yield('professor_info') disabled"
                                    href="{{ route('professor_info') }}"><i
                                        class="bi bi-dice-3 ms-3 me-2"></i>3.พบอาจารย์ที่ปรึกษา
                                </a> {{-- process_3 หมายถึงเมนูพบอาจารย์ที่ปรึกษา --}}
                                <a class="list-group-item p-3 my-1 @yield('report') disabled"
                                    href="{{ route('report') }}/no_report"><i
                                        class="bi bi-dice-4 ms-3 me-2"></i>4.รายงานผลการฝึกงาน
                                </a> {{-- process_4 หมายถึงเมนูรายงานผลการฝึกงาน --}}
                            @elseif (Auth::user()->person->student->student_type == 'general')
                                <a class="list-group-item p-3 my-1 @yield('process_company')"
                                    href="{{ route('process_company') }}"><i
                                        class="bi bi-dice-2 ms-3 me-2"></i>2.สถานที่ฝึกงาน</a>
                                <a class="list-group-item p-3 my-1 @yield('professor_info') disabled"
                                    href="{{ route('professor_info') }}"><i
                                        class="bi bi-dice-3 ms-3 me-2"></i>3.พบอาจารย์ที่ปรึกษา
                                </a> {{-- process_3 หมายถึงเมนูพบอาจารย์ที่ปรึกษา --}}
                                <a class="list-group-item p-3 my-1 @yield('report') disabled"
                                    href="{{ route('report') }}/no_report"><i
                                        class="bi bi-dice-4 ms-3 me-2"></i>4.รายงานผลการฝึกงาน
                                </a> {{-- process_4 หมายถึงเมนูรายงานผลการฝึกงาน --}}
                            @else
                                <a class="list-group-item p-3 my-1 @yield('process_company')"
                                    href="{{ route('process_company') }}"><i
                                        class="bi bi-dice-2 ms-3 me-2"></i>2.สถานที่ฝึกงาน</a>
                                <a class="list-group-item p-3 my-1 @yield('professor_info')"
                                    href="{{ route('professor_info') }}"><i
                                        class="bi bi-dice-3 ms-3 me-2"></i>3.พบอาจารย์ที่ปรึกษา
                                </a> {{-- process_3 หมายถึงเมนูพบอาจารย์ที่ปรึกษา --}}
                                <a class="list-group-item p-3 my-1 @yield('report')" href="{{ route('report') }}"><i
                                        class="bi bi-dice-4 ms-3 me-2"></i>4.รายงานผลการฝึกงาน
                                </a> {{-- process_4 หมายถึงเมนูรายงานผลการฝึกงาน --}}
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-9">
            <div class="card body_color" style="border-radius: 0px 20px 0px 20px">
                <div class="card-body" style="margin: 3% 7%">
                    <div>
                        <h4 class="text-center">@yield('body_header')</h4> {{-- @yield('body_header') จะรับค่า "หัวข้อ" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                    <div class="my-4">
                        @yield('body_content') {{-- @yield('body_content') จะรับค่า "content" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                </div>
            </div>
            <div class="card border-0" style="background-color: transparent">
                <div class="card-body" style="margin: 3% 3%">
                    <div>
                        <h5>@yield('out_body_header')</h5> {{-- @yield('body_header') จะรับค่า "หัวข้อ" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                    <div class=" mx-3">
                        @yield('out_body_content') {{-- @yield('body_content') จะรับค่า "content" มาจากไฟล์ที่เรียกใช้ layout --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
