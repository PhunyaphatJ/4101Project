@extends('student.student_layout')
@section('title', 'student_app_status')
@section('student_app_status', 'select_menu_color')
@section('body_header', 'ตรวจสอบสถานะคำร้อง')
@section('out_body_content')
    <div class="accordion my-3" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    ลงทะเบียนฝึกงาน
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row text-center">
                        <p class="col-4">เลขที่คำร้อง</p>
                        <p class="col-4">วันที่ส่งคำร้อง</p>
                        <p class="col-4">สถานะ</p>
                    </div>
                    <div class="row text-center body_color pt-2 my-2">
                        <p class="col-4">12345</p>
                        <p class="col-4">24/10/2567</p>
                        <p class="col-4 app_accept_color">สมบูรณ์</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion my-3" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    เอกสารขอความอนุเคราะห์
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row text-center">
                        <p class="col-3">เลขที่คำร้อง</p>
                        <p class="col-3">ชื่อหน่วยงาน</p>
                        <p class="col-3">วันที่ส่งคำร้อง</p>
                        <p class="col-3">สถานะ</p>
                    </div>
                    <div class="row text-center body_color pt-2 my-2">
                        <p class="col-3">12345</p>
                        <p class="col-3">บริษัท</p>
                        <p class="col-3">24/10/2567</p>
                        <p class="col-3 app_accept_color">สมบูรณ์</p>
                    </div>
                    <div class="row text-center body_color pt-2 my-2">
                        <p class="col-3">12345</p>
                        <p class="col-3">บริษัท</p>
                        <p class="col-3">24/10/2567</p>
                        <p class="col-3 app_in_preparation_color">กำลังดำเนินการ</p>
                    </div>
                    <div class="row text-center body_color pt-2 my-2">
                        <p class="col-3">12345</p>
                        <p class="col-3">บริษัท</p>
                        <p class="col-3">24/10/2567</p>
                        <p class="col-3 app_approval_pending_color">รอการอนุมัติ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion my-3" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    เอกสารส่งตัว
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row text-center">
                        <p class="col-3">เลขที่คำร้อง</p>
                        <p class="col-3">ชื่อหน่วยงาน</p>
                        <p class="col-3">วันที่ส่งคำร้อง</p>
                        <p class="col-3">สถานะ</p>
                    </div>
                    <div class="row text-center body_color pt-2 my-2">
                        <p class="col-3">12345</p>
                        <p class="col-3">บริษัท</p>
                        <p class="col-3">24/10/2567</p>
                        <p class="col-3 app_reject_color">ปฎิเสธ <i class="bi bi-three-dots-vertical float-end" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="(แสดงหมายเหตุตรงนี้)"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
