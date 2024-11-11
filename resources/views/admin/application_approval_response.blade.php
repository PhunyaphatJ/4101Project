@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
@section('body_content')
    <div class="text-center">
        @if ($event == 'approve')
            <p class="mt-3">อนุมัติคำร้องสำเร็จ</p>
            @if ($application->application_type == 'Internship_Request')
                <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือขอความอนุเคราะห์">ดาวน์โหลดหนังสือขอความอนุเคราะห์</a>
            @endif
            @if ($application->application_type == 'Recommendation')
                <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือส่งตัว">ดาวน์โหลดหนังสือส่งตัว</a>
                <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือแต่งตั้งอาจารย์">ดาวน์โหลดหนังสือแต่งตั้งอาจารย์</a>
            @endif
            @if ($application->application_type == 'Recommendation' || $application->application_type == 'Appreciation')
                <a class="btn btn-primary mb-2" href="#ดาวน์โหลดหนังสือขอบคุณ">ดาวน์โหลดหนังสือขอบคุณ</a>
            @endif
        @elseif($event == 'reject')
            <p class="mt-3">ไม่อนุมัติคำร้องสำเร็จ</p>
        @endif
        <div>
            <a class="btn btn-outline-dark" href="{{ route('application_approval') }}">ย้อนกลับ</a>
        </div>
    </div>
@endsection
