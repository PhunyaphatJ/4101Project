@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
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
        @if ($application['application_type'] == 'recommendation')
            {{-- ปุ่มถัดไป กรณีเป็นเอกสารส่งตัว --}}
            <div style="display: inline-block">
                <a class="btn btn-warning"
                    href="/admin/manage_application/approval/{{ $application['application_type'] }}/{{ $application['application_id'] }}/assign_professor">
                    ถัดไป
                </a>
            </div>
        @else
            {{-- ปุ่มอนุมัติ เมื่อกดจะแสดง pop up ยืนยันการอนุมัติคำร้อง --}}
            <div style="display: inline-block">
                <button class="btn btn-success" onclick="approve_block_on()">อนุมัติ</button>
                {{-- pop up ยืนยันการอนุมัติคำร้อง --}}
                <div class="overlay" id="approve-popup">
                    <div class="card overlay-item w-75">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="col-9 text-start mt-4 ps-3">อนุมัติคำร้อง</h4>
                                <div class="col-3 text-end">
                                    <button class="btn"><i class="bi bi-x-lg" style="text-align: left;"
                                            onclick="approve_block_off()"></i></button>
                                </div>
                            </div>
                            {{-- ปุ่มใน pop up --}}
                            <div class="text-start ps-3">
                                <span>อนุมัติคำร้อง {{ $application['application_id'] }}
                                    และเปลี่ยนสถานะคำร้องเป็น</span>
                                @if ($application['application_type'] == 'internship_register')
                                    <span>'สมบูรณ์'</span>
                                @else
                                    <span>'กำลังจัดทำ'</span>
                                @endif
                            </div>
                            <div class="mt-2">
                                <a class="btn btn-warning"
                                    href="{{ route('approve_application', [$application['application_type'], $application['application_id']]) }}">
                                    ยืนยัน
                                </a>
                                <button class="btn btn-dark" onclick="approve_block_off()">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- สิ้นสุด pop up --}}
            </div>
        @endif
        {{-- ปุ่มไม่อนุมัติ เมื่อกดจะแสดง pop up ยืนยันการไม่อนุมัติคำร้อง --}}
        <div style="display: inline-block">
            <button class="btn btn-danger" onclick="reject_block_on()">ไม่อนุมัติ</button>
            {{-- pop up ยืนยันการไม่อนุมัติคำร้อง --}}
            <div class="overlay" id="reject-popup">
                <div class="card overlay-item w-75">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="col-9 text-start mt-4 ps-3">ไม่อนุมัติคำร้อง</h4>
                            <div class="col-3 text-end">
                                <button class="btn"><i class="bi bi-x-lg" style="text-align: left;"
                                        onclick="reject_block_off()"></i></button>
                            </div>
                        </div>
                        {{-- ปุ่มใน pop up --}}
                        <p class="text-start ps-3 mb-0">ไม่อนุมัติคำร้อง {{ $application['application_id'] }}
                            และเปลี่ยนสถานะคำร้องเป็นปฏิเสธ</p>
                        <form method="POST"
                            action="/admin/manage_application/approval/{{ $application['application_type'] }}/{{ $application['application_id'] }}/reject">
                            @csrf
                            <div class="form-group">
                                <textarea name="response_detail" cols="10" rows="5" class="form-control" placeholder="ระบุเหตุผล.."></textarea>
                            </div>
                            @error('response_detail')
                                <script>
                                    document.getElementById("reject-popup").style.display = "block";
                                </script>
                                <p class="text-start text-danger mt-2 mb-0">{{ $message }}</p>
                            @enderror
                            <input type="submit" value="ยืนยัน" class="btn btn-warning m-2">
                        </form>
                        <button class="btn btn-dark" onclick="reject_block_off()">ยกเลิก</button>
                    </div>
                </div>
            </div>
            {{-- สิ้นสุด pop up --}}
        </div>
        <div style="display: inline-block">
            <a class="btn btn-secondary" href="{{ route('application_approval') }}">ย้อนกลับ</a>
        </div>
    </div>
    <script>
        function approve_block_on() {
            document.getElementById("approve-popup").style.display = "block";
        }

        function approve_block_off() {
            document.getElementById("approve-popup").style.display = "none";
        }

        function reject_block_on() {
            document.getElementById("reject-popup").style.display = "block";
        }

        function reject_block_off() {
            document.getElementById("reject-popup").style.display = "none";
        }
    </script>
@endsection
