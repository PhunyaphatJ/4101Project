@extends('ui_layout.navbar_layout')
@section('layout_style')
    <style>
        #sidebar{
            position: sticky;
            top: 58%;
        }
    </style>
@endsection
@section('sidebar')
<div class="row mt-3">
    <div class="col-lg-3">
        <div class="card sidebar_color sticky-top" style="border-radius: 20px">
            <div class="card-body mx-2">
                <h6 class="card-title"><i class="bi bi-menu-button-fill me-2"></i>เมนู</h6>
                <ul class="list-group list-group-flush">
                    <a class="list-group-item p-3 my-1 @yield('sidebar_manage_application_color')" href="{{route('application_approval')}}"><i
                            class="bi bi-back ms-3 me-2"></i>จัดการคำร้อง</a>
                    <a class="list-group-item p-3 my-1 @yield('sidebar_manage_document_color')" href="{{route('manage_document')}}"><i
                            class="bi bi-back ms-3 me-2"></i>จัดการเอกสาร</a>
                    <a class="list-group-item p-3 my-1 @yield('sidebar_manage_user_color')" href="{{route('manage_user_professor')}}"><i
                            class="bi bi-back ms-3 me-2"></i>จัดการข้อมูลผู้ใช้งาน</a>
                    <a class="list-group-item p-3 my-1 @yield('sidebar_statistics_color')" href="{{route('statistics_yearly')}}i
                            class="bi bi-back ms-3 me-2"></i>สถิติ</a>
                    <a class="list-group-item p-3 my-1 @yield('sidebar_check_grade_color')" href="{{route('check_grade')}}"><i
                            class="bi bi-back ms-3 me-2"></i>ตรวจสอบเกรดวิชาฝึกงาน</a>
                </ul>
            </div>
        </div>
        @if ($menu == 'manage_application')
            <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                <div class="card-body mx-2">
                    <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                            class="bi bi-circle-fill float-end"></i></h6>
                    <ul class="list-group list-group-flush mt-4">
                        <a class="list-group-item p-3 my-1 mt-3 @yield('subsidebar_application_appoval_color')" href="{{route('application_approval')}}"><i
                                class="bi bi-dice-1 ms-3 me-2"></i>อนุมัติคำร้อง</a>
                        <a class="list-group-item p-3 my-1 @yield('subsidebar_update_document_status_color')" href="{{route('application_update_document_status')}}"><i
                                class="bi bi-dice-2 ms-3 me-2"></i>ปรับปรุงสถานะการจัดทำเอกสาร</a>
                        <a class="list-group-item p-3 my-1 @yield('subsidebar_application_history_color')" href="{{route('appplication_history')}}"><i
                                class="bi bi-dice-3 ms-3 me-2"></i>ประวัติคำร้อง</a>
                    </ul>
                </div>
            </div>
        @else
            @if ($menu == 'menage_user')
                <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                    <div class="card-body mx-2">
                        <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                                class="bi bi-circle-fill float-end"></i></h6>
                        <ul class="list-group list-group-flush mt-4">
                            <a class="list-group-item p-3 my-1 mt-3 @yield('subsidebar_manage_professor_color')" href="{{route('manage_user_professor')}}"><i
                                    class="bi bi-dice-1 ms-3 me-2"></i>จัดการข้อมูลอาจารย์</a>
                            <a class="list-group-item p-3 my-1 @yield('subsidebar_manage_student_color')" href="{{route('manage_user_student')}}"><i
                                    class="bi bi-dice-2 ms-3 me-2"></i>จัดการข้อมูลนักศึกษา</a>
                        </ul>
                    </div>
                </div>
            @else
                @if ($menu == 'statistics')
                    <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                        <div class="card-body mx-2">
                            <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                                    class="bi bi-circle-fill float-end"></i></h6>
                            <ul class="list-group list-group-flush mt-4">
                                <a class="list-group-item p-3 my-1 mt-3 @yield('subsidebar_yearly_statistic_color')" href="{{route('statistics_yearly')}}"><i
                                        class="bi bi-dice-1 ms-3 me-2"></i>สถิติการฝึกงานรายปี</a>
                                <a class="list-group-item p-3 my-1 @yield('subsidebar_compare_yearly_statistic_color')" href="{{route('statistics_compare_yearly')}}"><i
                                        class="bi bi-dice-2 ms-3 me-2"></i>เปรียบเทียบสถิติการฝึกงานรายปี</a>
                                <a class="list-group-item p-3 my-1 @yield('subsidebar_evaluation_statistic_color')" href="{{route('statistics_evaluation')}}"><i
                                        class="bi bi-dice-3 ms-3 me-2"></i>สถิติแบบประเมิน</a>
                            </ul>
                        </div>
                    </div>
                @endif

            @endif

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
    </div>
</div>
@endsection
