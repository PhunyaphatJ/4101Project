@extends('student.student_layout')
@section('title', 'process_company_add_address')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@section('body_header', $message)
@section('body_content')
<div class="text-center">
    <p class="mt-3">บันทึกคำขอแล้ว</p>
    <p class="mt-3">รอการอนุมัติจากเจ้าหน้าที่</p>
    <a class="btn btn-outline-dark" href="{{ route('process_company') }}">ย้อนกลับ</a>
</div>
@endsection