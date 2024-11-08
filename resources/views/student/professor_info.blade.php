{{-- path หน้าเว็บเป็น /student/process/professor_info/{student_process_status} --}}
@extends('student.student_layout')
@section('title', 'professor_info')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('professor_info', 'select_menu_color')
@section('body_header', 'พบอาจารย์ที่ปรึกษา')
@section('style')
    <style>
        #display_info {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }
    </style>
@endsection
@section('body_content')
    <section> {{-- แสดงข้อมูลอาจารย์ที่ปรึกษา --}}
            <div class="card rounded-0 shadow" id="display_info">
                <div class="card-body">
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
                                        <p class="mb-0" style="font-size: 13px">{{ $professor->person->prefix }} {{ $professor->person->name }} {{ $professor->person->surname }}</p>
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
                                        <p class="mb-0" style="font-size: 13px">{{ $professor->person->phone }}</p>
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
                                        <p class="mb-0" style="font-size: 13px">{{ $professor->person->remark ?? '-' }}</p>
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
                                        <p class="mb-0" style="font-size: 13px">{{ $professor['email'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">
    </section>

@endsection
