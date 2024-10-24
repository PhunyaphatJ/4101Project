@extends('student.student_layout')
@section('title', 'student_process_company_rec_with_request')
@section('student_process', 'select_menu_color')
@section('student_process_company', 'select_menu_color')
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

@section('out_body_header', 'รายการเอกสารขอความอนุเคราะห์ที่อยู่ในสถานะสมบูรณ์')
@section('out_body_content')
    <div class="card rounded-2 shadow mb-3">
        <div class="card-body">
            <div>
                <a href="student_process_company_choose_address" class="btn submit_color float-end rounded-5">เลือกสถานที่</a>
                <div class="row ">
                    <div class="col-6 ">
                        <div class="row">
                            <div class="col-2 text-end">
                                <i class="bi bi-building-fill" style="font-size: 20px"></i>
                            </div>
                            <div class="col-8">
                                <h6 class="mb-0">ชื่อหน่วยงาน</h6>
                                <p class="mb-0" style="font-size: 13px">บริษัท xxx จำกัด</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-2 text-end">
                                <i class="bi bi-telephone-fill" style="font-size: 20px"></i>
                            </div>
                            <div class="col-8">
                                <h6 class="mb-0">โทรศัพท์</h6>
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
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
                                <p class="mb-0" style="font-size: 13px">a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx</p>
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
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card rounded-2 shadow mb-3">
        <div class="card-body">
            <div>
                <a href="student_process_company_choose_address" class="btn submit_color float-end rounded-5">เลือกสถานที่</a>
                <div class="row ">
                    <div class="col-6 ">
                        <div class="row">
                            <div class="col-2 text-end">
                                <i class="bi bi-building-fill" style="font-size: 20px"></i>
                            </div>
                            <div class="col-8">
                                <h6 class="mb-0">ชื่อหน่วยงาน</h6>
                                <p class="mb-0" style="font-size: 13px">บริษัท xxx จำกัด</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-2 text-end">
                                <i class="bi bi-telephone-fill" style="font-size: 20px"></i>
                            </div>
                            <div class="col-8">
                                <h6 class="mb-0">โทรศัพท์</h6>
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
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
                                <p class="mb-0" style="font-size: 13px">a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx</p>
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
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
