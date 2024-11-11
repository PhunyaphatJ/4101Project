@extends('professor.professor_layout')
@section('title', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('sidebar_intern_supervision_and_information_color', 'select_menu_color')
@section('body_header', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('body_content')
    <div class="text-center">
        <p class="mt-3">ขอหนังสือขอคุณสำเร็จ</p>
        {{-- ลิงค์ไปหน้า intern_information --}}
        <a class="btn btn-outline-dark" href="{{route('index')}}">ย้อนกลับ</a>
    </div>
@endsection
