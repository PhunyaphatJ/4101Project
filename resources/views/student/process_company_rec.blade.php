{{-- path หน้าเว็บเป็น /student/process/process_company_rec/{student_process_status}/{app_type} --}}
@extends('student.student_layout')
@section('title', 'process_company_rec')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารส่งตัว)')
@section('style')
    <style>
        #bottom_menu {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }
    </style>
@endsection
@section('body_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section> {{-- ปุ่ม ขอเอกสารส่งตัวแบบไม่มี request จะเซทค่าดั้งนี้ app_type = rec_no_request --}} {{-- ปุ่ม ขอเอกสารส่งตัวแบบมี request จะเซทค่าดั้งนี้ app_type = rec_with_request --}}
        <div class="d-flex gap-4 justify-content-center py-5">
            <div class="sidebar_color" style="width: 45%">
                <a id="bottom_menu" class="btn d-grid align-items-center mb-4 py-3 rounded-0" type="button"
                    href="{{ route('search_company', ['type' => 'recommendation']) }}" style="height: 85%">
                    <h5>ขอเอกสารส่งตัว</h5>
                    <p>(นักศึกษาที่ไม่มีการยื่นหนังสือขอความอนุเคราะห์)</p>
                </a>
            </div>
            <div class="sidebar_color" style="width: 45%">
                <a id="bottom_menu" class="btn d-grid align-items-center mb-4 py-3 rounded-0 " type="button"
                    href="{{ route('recommendation_request') }}" style="height: 85%">
                    <h5>ขอเอกสารส่งตัว</h5>
                    <p>(นักศึกษาที่มีการยื่นหนังสือขอความอนุเคราะห์)</p>
                </a>
            </div>
        </div>
    </section>

    <section> {{-- ปุ่มดาวน์โหลดไฟล์เอกสาร2 --}}
        <div class="container">
            <div class="text-end me-3">
                <h5>ดาวน์โหลดแบบตอบรับ(เอกสาร 2)</h5>
                <p>(สำหรับให้หน่วยงานกรอกและแนบสำเนาในขั้นตอนการขอเอกสารส่งตัว)</p>
            </div>
            <a href="{{ asset('storage/documents/document_2.pdf') }}"
                class="btn submit_color float-end mx-3 rounded-5 p-2 px-4"
                onclick="ga('send', 'event', 'Getting started', 'Download', 'Download Bootstrap');"><i
                    class="bi bi-arrow-down-circle-fill me-2"></i>Download</a> {{-- ปุ่มดาวน์โหลดได้จริง ลิงค์ดาวน์โหลดเป็นไฟล์ css and js ของ bootstrap (ใส่มาเป็นตัวอย่าง) --}}
        </div>
    </section>
@endsection
