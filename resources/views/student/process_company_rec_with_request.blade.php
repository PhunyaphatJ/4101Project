{{-- path หน้าเว็บเป็น /student/process/process_company_rec_with_request/{student_process_status}/{app_type} --}}
@extends('student.student_layout')
@section('title', 'process_company_rec_with_request')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารส่งตัว)')
@section('style')
    <style>
        input,
        select {
            height: 50px;
        }

        select {
            margin-bottom: 10%;
        }
    </style>
@endsection

@section('out_body_content')
<section> {{-- แสดงรายระเอียดสถานที่ฝึกงานตามที่ได้ขอเอกสารขอความอนุเคราะห์ไป --}}
    @if ($applications->isEmpty())
    <h2>เอกสารฝึกงานยังไม่ถูกอนุมัติ</h2>
    @else
    @foreach ($applications as $application)
    @section('out_body_header', 'รายการเอกสารขอความอนุเคราะห์ที่อยู่ในสถานะสมบูรณ์')
                <div class="card rounded-2 shadow mb-3">
                    <div class="card-body">
                        <div>
                            <a href="{{ route('select_company', ['type' => 'recommendation','company_id' => $application->internship_detail->company->company_id, 'application_id' => $application->application_id]) }}" class="btn submit_color float-end rounded-5">เลือกสถานที่</a>
                            <div class="row ">

                                <div class="col-6 ">
                                    <div class="row">
                                        <div class="col-2 text-end">
                                            <i class="bi bi-building-fill" style="font-size: 20px"></i>
                                        </div>
                                        <div class="col-8">
                                            <h6 class="mb-0">ชื่อหน่วยงาน</h6>
                                            <p class="mb-0" style="font-size: 13px">{{ $application->internship_detail->company->company_name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 ">
                                    <div class="row">
                                        <div class="col-2 text-end">
                                            <i class="bi bi-telephone-fill" style="font-size: 20px"></i>
                                        </div>
                                        <div class="col-8">
                                            <h6 class="mb-0">โทรศัพท์</h6>
                                            <p class="mb-0" style="font-size: 13px">{{ $application->internship_detail->company->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2 text-end">
                                            <i class="bi bi-pin-map-fill" style="font-size: 20px"></i>
                                        </div>
                                        <div class="col-8">
                                            <h6 class="mb-0">ที่อยู่</h6>
                                            <p class="mb-0" style="font-size: 13px">{{ $application->internship_detail->company->address->getAddress() }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2 text-end">
                                            <i class="bi bi-printer-fill" style="font-size:20px"></i>
                                        </div>
                                        <div class="col-8">
                                            <h6 class="mb-0">โทรสาร</h6>
                                            <p class="mb-0" style="font-size: 13px">{{ $application->internship_detail->company['fax'] ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>

@endsection
