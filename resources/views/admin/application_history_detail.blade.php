@extends('admin.admin_layout')
@section('title', 'ประวัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_history_color', 'select_menu_color')
@section('body_header', 'ประวัติคำร้อง')
@section('body_content')
    <div class="card mt-3 p-4" style="border-color:black; border-width: 2px; border-radius: 0px">
        <div class="card-bordy row p-0">
            {{-- ประเภทคำร้อง --}}
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
            {{-- รายละเอียดคำร้อง --}}
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
        {{-- ข้อมูลนักศึกษา --}}
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
        {{-- ข้อมูลหลักฐานประกอบการพิจารณา --}}
        @if ($application['application_type'] == 'internship_register')
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
        @endif
        {{-- ข้อมูลสถานที่ฝึกงาน --}}
        @if (
            $application['application_type'] == 'internship_request' ||
                $application['application_type'] == 'recommendation' ||
                $application['application_type'] == 'appreciation')
            <div class="card-body pb-0">
                <h4>ข้อมูลสถานที่ฝึกงาน</h4>
                <div class="ms-3">
                    <div>
                        <h6 style="display: inline-block">ชื่อสถานที่: </h6>
                        <span>{{ $application['company_name'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">ที่อยู่: </h6>
                        <span>{{ $application['company_address'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                        <span>{{ $application['company_phone'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">เบอร์โทรสาร: </h6>
                        <span>{{ $application['company_fax'] }}</span>
                    </div>
                </div>
            </div>
            {{-- ข้อมูลรายละเอียดการฝึกงาน --}}
            <div class="card-body pb-0">
                <h4>รายละเอียดการฝึกงาน</h4>
                <div class="ms-3">
                    <div>
                        <h6 style="display: inline-block">ภาคการลงทะเบียน: </h6>
                        <span>{{ $application['register_semester'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">ปีการศึกษา: </h6>
                        <span>{{ $application['year'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">วันที่เริ่มฝึกงาน: </h6>
                        <span>{{ $application['start_date'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">วันที่สิ้นสุดการฝึกงาน: </h6>
                        <span>{{ $application['end_date'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">เรียน(ผู้รับเอกสาร): </h6>
                        <span>{{ $application['attend_to'] }}</span>
                    </div>
                </div>
            </div>
        @endif
        {{-- ข้อมูลพี่เลี้ยง --}}
        @if ($application['application_type'] == 'recommendation')
            <div class="card-body pb-0">
                <h4>ผู้รับผิดชอบ/พี่เลี้ยง</h4>
                <div class="ms-3">
                    {{-- ชื่อ : name lastname --}}
                    <div>
                        <h6 style="display: inline-block">ชื่อ: </h6>
                        <span>{{ $application['mentor_name'] }} </span>
                        <span>{{ $application['mentor_lastname'] }} </span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">Email: </h6>
                        <span>{{ $application['mentor_email'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">ตำแหน่ง: </h6>
                        <span>{{ $application['mentor_position'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                        <span>{{ $application['mentor_phone'] }}</span>
                    </div>
                    <div>
                        <h6 style="display: inline-block">เบอร์โทรสาร: </h6>
                        <span>{{ $application['mentor_fax'] }}</span>
                    </div>
                </div>
            </div>
            {{-- เอกสาร2 --}}
            <div class="card-body">
                <h4>เอกสารตอบรับนักศึกษาฝึกงาน </h4>
                <a class="btn btn-outline-info bi bi-download" href="{{ $application['response_file_path'] }}">
                    ดาวน์โหลด</a>
            </div>
        @endif
        {{-- ข้อมูลอาจารย์ที่ปรึกษา --}}
        @if ($application['application_type'] == 'appreciation')
            <h4>ข้อมูลอาจารย์ที่ปรึกษา</h4>
            <div class="ms-3">
                <div>
                    <h6 style="display: inline-block">รหัส: </h6>
                    <span>{{ $application['professor_id'] }}</span>
                </div>
                {{-- ชื่อ : prefix name lastname --}}
                <div>
                    <h6 style="display: inline-block">ชื่อ: </h6>
                    @if ($application['professor_prefix'] == 'MR.')
                        <span>นาย </span>
                    @elseif($application['professor_prefix'] == 'MS.')
                        <span>นางสาว </span>
                    @elseif($application['professor_prefix'] == 'MRS.')
                        <span>นาง </span>
                    @endif
                    <span>{{ $application['professor_name'] }} </span>
                    <span>{{ $application['professor_lastname'] }} </span>
                </div>
                <div>
                    <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                    <span>{{ $application['professor_phone'] }}</span>
                </div>
                <div>
                    <h6 style="display: inline-block">Email: </h6>
                    <span>{{ $application['professor_email'] }}</span>
                </div>
                <div>
                    <h6 style="display: inline-block">ข้อมูลเพิ่มเติม: </h6>
                    <span>{{ $application['professor_remark'] }}</span>
                </div>
            </div>
    </div>
    @endif
    </div>
    {{-- button group --}}
    <div class="text-center mt-4">
        @if (
            $application['application_type'] == 'internship_request' &&
                $application['application_status'] == 'document_pending')
            <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือขอความอนุเคราะห์">ดาวน์โหลดหนังสือขอความอนุเคราะห์</a>
        @endif
        @if ($application['application_type'] == 'recommendation' && $application['application_status'] == 'document_pending')
            <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือส่งตัว">ดาวน์โหลดหนังสือส่งตัว</a>
            <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือแต่งตั้งอาจารย์">ดาวน์โหลดหนังสือแต่งตั้งอาจารย์</a>
        @endif
        @if (
            ($application['application_type'] == 'recommendation' || $application['application_type'] == 'appreciation') &&
                $application['application_status'] == 'document_pending')
            <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือขอคุณ">ดาวน์โหลดหนังสือขอคุณ</a>
        @endif
        <div>
            <a class="btn btn-secondary" href="{{ route('application_history') }}">ย้อนกลับ</a>
        </div>
    </div>
@endsection
