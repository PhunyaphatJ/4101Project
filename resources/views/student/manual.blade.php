{{-- path หน้าเว็บเป็น /student/manual/{student_process_status} --}}
@extends('student.student_layout')
@section('title','manual')
@section('navbar_header', 'นักศึกษา')
@section('manual','select_menu_color')
@section('body_header','คู่มือการใช้งานระบบ')
@section('body_content')
@php
$videoURL = "https://www.youtube.com/watch?v=WePNs-G7puA";
$convertedURL = str_replace("watch?v=", "embed/", $videoURL);
@endphp
  <iframe width="560px"height="315px" src="{{ $convertedURL }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@endsection

