{{-- path หน้าเว็บเป็น /student/manual/{student_process_status} --}}
@extends('student.student_layout')
@section('title','manual')
@section('navbar_header', 'นักศึกษา')
@section('manual','select_menu_color')
@section('body_header','คู่มือการใช้งานระบบ')
@section('body_content')
<img src="{{ asset('storage/documents/document_manual.jpg') }}" alt="Example Image" class="img-fluid mb-4">
@endsection

