@extends('admin.admin_layout')
@section('title', 'ปรับปรุงสถานะการจัดทำเอกสาร')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_update_document_status_color', 'select_menu_color')
@section('body_header', 'ปรับปรุงสถานะการจัดทำเอกสาร')
@section('body_content')
    <div class="text-center">
        <p class="mt-3">ปรับปรุงสถาานะการจัดทำเอกาสารสำเร็จ</p>
        <a class="btn btn-outline-dark" href="{{ route('application_update_document_status') }}">ย้อนกลับ</a>
    </div>
@endsection
