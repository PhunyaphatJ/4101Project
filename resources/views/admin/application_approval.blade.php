@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
@section('sub_content')
    <div>
        <ul class="navigation">
            {{-- เลือกแสดงคำร้องทั้งหมด --}}
            @if ($application_type == 'all')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval') }}">ทั้งหมด</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอขึ้นทะเบียนฝึกงาน --}}
            @if ($application_type == 'internship_register')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'internship_register') }}">ขึ้นทะเบียนฝึกงาน</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอเอกสารขอความอนุเคราะห์ --}}
            @if ($application_type == 'internship_request')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'internship_request') }}">เอกสารขอความอนุเคราะห์</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอเอกสารส่งตัว --}}
            @if ($application_type == 'recommendation')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'recommendation') }}">เอกสารส่งตัว</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอเอกสารสขอบคุณ --}}
            @if ($application_type == 'appreciation')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'appreciation') }}">เอกสารขอบคุณ</a></li>
        </ul>
        {{-- ตารางแสดงรายการคำร้อง --}}
        <table class="table mt-1 text-center">
            <thead>
                <tr>
                    <th scope="col">เลขที่คำขอ</th>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">วันที่ส่งคำขอ</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- รายการคำร้อง --}}
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application['application_id'] }}</td>
                        <td>{{ $application['student_id'] }}</td>
                        <td>{{ $application['name'] }}</td>
                        <td>{{ $application['lastname'] }}</td>
                        <td>{{ $application['date'] }}</td>
                        {{-- เปลี่ยนประเภทคำร้องเป็นภาษาไทย --}}
                        @if ($application['application_type'] == 'internship_register')
                            <td>ขึ้นทะเบียนฝึกงาน</td>
                        @elseif($application['application_type'] == 'internship_request')
                            <td>เอกสารขอความอนุเคราะห์</td>
                        @elseif($application['application_type'] == 'recommendation')
                            <td>เอกสารส่งตัว</td>
                        @elseif($application['application_type'] == 'appreciation')
                            <td>เอกสารขอบคุณ</td>
                        @endif
                        {{-- เปลี่ยนสถานะคำร้องเป็นภาษาไทย --}}
                        @if ($application['application_status'] == 'approval_pending')
                            <td class="status_approval_pending_color">รอการอนุมัติ</td>
                        @elseif($application['application_status'] == 'document_pending')
                            <td class="status_document_pending_color">กำลังจัดทำ</td>
                        @elseif($application['application_status'] == 'completed')
                            <td class="status_completed_color">สมบูรณ์</td>
                        @elseif($application['application_status'] == 'reject')
                            <td class="status_reject_color">ปฏิเสธ</td>
                        @endif
                        <td>
                            <a class="btn btn-warning btn-sm" 
                            href="{{route('application_approval_detail',[$application['application_type'],$application['application_id']])}}">แสดง</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection