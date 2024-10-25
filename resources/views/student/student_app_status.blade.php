{{-- path หน้าเว็บเป็น /student/{student_process_status}/{app_type}/{report}/student_app_status --}}
@extends('student.student_layout')
@section('title', 'student_app_status')
@section('student_app_status', 'select_menu_color')
@section('body_header', 'ตรวจสอบสถานะคำร้อง')
@section('out_body_content')
    <section> {{-- คำร้องขอลงทะเบียนฝึกงาน --}}
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
                        <table>
                            <thead>
                                <div class="row text-center">
                                    <p class="col-3">เลขที่คำร้อง</p>
                                    <p class="col-3">ชื่อหน่วยงาน</p>
                                    <p class="col-3">วันที่ส่งคำร้อง</p>
                                    <p class="col-3">สถานะ</p>
                                </div>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    @if ($application['application_type'] == 'internship_register')
                                        <div class="row text-center body_color pt-2 my-2">
                                            <p class="col-3">{{ $application['application_id'] }}</p>
                                            <p class="col-3">{{ $application['company_name'] }}</p>
                                            <p class="col-3">{{ $application['application_date'] }}</p>
                                            @if ($application['application_status'] == 'สมบูรณ์')
                                                <p class="col-3 app_accept_color">{{ $application['application_status'] }}</p>
                                            @else
                                                @if ($application['application_status'] == 'กำลังดำเนินการ')
                                                    <p class="col-3 app_in_preparation_color">
                                                        {{ $application['application_status'] }}</p>
                                                @else
                                                    @if ($application['application_status'] == 'รอการอนุมัติ')
                                                        <p class="col-3 app_approval_pending_color">
                                                            {{ $application['application_status'] }}</p>
                                                    @else
                                                        @if ($application['application_status'] == 'ปฎิเสธ')
                                                            <p class="col-3 app_reject_color">
                                                                {{ $application['application_status'] }}<i
                                                                    class="bi bi-three-dots-vertical float-end"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    data-bs-title="(แสดงหมายเหตุตรงนี้)"></i></p>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section> {{-- คำร้องขอเอกสารขอความอนุเคราะห์ --}}
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
                        <table>
                            <thead>
                                <div class="row text-center">
                                    <p class="col-3">เลขที่คำร้อง</p>
                                    <p class="col-3">ชื่อหน่วยงาน</p>
                                    <p class="col-3">วันที่ส่งคำร้อง</p>
                                    <p class="col-3">สถานะ</p>
                                </div>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    @if ($application['application_type'] == 'internship_request')
                                        <div class="row text-center body_color pt-2 my-2">
                                            <p class="col-3">{{ $application['application_id'] }}</p>
                                            <p class="col-3">{{ $application['company_name'] }}</p>
                                            <p class="col-3">{{ $application['application_date'] }}</p>
                                            @if ($application['application_status'] == 'สมบูรณ์')
                                                <p class="col-3 app_accept_color">{{ $application['application_status'] }}</p>
                                            @else
                                                @if ($application['application_status'] == 'กำลังดำเนินการ')
                                                    <p class="col-3 app_in_preparation_color">
                                                        {{ $application['application_status'] }}</p>
                                                @else
                                                    @if ($application['application_status'] == 'รอการอนุมัติ')
                                                        <p class="col-3 app_approval_pending_color">
                                                            {{ $application['application_status'] }}</p>
                                                    @else
                                                        @if ($application['application_status'] == 'ปฎิเสธ')
                                                            <p class="col-3 app_reject_color">
                                                                {{ $application['application_status'] }}<i
                                                                    class="bi bi-three-dots-vertical float-end"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    data-bs-title="(แสดงหมายเหตุตรงนี้)"></i></p>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section> {{-- คำร้องขอเอกสารส่งตัว --}}
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
                        <table>
                            <thead>
                                <div class="row text-center">
                                    <p class="col-3">เลขที่คำร้อง</p>
                                    <p class="col-3">ชื่อหน่วยงาน</p>
                                    <p class="col-3">วันที่ส่งคำร้อง</p>
                                    <p class="col-3">สถานะ</p>
                                </div>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    @if ($application['application_type'] == 'internship_rec')
                                        <div class="row text-center body_color pt-2 my-2">
                                            <p class="col-3">{{ $application['application_id'] }}</p>
                                            <p class="col-3">{{ $application['company_name'] }}</p>
                                            <p class="col-3">{{ $application['application_date'] }}</p>
                                            @if ($application['application_status'] == 'สมบูรณ์')
                                                <p class="col-3 app_accept_color">{{ $application['application_status'] }}</p>
                                            @else
                                                @if ($application['application_status'] == 'กำลังดำเนินการ')
                                                    <p class="col-3 app_in_preparation_color">
                                                        {{ $application['application_status'] }}</p>
                                                @else
                                                    @if ($application['application_status'] == 'รอการอนุมัติ')
                                                        <p class="col-3 app_approval_pending_color">
                                                            {{ $application['application_status'] }}</p>
                                                    @else
                                                        @if ($application['application_status'] == 'ปฎิเสธ')
                                                            <p class="col-3 app_reject_color">
                                                                {{ $application['application_status'] }}<i
                                                                    class="bi bi-three-dots-vertical float-end"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    data-bs-title="(แสดงหมายเหตุตรงนี้)"></i></p>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- สำหรับ tooltipข้อความหมายเหตุ --}}
    <script> 
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
