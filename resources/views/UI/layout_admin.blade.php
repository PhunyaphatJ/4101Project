{{-- path หน้าเว็บเป็น /admin/menu(menu_11 หมายถึงเมนูจัดการคำร้อง, menu_12 หมายถึงเมนูจัดการเอกสาร, menu_13 หมายถึงเมนูจัดการข้อมูลผู้ใช้งาน, menu_14 หมายถึงเมนูสถิติ, menu_15 หมายถึงเมนูตรวจสอบเกรดวิชาฝึกงาน)(ตั้งชื่อเมนูใหม่เอานะ) --}}
@extends('layout_navbar')
@section('style')
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
                    <a class="list-group-item p-3 my-1 @yield('menu_11')" href="#"><i
                            class="bi bi-back ms-3 me-2"></i>จัดการคำร้อง</a> {{-- @yield('menu_11') จะรับค่า "สี" มาจากไฟล์ที่เรียกใช้ layout(เลือกใช้สีจาก style ที่ตั้งไว้) menu_11 หมายถึงเมนูจัดการคำร้อง ให้ใส่สีเฉพาะเมนูที่กำลังทำงานอยู่ --}}
                    <a class="list-group-item p-3 my-1 @yield('menu_12')" href="#"><i
                            class="bi bi-back ms-3 me-2"></i>จัดการเอกสาร</a> {{-- menu_12 หมายถึงเมนูจัดการเอกสาร --}}
                    <a class="list-group-item p-3 my-1 @yield('menu_13')" href="#"><i
                            class="bi bi-back ms-3 me-2"></i>จัดการข้อมูลผู้ใช้งาน</a> {{-- menu_13 หมายถึงเมนูจัดการข้อมูลผู้ใช้งาน --}}
                    <a class="list-group-item p-3 my-1 @yield('menu_14')" href="#"><i
                            class="bi bi-back ms-3 me-2"></i>สถิติ</a> {{-- menu_14 หมายถึงเมนูสถิติ --}}
                    <a class="list-group-item p-3 my-1 @yield('menu_15')" href="#"><i
                            class="bi bi-back ms-3 me-2"></i>ตรวจสอบเกรดวิชาฝึกงาน</a> {{-- menu_15 หมายถึงเมนูตรวจสอบเกรดวิชาฝึกงาน --}}
                </ul>
            </div>
        </div>
        @if ($menu == 'menu_11')
            <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                <div class="card-body mx-2">
                    <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                            class="bi bi-circle-fill float-end"></i></h6>
                    <ul class="list-group list-group-flush mt-4">
                        <a class="list-group-item p-3 my-1 mt-3 @yield('menu_21')" href="#"><i
                                class="bi bi-dice-1 ms-3 me-2"></i>อนุมัติคำร้อง</a> {{-- menu_21 หมายถึงเมนูอนุมัติคำร้อง --}}
                        <a class="list-group-item p-3 my-1 @yield('menu_22')" href="#"><i
                                class="bi bi-dice-2 ms-3 me-2"></i>ปรับปรุงสถานะการจัดทำเอกสาร</a>
                        {{-- menu_22 หมายถึงเมนูปรับปรุงสถานะการจัดทำเอกสาร --}}
                        <a class="list-group-item p-3 my-1 @yield('menu_23')" href="#"><i
                                class="bi bi-dice-3 ms-3 me-2"></i>ประวัติคำร้อง</a> {{-- menu_23 หมายถึงเมนูประวัติคำร้อง --}}
                    </ul>
                </div>
            </div>
        @else
            @if ($menu == 'menu_13')
                <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                    <div class="card-body mx-2">
                        <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                                class="bi bi-circle-fill float-end"></i></h6>
                        <ul class="list-group list-group-flush mt-4">
                            <a class="list-group-item p-3 my-1 mt-3 @yield('menu_21')" href="#"><i
                                    class="bi bi-dice-1 ms-3 me-2"></i>จัดการข้อมูลอาจารย์</a>
                            {{-- menu_21 หมายถึงเมนูจัดการข้อมูลอาจารย์ --}}
                            <a class="list-group-item p-3 my-1 @yield('menu_22')" href="#"><i
                                    class="bi bi-dice-2 ms-3 me-2"></i>จัดการข้อมูลนักศึกษา</a>
                            {{-- menu_22 หมายถึงเมนูจัดการข้อมูลนักศึกษา --}}
                        </ul>
                    </div>
                </div>
            @else
                @if ($menu == 'menu_14')
                    <div id="sidebar" class="card sidebar_color mt-3" style="border-radius: 20px">
                        <div class="card-body mx-2">
                            <h6 class="card-title"><i class="bi bi-circle-fill float-start"></i><i
                                    class="bi bi-circle-fill float-end"></i></h6>
                            <ul class="list-group list-group-flush mt-4">
                                <a class="list-group-item p-3 my-1 mt-3 @yield('menu_21')" href="#"><i
                                        class="bi bi-dice-1 ms-3 me-2"></i>สถิติการฝึกงานรายปี</a>
                                {{-- menu_21 หมายถึงเมนูสถิติการฝึกงานรายปี --}}
                                <a class="list-group-item p-3 my-1 @yield('menu_22')" href="#"><i
                                        class="bi bi-dice-2 ms-3 me-2"></i>เปรียบเทียบสถิติการฝึกงานรายปี</a>
                                {{-- menu_22 หมายถึงเมนูเปรียบเทียบสถิติการฝึกงานรายปี --}}
                                <a class="list-group-item p-3 my-1 @yield('menu_23')" href="#"><i
                                        class="bi bi-dice-3 ms-3 me-2"></i>สถิติแบบประเมิน</a>
                                {{-- menu_23 หมายถึงเมนูสถิติแบบประเมิน --}}
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
