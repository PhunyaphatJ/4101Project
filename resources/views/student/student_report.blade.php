@extends('student.student_layout')
@section('title', 'student_report')
@section('student_process', 'select_menu_color')
@section('student_report', 'select_menu_color')
@section('body_header', 'รายงานการฝึกงาน')
@section('style')
    <style>
        #student_info {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }

        input,
        button {
            height: 50px;
        }
    </style>
@endsection
@section('body_content')
    @if ($report == 'have_report')
        <div class="card rounded-0 shadow" id="student_info">
            <div class="card-body">
                <div class="" style="margin: 5% 15%">
                    <div class="row justify-content-center">
                        <div class="col-6 mb-4">
                            <button class="btn sidebar_color d-inline-flex align-items-center m-auto rounded-5"
                                type="button">
                                ตัวอย่างรายงานการฝึกงาน<i class="bi bi-file-earmark-arrow-down ms-2"
                                    style="font-size: 30px"></i>
                            </button>
                        </div>
                        <div class="col-6 mb-3">
                            <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                type="button">
                                รายงานการฝึกงานของฉัน<i class="bi bi-file-earmark-text ms-2" style="font-size: 30px"></i>
                            </button>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-6 mb-4">
                            <a class="btn submit_color d-inline-flex align-items-center rounded-5 ps-3 float-end"
                                type="button" href="/student/{{ $student_process_status }}/{{ $app_type }}/edit_report/student_report">
                                แก้ไขรายงาน<i class="bi bi-pencil ms-2" style="font-size: 25px"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if ($report == 'no_report')
            <div class="card rounded-0 shadow" id="student_info">
                <div class="card-body">
                    <div class="" style="margin: 5% 15%">
                        <div class="row justify-content-center">
                            <div class="col-6 mb-4">
                                <button class="btn sidebar_color d-inline-flex align-items-center m-auto rounded-5"
                                    type="button">
                                    ตัวอย่างรายงานการฝึกงาน<i class="bi bi-file-earmark-arrow-down ms-2"
                                        style="font-size: 30px"></i>
                                </button>
                            </div>
                            <div class="col-6 mb-3">
                                <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto disabled"
                                    type="button">
                                    รายงานการฝึกงานของฉัน<i class="bi bi-file-earmark-text ms-2"
                                        style="font-size: 30px"></i>
                                </button>
                            </div>
                            <div class="col-6 mb-4">
                                <input type="file" class="form-control rounded-5 ps-4 m-auto" id="recentreceipt"
                                    placeholder="">
                            </div>
                            <div class="col-6">
                                <a class="btn submit_color d-inline-flex align-items-center rounded-5 float-end"
                                    type="button"
                                    href="/student/{{ $student_process_status }}/{{ $app_type }}/have_report/student_report">
                                    บันทึก<i class="bi bi-floppy2 ms-2" style="font-size: 25px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if ($report == 'edit_report')
                <div class="card rounded-0 shadow" id="student_info">
                    <div class="card-body">
                        <div class="" style="margin: 5% 15%">
                            <div class="row justify-content-center">
                                <div class="col-6 mb-4">
                                    <button class="btn sidebar_color d-inline-flex align-items-center m-auto rounded-5"
                                        type="button">
                                        ตัวอย่างรายงานการฝึกงาน<i class="bi bi-file-earmark-arrow-down ms-2"
                                            style="font-size: 30px"></i>
                                    </button>
                                </div>
                                <div class="col-6 mb-3">
                                    <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                        type="button">
                                        รายงานการฝึกงานของฉัน<i class="bi bi-file-earmark-text ms-2"
                                            style="font-size: 30px"></i>
                                    </button>
                                </div>
                                <div class="col-6 mb-4">
                                    <input type="file" class="form-control rounded-5 ps-4 m-auto" id="recentreceipt" placeholder="">
                                </div>
                                <div class="col-6 mb-4">
                                    <button class="btn submit_color d-inline-flex align-items-center rounded-5 ps-3 float-end disabled"
                                        type="button">
                                        แก้ไขรายงาน<i class="bi bi-pencil ms-2" style="font-size: 25px"></i>
                                    </button>
                                </div>
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <a class="btn submit_color d-inline-flex align-items-center rounded-5 float-end" type="button" href="/student/{{ $student_process_status }}/{{ $app_type }}/have_report/student_report">
                                        บันทึก<i class="bi bi-floppy2 ms-2" style="font-size: 25px"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

    @endif
@endsection
