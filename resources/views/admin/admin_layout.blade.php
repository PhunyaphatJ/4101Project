@extends('ui_layout.navbar_layout')
@section('navbar_header', 'สำหรับผู้ดูแลระบบ')
@section('right_icon')
    <a class="nav-link" href="#"><i class="bi bi-person-fill" style="font-size: 100%"></i></a>
    <a class="nav-link text-white ms-4 " href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;font-size: 100%">
        @csrf
</form>@endsection
@section('layout_style')
    <style>
        #sidebar {
            position: sticky;
            top: 58%;
        }
    </style>
@endsection
@section('sidebar')
    <div class="sidebar row mt-3">
        <div class="col-lg-3">
            <div class="card sidebar_color sticky-top" style="border-radius: 20px">
                <div class="card-body mx-2">
                    <h6 class="card-title"><i class="bi bi-menu-button-fill me-2"></i>เมนู</h6>
                    <ul class="list-group list-group-flush">
                        <a class="list-group-item p-3 my-1 @yield('sidebar_manage_application_color')" href="{{ route('application_approval') }}"><i
                                class="bi bi-back ms-3 me-2"></i>จัดการคำร้อง</a>
                        <a class="list-group-item p-3 my-1 @yield('sidebar_manage_document_color')" href="{{ route('manage_document' ,['document_type' => 'document_manual']) }}"><i
                                class="bi bi-back ms-3 me-2"></i>จัดการเอกสาร</a>
                        <a class="list-group-item p-3 my-1 @yield('sidebar_manage_user_color')"
                            href="{{ route('manage_users', ['users_type' => 'professor']) }}"><i
                                class="bi bi-back ms-3 me-2"></i>จัดการข้อมูลผู้ใช้งาน</a>
                        <a class="list-group-item p-3 my-1 @yield('sidebar_statistics_color')" href="{{ route('statistics_yearly') }}"><i
                                class="bi bi-back ms-3 me-2"></i>สถิติ</a>
                        <a class="list-group-item p-3 my-1 @yield('sidebar_check_grade_color')" href="{{ route('check_grade') }}"><i
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
                            <a class="list-group-item p-3 my-1 mt-3 @yield('subsidebar_application_appoval_color')"
                                href="{{ route('application_approval') }}"><i
                                    class="bi bi-dice-1 ms-3 me-2"></i>อนุมัติคำร้อง</a>
                            <a class="list-group-item p-3 my-1 @yield('subsidebar_update_document_status_color')"
                                href="{{ route('application_update_document_status') }}"><i
                                    class="bi bi-dice-2 ms-3 me-2"></i>ปรับปรุงสถานะการจัดทำเอกสาร</a>
                            <a class="list-group-item p-3 my-1 @yield('subsidebar_application_history_color')"
                                href="{{ route('application_history') }}"><i
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
                                <a class="list-group-item p-3 my-1 mt-3 @yield('subsidebar_manage_professor_color')"
                                    href=" {{ route('manage_users', ['users_type' => 'professor']) }}"><i
                                        class="bi bi-dice-1 ms-3 me-2"></i>จัดการข้อมูลอาจารย์</a>
                                <a class="list-group-item p-3 my-1 @yield('subsidebar_manage_student_color')"
                                    href="{{ route('manage_users', ['users_type' => 'student']) }}"><i
                                        class="bi bi-dice-2 ms-3 me-2"></i>จัดการข้อมูลนักศึกษา</a>
                            </ul>
                        </div>
                    </div>
                @elseif ($menu == 'manage_document')
                    <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                        <div class="card-body mx-2">
                            <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                                    class="bi bi-circle-fill float-end"></i></h6>
                            <ul class="list-group list-group-flush mt-4">
                                <a class="list-group-item p-3 my-1 mt-3 @yield('subsidebar_user_manual_color')"
                                    href="{{ route('manage_document' ,['document_type' => 'document_manual'])}}"><i
                                        class="bi bi-dice-1 ms-3 me-2"></i>คู่มือการใช้งาน</a>
                                <a class="list-group-item p-3 my-1 @yield('subsidebar_document_2')"
                                    href="{{ route('manage_document' ,['document_type' => 'document_2']) }}"><i
                                        class="bi bi-dice-2 ms-3 me-2"></i>แบบตอบรับนักศึกษา</a>
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
                                    <a class="list-group-item p-3 my-1 mt-3 @yield('subsidebar_yearly_statistic_color')"
                                        href="{{ route('statistics_yearly') }}"><i
                                            class="bi bi-dice-1 ms-3 me-2"></i>สถิติการฝึกงานรายปี</a>
                                    <a class="list-group-item p-3 my-1 @yield('subsidebar_compare_yearly_statistic_color')"
                                        href="{{ route('statistics_compare_yearly') }}"><i
                                            class="bi bi-dice-2 ms-3 me-2"></i>เปรียบเทียบสถิติการฝึกงานรายปี</a>
                                    <a class="list-group-item p-3 my-1 @yield('subsidebar_evaluation_statistic_color')"
                                        href="{{ route('statistics_evaluation') }}"><i
                                            class="bi bi-dice-3 ms-3 me-2"></i>สถิติแบบประเมิน</a>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
        </div>
        <div class="col-lg-9">
            <div class="body_color" style="border-radius: 0px 20px 0px 20px; padding: 3% 7%">
                <h4 class="text-center">@yield('body_header')</h4>
                @yield('body_content')
            </div>
            @yield('sub_content')
        </div>
    </div>
@endsection
@section('style')
    <style>
        .sidebar {
            z-index: 1;
        }

        ul.navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        ul.navigation li {
            float: left;
        }

        li.navigation a {
            text-decoration: none;
            color: gray;
            display: block;
            padding: 10px 10px 2px;
            border-style: none none solid;
            border-width: 2px;
            border-color: lightgray;
        }

        li.navigation:hover a {
            color: black;
            background-color: lightblue;
        }

        li.navigation.active a {
            color: black;
            border-color: black;
            background-color: lightblue;
        }

        td.status_approval_pending_color {
            color: lightskyblue;
        }

        td.status_document_pending_color {
            color: gold;
        }

        td.status_completed_color {
            color: lightgreen;
        }

        td.status_reject_color {
            color: red;
        }

        .status_approval_pending_color {
            color: lightskyblue;
        }

        .status_document_pending_color {
            color: gold;
        }

        .status_completed_color {
            color: lightgreen;
        }

        .status_reject_color {
            color: red;
        }

        div.overlay {
            position: fixed;
            display: none;
            width: 60%;
            height: 100%;
            top: 0%;
            left: 30%;
            right: 10%;
            bottom: 0%;
            background-color: rgba(210, 210, 210, 0.125);
            z-index: 2;
            cursor: pointer;
        }

        .overlay-item {
            position: absolute;
            top: 50%;
            left: 50%;
            /* font-size: 50px; */
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }
    </style>
@endsection
