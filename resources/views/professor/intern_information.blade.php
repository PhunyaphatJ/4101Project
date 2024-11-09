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
                {{-- ลิงค์ไปหน้า internship_assessment_form--}}
                <a class="p-2" href="#">ผลประเมินการฝึกงาน <i class="bi bi-arrow-right"></i></a>
                {{-- ลิงค์ไปหน้า survey_graduate_feature_form--}}
                <a class="p-2" href="#">ผลการสำรวจคุณสมบัติบัณฑิต <i class="bi bi-arrow-right"></i></a>
            </div>
            {{-- แบบประเมินสำหรับอาจารย์ --}}
            <div class="col card me-2 p-3 bg-dark text-white">
                <h6 class="text-center">แบบประเมินสำหรับอาจารย์</h6>
                {{-- ลิงค์ไปหน้า business_assessment_form--}}
                <a class="p-2" href="#">แบบประเมินสถานประกอบการ <i class="bi bi-arrow-right"></i></a>
                {{-- ลิงค์ไปหน้า internship_evaluation_form--}}
                <a class="p-2" href="#">แบบประเมินนักศึกษาฝึกงาน <i class="bi bi-arrow-right"></i></a>
            </div>
            {{-- เกรด --}}
            <div class="col card p-3 bg-dark text-white">
                <h6 class="text-center">เกรด</h6>
                {{-- if(grade==no_grad) --}}
                <h6 class="text-center p-2">-</h6>
                <button class="btn btn-link" onclick="grading_block_on()">แก้ไข</button>
                {{-- pop up บันทึกเกรด --}}
                <div class="overlay" id="grading-popup">
                    <div class="card overlay-item w-50">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="col-9 text-start mt-4 ps-3">บันทึกเกรด</h4>
                                <div class="col-3 text-end">
                                    <button class="btn"><i class="bi bi-x-lg" style="text-align: left;"
                                            onclick="grading_block_off()"></i></button>
                                </div>
                            </div>
                            {{-- from บันทึกเกรด --}}
                            {{-- ลิงค์บันทึกเกรด แสดงผลหน้าเดิม --}}
                            <form method="POST" action="#">
                                @csrf
                                <div class="form-group">
                                    <select class="form-select form-select-lg" name="select_grade" id="">
                                        <option selected value="A">A</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="ยืนยัน" class="btn btn-warning m-2">
                                </div>
                            </form>
                            <div class="text-center">
                                <button class="btn btn-dark" onclick="grading_block_off()">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- สิ้นสุด pop up --}}
                {{-- else --}}
                {{-- <h6 class="text-center p-3">$grad</h6> --}}
                {{-- endif --}}
            </div>
        </div>
        {{-- หนังสือขอบคุณ --}}
        <div class="card-body row d-flex justify-content-end pt-0">
            <div class="col-4 card p-0 bg-transparent">
                <button class="btn btn-dark p-3" onclick="request_appreciation_block_on()">ขอหนังสือขอบคุณ</button>
                {{-- pop up บันทึกคำขอหนังสือขอบคุณ --}}
                <div class="overlay" id="request_appreciation-popup">
                    <div class="card overlay-item w-50">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="col-9 text-start mt-4 ps-3">ขอหนังสือขอบคุณ</h4>
                                <div class="col-3 text-end">
                                    <button class="btn"><i class="bi bi-x-lg" style="text-align: left;"
                                            onclick="request_appreciation_block_off()"></i></button>
                                </div>
                            </div>
                            <p class="ms-2">ต้องการขอเอกสารใหม่หรือไม่</p>
                            {{-- from บันทึกเกรด --}}
                            <div class="mt-2 text-center">
                                {{-- ลิงค์บันทึกคำร้องขอเอกสารขอคุณ แล้วแสดงหน้า response_appreciation_application --}}
                                <a class="btn btn-warning" href="#">
                                    ส่งคำขอ
                                </a>
                                <button class="btn btn-dark" onclick="request_appreciation_block_off()">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- สิ้นสุด pop up --}}
            </div>
        </div>
        <script>
            function grading_block_on() {
                document.getElementById("grading-popup").style.display = "block";
            }

            function grading_block_off() {
                document.getElementById("grading-popup").style.display = "none";
            }

            function request_appreciation_block_on() {
                document.getElementById("request_appreciation-popup").style.display = "block";
            }

            function request_appreciation_block_off() {
                document.getElementById("request_appreciation-popup").style.display = "none";
            }
        </script>
    </div>
@endsection
