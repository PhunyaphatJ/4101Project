@extends('ui_layout.navbar_layout')
@section('navbar_header', 'สำหรับอาจารย์')
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
                        <a class="list-group-item p-3 my-1 @yield('sidebar_intern_supervision_and_information_color')" href="{{route('index')}}"><i
                                class="bi bi-back ms-3 me-2"></i>ข้อมูลนักศึกษาและการนิเทศ</a>
                        <a class="list-group-item p-3 my-1 @yield('sidebar_statistics_color')" href="#"><i
                                class="bi bi-back ms-3 me-2"></i>ข้อมูลสถิติ</a>
                    </ul>
                </div>
            </div>
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
