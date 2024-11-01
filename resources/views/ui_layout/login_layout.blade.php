{{-- path หน้าเว็บเป็น /layout_login --}}
@extends('ui_layout.navbar_layout')
@section('sidebar')
<div class="row mt-3">
    <div class="col-lg-3">
        <div class="card sidebar_color sticky-top" style="border-radius: 20px">
            <div class="card-body mx-2">
                <h6 class="card-title"><i class="bi bi-menu-button-fill me-2"></i>เมนู</h6>
                <ul class="list-group list-group-flush">
                    <a class="list-group-item p-3 my-1 @yield('register')" href="register"><i class="bi bi-back ms-3 me-2"></i>Register</a> {{-- @yield('register') จะรับค่า "สี" มาจากไฟล์ที่เรียกใช้ layout(เลือกใช้สีจาก style ที่ตั้งไว้) Register หมายถึงเมนูRegister ให้ใส่สีเฉพาะเมนูที่กำลังทำงานอยู่ --}}
                    <a class="list-group-item p-3 my-1 @yield('login')" href="/"><i class="bi bi-back ms-3 me-2"></i>Login</a> {{-- login หมายถึงเมนูLogin --}}
                    <a class="list-group-item p-3 my-1 @yield('mentor')" href="#"><i class="bi bi-back ms-3 me-2"></i>สำหรับผู้ดูแลนักศึกษา</a> {{-- mentor หมายถึงเมนูสำหรับผู้ดูแลนักศึกษา --}}
                </ul>
            </div>
        </div>
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
