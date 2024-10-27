@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
@section('body_content')
    <div class="text-center">
        @if ($event == 'approve')
            <p class="mt-3">อนุมัติคำร้องสำเร็จ</p>
        @elseif($event == 'reject')
            <p class="mt-3">ไม่อนุมัติคำร้องสำเร็จ</p>
        @endif
        <a class="btn btn-outline-dark" href="{{route('application_approval')}}" >ย้อนกลับ</a>
    </div>
@endsection