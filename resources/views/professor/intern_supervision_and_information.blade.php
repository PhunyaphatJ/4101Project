@extends('professor.professor_layout')
@section('title', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('sidebar_intern_supervision_and_information_color', 'select_menu_color')
@section('body_header', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('sub_content')
    <div class="card bg-transparent border-0">
        <div class="card-body">
            <h4>นักศึกษาที่กำลังฝึกงานอยู่</h4>
            {{-- เขียน for สำหรับแสดงรายการนักศึกษา --}}
            <ul class="card ms-2 pt-2">
                <div class="card-bordy row">
                    <h1 class="col-1"><i class="bi bi-person-vcard"></i></h1>
                    <div class="col-11">
                        <div class="row pt-2">
                            {{-- รหัสนักศึกษา --}}
                            <h4>6405000000</h4>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div>
                                    <h6 style="display: inline-block">ชื่อ: </h6>
                                    {{-- @if ($professor_prefix == 'MR')
                                        <span>นาย </span>
                                    @elseif($professor_prefix == 'MS')
                                        <span>นางสาว </span>
                                    @elseif($professor_prefix == 'MRS')
                                        <span>นาง </span>
                                    @endif --}}
                                    <span>นางสาว </span>
                                    <span>ข้าวหอม </span>
                                    <span>อยู่เย็น </span>
                                </div>
                                <div>
                                    <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                                    <span>0940000000</span>
                                </div>
                                <div>
                                    <h6 style="display: inline-block">Email: </h6>
                                    <span>6405000000@rumail.ru.ac.th</span>
                                </div>
                            </div>
                            <div class="col-7">
                                <div>
                                    <h6 style="display: inline-block">ภาควิชา: </h6>
                                    <span>cos</span>
                                </div>
                                <div>
                                    {{-- เพิ่มเติมจากที่ออกแบบไว้ คือ วันเริ่มกับวันสิ้นสุดการฝึกงาน เป็นข้อมูลที่จำเป็นสำหร้บอาจารย์ --}}
                                    <h6 style="display: inline-block">วันที่เริ่มฝึกงาน: </h6>
                                    <span>9/11/2567</span>
                                </div>
                                <div>
                                    <h6 style="display: inline-block">วันที่สิ้นสุดการฝึกงาน: </h6>
                                    <span>9/11/2567</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-end me-2">
                    {{-- ลิงค์ไปหน้า intern_information --}}
                    <a class="btn btn-outline-info" href="#">นิเทศและเกรด</a>
                </div>
            </ul>
            {{-- endfor รายการนักศึกษา --}}
        </div>
    </div>
    <div class="card bg-transparent border-0">
        <div class="card-body">
            <h4>นักศึกษาที่ผ่านการฝึกงานแล้ว</h4>
            {{-- เขียน for สำหรับแสดงรายการนักศึกษา --}}
            <ul class="card ms-2 pt-2">
                <div class="card-bordy row">
                    <h1 class="col-1"><i class="bi bi-person-vcard"></i></h1>
                    <div class="col-11">
                        <div class="row pt-2">
                            {{-- รหัสนักศึกษา --}}
                            <h4>6405000000</h4>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <h6 style="display: inline-block">ชื่อ: </h6>
                                {{-- @if ($professor_prefix == 'MR')
                                    <span>นาย </span>
                                @elseif($professor_prefix == 'MS')
                                    <span>นางสาว </span>
                                @elseif($professor_prefix == 'MRS')
                                    <span>นาง </span>
                                @endif --}}
                                <span>นางสาว </span>
                                <span>ข้าวหอม </span>
                                <span>อยู่เย็น </span>
                                <br>
                                <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                                <span>0940000000</span>
                                <br>
                                <h6 style="display: inline-block">Email: </h6>
                                <span>6405000000@rumail.ru.ac.th</span>
                            </div>
                            <div class="col-7">
                                <h6 style="display: inline-block">ภาควิชา: </h6>
                                <span>cos</span>
                                <br>
                                {{-- เพิ่มเติมจากที่ออกแบบไว้ คือ วันเริ่มกับวันสิ้นสุดการฝึกงาน เป็นข้อมูลที่จำเป็นสำหร้บอาจารย์ --}}
                                <h6 style="display: inline-block">วันที่เริ่มฝึกงาน: </h6>
                                <span>9/11/2567</span>
                                <br>
                                <h6 style="display: inline-block">วันที่สิ้นสุดการฝึกงาน: </h6>
                                <span>9/11/2567</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-end me-2">
                    {{-- ลิงค์ไปหน้า former_intern_information --}}
                    <a class="btn btn-outline-info" href="#">เพิ่มเติม</a>
                </div>
            </ul>
            {{-- endfor รายการนักศึกษา --}}
        </div>
    </div>
@endsection
