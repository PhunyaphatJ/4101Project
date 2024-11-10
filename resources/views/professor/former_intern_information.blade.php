@extends('professor.professor_layout')
@section('title', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('sidebar_intern_supervision_and_information_color', 'select_menu_color')
@section('body_header', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('body_content')
    <div class="card mt-3 p-4 pb-0 border border-dark">
        {{-- ส่วนของข้อมูลนักศึกษา --}}
        <div class="card-bordy row p-0">
            <h1 class="col-1"><i class="bi bi-person-vcard"></i></h1>
            <div class="col-11">
                <div class="row pt-2">
                    {{-- รหัสนักศึกษา --}}
                    <h4>6405000000</h4>
                </div>
                {{-- ข้อมูลนักศึกษา --}}
                <div class="row">
                    <div class="col-5">
                        <div>
                            <h6 style="display: inline-block">ชื่อ: </h6>
                            {{-- @if (professor_prefix == 'MR')
                                <span>นาย </span>
                            @elseif(professor_prefix == 'MS')
                                <span>นางสาว </span>
                            @elseif(professor_prefix == 'MRS')
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
                    {{-- รายละเอียดการฝึกงาน --}}
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
                    <hr class="mt-4 col-11">
                    {{-- ข้อมูลสถานที่ฝึกงาน --}}
                    <div class="col-5">
                        <h5>ข้อมูลสถานที่ฝึกงาน</h5>
                        <div>
                            <h6 style="display: inline-block">ชื่อสถานที่: </h6>
                            <span>aaa</span>
                        </div>
                        <div>
                            <h6 style="display: inline-block">ที่อยู่: </h6>
                            <span>aaa</span>
                        </div>
                        <div>
                            <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                            <span>0940000000</span>
                        </div>
                        <div>
                            <h6 style="display: inline-block">เบอร์โทรสาร: </h6>
                            <span>0940000000</span>
                        </div>
                    </div>
                    {{-- ข้อมูลผู้รับผิดชอบ/พี่เลี้ยง --}}
                    <div class="col-7">
                        <h5>ข้อมูลผู้รับผิดชอบ/พี่เลี้ยง</h5>
                        <div>
                            <h6 style="display: inline-block">ชื่อ: </h6>
                            <span>name </span>
                            <span>surname</span>
                        </div>
                        <div>
                            <h6 style="display: inline-block">Email: </h6>
                            <span>email</span>
                        </div>
                        <div>
                            <h6 style="display: inline-block">ตำแหน่ง: </h6>
                            <span>aaa</span>
                        </div>
                        <div>
                            <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                            <span>0940000000</span>
                        </div>
                        <div>
                            <h6 style="display: inline-block">เบอร์โทรสาร: </h6>
                            <span>0940000000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body text-end me-2">
            {{-- ดาวน์โหลดรายงานการฝึกงาน --}}
            <a class="btn btn-outline-info" href="#">ดูรายงานการฝึกงาน</a>
        </div>
    </div>
    {{-- ส่วนของการนิเทศและเกรด และหนังสือขอบคุณ --}}
    <div class="card bg-transparent border-0">
        <div class="card-body row d-flex justify-content-between">
            {{-- ผลการประเมินจากบริษัท --}}
            <div class="col card me-2 p-3 bg-dark text-white">
                <h6 class="text-center">ผลการประเมินจากบริษัท</h6>
                <a class="p-2" href="#">ผลประเมินการฝึกงาน <i class="bi bi-arrow-right"></i></a>
                <a class="p-2" href="#">ผลการสำรวจคุณสมบัติบัณฑิต <i class="bi bi-arrow-right"></i></a>
            </div>
            {{-- แบบประเมินสำหรับอาจารย์ --}}
            <div class="col card me-2 p-3 bg-dark text-white">
                <h6 class="text-center">แบบประเมินสำหรับอาจารย์</h6>
                <a class="p-2" href="#">แบบประเมินสถานประกอบการ <i class="bi bi-arrow-right"></i></a>
                <a class="p-2" href="#">แบบประเมินนักศึกษาฝึกงาน <i class="bi bi-arrow-right"></i></a>
            </div>
            {{-- เกรด --}}
            <div class="col card p-3 bg-dark text-white">
                <h6 class="text-center">เกรด</h6>
                {{-- if(grade==no_grad) --}}
                <h6 class="text-center p-2">-</h6>
                {{-- else --}}
                {{-- <h6 class="text-center p-3">$grad</h6> --}}
                {{-- endif --}}
            </div>
            {{-- ปุ่มย้อนกลับ --}}
            <div class="card-body row">
                <div class="col-2 p-0">
                    <button class="btn btn-dark p-3"><i class="bi bi-chevron-left"></i> ย้อนกลับ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
