@extends('student.student_layout')
@section('title', 'student_professor')
@section('student_process', 'select_menu_color')
@section('student_professor', 'select_menu_color')
@section('body_header', 'พบอาจารย์ที่ปรึกษา')
@section('style')
    <style>
        #bookmark_icon {
            position: absolute;
            top: 0%;
            right: 0%;
            font-size: 300%;
            translate: 0% -10%;
        }

        #student_info {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }
    </style>
@endsection
@section('body_content')
    <div class="card rounded-0 shadow" id="student_info">
        <div class="card-body">
            <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
            <div class="px-5 py-4">
                <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>ข้อมูลอาจารย์ที่ปรึกษา</h5>
                <div class="row mt-4 ms-4">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-person-bounding-box" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">ชื่อ</h6>
                                <p class="mb-0" style="font-size: 13px">นาย xxx xxxx</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-telephone-fill" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">โทรศัพท์</h6>
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-pen" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">ข้อมูลเพิ่มเติม</h6>
                                <p class="mb-0" style="font-size: 13px">สามารถเข้าพบได้ทุกวัน ช่วงบ่าย</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-envelope-open-fill" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">email</h6>
                                <p class="mb-0" style="font-size: 13px">0000000000@rumail.ru.ac.th</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

@endsection
