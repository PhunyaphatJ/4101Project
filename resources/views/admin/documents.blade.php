@extends('admin.admin_layout')
@section('title', 'เอกสาร')
@section('sidebar_manage_document_color', 'select_menu_color')
@if ($document_type == 'document_manual')
    @section('body_header', 'คู่มือการใช้งาน')
    @section('subsidebar_user_manual_color', 'select_menu_color')
@elseif($document_type == 'document_2')
    @section('body_header', 'เอกสารที่ 2')
    @section('subsidebar_document_2', 'select_menu_color')
@endif
@section('sub_content')

<div class="container text-center" style="margin-top: 50px;">
    @php
        $imagePath = 'documents/' . $document_type . '.jpg';
    @endphp

    @if (Storage::disk('public')->exists($imagePath))
        <img src="{{ asset('storage/' . $imagePath) }}" alt="Example Image" class="img-fluid mb-4">
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('document_upload', ['document_type' => $document_type]) }}" class="btn btn-primary">แก้ไข</a>
       </div>
    @else
        <div class="alert alert-warning">ยังไม่มีคู่มือการใช้งาน</div>
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('document_upload', ['document_type' => $document_type]) }}" class="btn btn-primary">เพิ่มคู่มือ</a>
       </div>
    @endif
</div>

@endsection
