@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
@section('body_content')
    <div class="card mt-3 p-4" style="border-color:black; border-width: 2px; border-radius: 0px">
        <div class="row p-0">
            <div class="col-6" style="padding-top:10px">
                @if ($application['application_type'] == 'internship_register')
                    <h3 style="display: inline-block">ขึ้นทะเบียนฝึกงาน</h3>
                @elseif($application['application_type'] == 'internship_request')
                    <h3 style="display: inline-block">เอกสารขอความอนุเคราะห์</h3>
                @elseif($application['application_type'] == 'recommendation')
                    <h3 style="display: inline-block">เอกสารส่งตัว</h3>
                @elseif($application['application_type'] == 'appreciation')
                    <h3 style="display: inline-block">เอกสารขอบคุณ</h3>
                @endif
            </div>
            <div class="col-6 text-end">
                <p class="m-0">เลขที่คำร้อง {{ $application['application_id'] }}</p>
                <p class="m-0">วันที่ส่งคำร้อง {{ $application['date'] }}</p>
                <span>สถานะ </span>
                {{-- เปลี่ยนสถานะคำร้องเป็นภาษาไทย --}}
                @if ($application['application_status'] == 'approval_pending')
                    <span class="status_approval_pending_color">รอการอนุมัติ</span>
                @elseif($application['application_status'] == 'document_pending')
                    <span class="status_document_pending_color">กำลังจัดทำ</span>
                @elseif($application['application_status'] == 'completed')
                    <span class="status_completed_color">สมบูรณ์</span>
                @elseif($application['application_status'] == 'reject')
                    <span class="status_reject_color">ปฏิเสธ</span>
                @endif
            </div>
        </div>
        <div class="card-body pb-0">
            <h4>ข้อมูลนักศึกษา</h4>
            <div class="ms-3">
                <div>
                    <h6 style="display: inline-block">รหัสนักศึกษา: </h6>
                    <span>{{ $application['student_id'] }}</span>
                </div>
                {{-- ชื่อ : prefix name lastname --}}
                <div>
                    <h6 style="display: inline-block">ชื่อ: </h6>
                    @if ($application['prefix'] == 'MR.')
                        <span>นาย </span>
                    @elseif($application['prefix'] == 'MS.')
                        <span>นางสาว </span>
                    @elseif($application['prefix'] == 'MRS.')
                        <span>นาง </span>
                    @endif
                    <span>{{ $application['name'] }} </span>
                    <span>{{ $application['lastname'] }} </span>
                </div>
                <div>
                    <h6 style="display: inline-block">ภาควิชา: </h6>
                    <span>{{ $application['department'] }}</span>
                </div>
                <div>
                    <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                    <span>{{ $application['phone'] }}</span>
                </div>
                <div>
                    <h6 style="display: inline-block">Email: </h6>
                    <span>{{ $application['email'] }}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4>หลักฐานประกอบการพิจารณา</h4>
            <div class="ms-3">
                <div class="row">
                    <div class="col">
                        <h6>ใบรายงานการเช็คเกรด </h6>
                        <a class="btn btn-outline-info bi bi-download" href="{{ $application['transcript_path'] }}">
                            ดาวน์โหลด</a>
                    </div>
                    <div class="col">
                        <h6>สำเนาบัตรนักศึกษา </h6>
                        <a class="btn btn-outline-info bi bi-download" href="{{ $application['idcard_path'] }}">
                            ดาวน์โหลด</a>
                    </div>
                    <div class="col">
                        <h6>ใบเสร็จลงทะเบียนเรียนภาคล่าสุด </h6>
                        <a class="btn btn-outline-info bi bi-download" href="{{ $application['recentreceipt_path'] }}">
                            ดาวน์โหลด</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a class="btn btn-success" href="#">อนุมัติ</a>
        <a class="btn btn-danger" href="#">ไม่อนุมัติ</a>
        <a class="btn btn-secondary" href="#">ย้อนกลับ</a> 
    </div>
@endsection
