@extends('student.student_layout')
@section('title', 'student_process_company')
@section('student_process', 'select_menu_color')
@section('student_process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน')
@section('style')
    <style>
        #bottom_menu {
            background-color: rgba(0,0,0,0.7);
            color: #ffffff;
        }
    </style>
@endsection
@section('body_content')
    <div class="d-flex gap-4 justify-content-center py-5">
        <div class="sidebar_color" style="width: 45%">
            <a id="bottom_menu" class="btn d-grid align-items-center mb-4 rounded-0 py-3" type="button" href="student_process_company_rec" style="height: 85%">
                <h5>ขอเอกสารส่งตัว</h5>
                <p>(นักศึกษาที่มีสถานที่ฝึกงานแล้ว)</p>
            </a>
        </div>
        <div class="sidebar_color" style="width: 45%">
            <a id="bottom_menu" class="btn d-grid align-items-center mb-4 rounded-0 py-3" type="button" href="student_process_company_search_address" style="height: 85%">
                <h5>ขอเอกสารขอความอนุเคราะห์</h5>
                <p>(นักศึกษาที่มีสถานที่ยังไม่มีฝึกงานแล้ว)</p>
            </a>
        </div>
    </div>
@endsection
