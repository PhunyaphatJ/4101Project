@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
@section('sub_content')
    <div>
        @if ($application_type == 'all')
            <ul class="navigation">
                <li class="navigation active"><a href="{{ route('application_approval') }}">ทั้งหมด</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_register') }}">ขึ้นทะเบียนฝึกงาน</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_request') }}">เอกสารขอความอนุเคราะห์</a></li>
                <li class="navigation"><a href="{{ route('application_approval_list', 'recommendation') }}">เอกสารส่งตัว</a>
                </li>
                <li class="navigation"><a href="{{ route('application_approval_list', 'appreciation') }}">เอกสารขอบคุณ</a>
                </li>
            </ul>
        @elseif($application_type == 'internship_register')
            <ul class="navigation">
                <li class="navigation"><a href="{{ route('application_approval') }}">ทั้งหมด</a></li>
                <li class="navigation active"><a
                        href="{{ route('application_approval_list', 'internship_register') }}">ขึ้นทะเบียนฝึกงาน</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_request') }}">เอกสารขอความอนุเคราะห์</a>
                </li>
                <li class="navigation"><a href="{{ route('application_approval_list', 'recommendation') }}">เอกสารส่งตัว</a>
                </li>
                <li class="navigation"><a href="{{ route('application_approval_list', 'appreciation') }}">เอกสารขอบคุณ</a>
                </li>
            </ul>
        @elseif($application_type == 'internship_request')
            <ul class="navigation">
                <li class="navigation"><a href="{{ route('application_approval') }}">ทั้งหมด</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_register') }}">ขึ้นทะเบียนฝึกงาน</a></li>
                <li class="navigation active"><a
                        href="{{ route('application_approval_list', 'internship_request') }}">เอกสารขอความอนุเคราะห์</a>
                </li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'recommendation') }}">เอกสารส่งตัว</a></li>
                <li class="navigation"><a href="{{ route('application_approval_list', 'appreciation') }}">เอกสารขอบคุณ</a>
                </li>
            </ul>
        @elseif($application_type == 'recommendation')
            <ul class="navigation">
                <li class="navigation"><a href="{{ route('application_approval') }}">ทั้งหมด</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_register') }}">ขึ้นทะเบียนฝึกงาน</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_request') }}">เอกสารขอความอนุเคราะห์</a>
                </li>
                <li class="navigation active"><a
                        href="{{ route('application_approval_list', 'recommendation') }}">เอกสารส่งตัว</a></li>
                <li class="navigation"><a href="{{ route('application_approval_list', 'appreciation') }}">เอกสารขอบคุณ</a>
                </li>
            </ul>
        @elseif($application_type == 'appreciation')
            <ul class="navigation">
                <li class="navigation"><a href="{{ route('application_approval') }}">ทั้งหมด</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_register') }}">ขึ้นทะเบียนฝึกงาน</a></li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'internship_request') }}">เอกสารขอความอนุเคราะห์</a>
                </li>
                <li class="navigation"><a
                        href="{{ route('application_approval_list', 'recommendation') }}">เอกสารส่งตัว</a></li>
                <li class="navigation active"><a href="{{ route('application_approval_list', 'appreciation') }}">เอกสารขอบคุณ</a>
                </li>
            </ul>
        @endif
        <table class="table mt-1">
            <thead>
                <tr >
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
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application['application_id'] }}</td>
                        <td>{{ $application['student_id'] }}</td>
                        <td>{{ $application['name'] }}</td>
                        <td>{{ $application['lastname'] }}</td>
                        <td>{{ $application['date'] }}</td>
                        <td>{{ $application['application_type'] }}</td>
                        <td class="status_approval_pending_color">{{ $application['application_status'] }}</td>
                        <td><a class="btn btn-warning btn-sm"href="#">แสดง</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
