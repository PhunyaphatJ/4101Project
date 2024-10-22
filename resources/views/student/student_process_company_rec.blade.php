@extends('student.student_layout')
@section('title', 'student_process_company_rec')
@section('student_process', 'select_menu_color')
@section('student_process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารส่งตัว)')
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
        <div class="sumit_color" style="width: 45%">
            <a id="bottom_menu" class="btn d-grid align-items-center mb-4 py-3 rounded-0" type="button" href="#" style="height: 85%">
                <h5>ขอเอกสารส่งตัว</h5>
                <p>(นักศึกษาที่ไม่มีการยื่นหนังสือขอความอนุเคราะห์)</p>
            </a>
        </div>
        <div class="sumit_color" style="width: 45%">
            <a id="bottom_menu" class="btn d-grid align-items-center mb-4 py-3 rounded-0 " type="button" href="#" style="height: 85%">
                <h5>ขอเอกสารส่งตัว</h5>
                <p>(นักศึกษาที่มีการยื่นหนังสือขอความอนุเคราะห์)</p>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="text-end me-3">
            <h5>ดาวน์โหลดแบบตอบรับ(เอกสาร 2)</h5>
            <p>(สำหรับให้หน่วยงานกรอกและแนบสำเนาในขั้นตอนการขอเอกสารส่งตัว)</p>
        </div>
        <a href="https://github.com/twbs/bootstrap/releases/download/v5.3.3/bootstrap-5.3.3-dist.zip" class="btn sumit_color float-end mx-3 rounded-5 p-2 px-4" onclick="ga('send', 'event', 'Getting started', 'Download', 'Download Bootstrap');"><i class="bi bi-arrow-down-circle-fill me-2"></i>Download</a> {{-- ปุ่มดาวน์โหลดได้จริง ลิงค์ดาวน์โหลดเป็นไฟล์ css and js ของ bootstrap (ใส่มาเป็นตัวอย่าง) --}}
    </div>
@endsection
