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
    </div>
    {{-- เลือกอาจารย์ --}}
    <div class="m-4">
        <h5>เลือกอาจารย์ที่ปรึกษา</h5>
        {{-- ให้แอมินเลือกไปก่อนนะไม่ใช้ตามคิว --}}
        <form method="POST" action="/admin/manage_application/approval/{{ $application['application_type'] }}/{{ $application['application_id'] }}/approve">
            @csrf
            <div class="form-group ps-2 pe-2">
                <select name="selected_professor" class="form-select">
                    @foreach ($professors as $professor)
                        <option value="{{$professor['professor_id']}}">
                            {{$professor['professor_id']}} {{$professor['professor_name']}} {{$professor['professor_lastname']}}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
    {{-- button group --}}
    <div class="text-center mt-4">
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
        {{-- ปุ่มย้อนกลับ --}}
        <div style="display: inline-block">
            <a class="btn btn-secondary"
                href="/admin/manage_application/approval/{{ $application['application_type'] }}/{{ $application['application_id'] }}/">
                ย้อนกลับ
            </a>
        </div>
    </div>
    <script>
        function approve_block_on() {
            document.getElementById("approve-popup").style.display = "block";
        }

        function approve_block_off() {
            document.getElementById("approve-popup").style.display = "none";
        }
    </script>
@endsection
