@extends('admin.admin_layout')
@section('title', 'จัดการผู้ใช้งาน')
@section('sidebar_manage_user_color', 'select_menu_color')
@if ($user_type == 'professor')
    @section('body_header', 'จัดการข้อมูลอาจารย์')
    @section('subsidebar_manage_professor_color', 'select_menu_color')
@elseif($user_type == 'student')
    @section('body_header', 'จัดการข้อมูลนักศึกษา')
    @section('subsidebar_manage_student_color', 'select_menu_color')
@endif
@section('sub_content')

    <div class="container my-5">
        <div class="card mt-4">
            @if ($user_type == 'professor')
                <div class="card-header">
                    ข้อมูลอาจารย์
                </div>
            @else
                <div class="card-header">
                    ข้อมูลนักศึกษา
                </div>
            @endif
            <div class="card-body">
                <!-- Display user details here -->
                @if ($user_type == 'professor')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">รหัสอาจารย์:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->person->professor->professor_id }}</p>
                    </div>
                </div>
                @else
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">รหัสนักศึกษา:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->person->student->student_id }}</p>
                    </div>
                </div>
                @endif
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">ชื่อ:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->person->name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">นามสกุล:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->person->surname }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">เบอร์โทร:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->person->phone ?? '-' }}</p>
                    </div>
                </div>

                @if ($user_type == 'student' && $user->address != null)
                <div class="row mb-3">
                    <div class="card-header">
                        ที่อยู่
                    </div>
                    <label class="col-sm-2 col-form-label">เลขที่:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->address->house_no }}</p>
                    </div>
                    <label class="col-sm-2 col-form-label">หมู่ที่:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->address->village_no ?? '-'}}</p>
                    </div>
                    <label class="col-sm-2 col-form-label">ถนน:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->address->road ?? '-' }}</p>
                    </div>
                    <label class="col-sm-2 col-form-label">จังหวัด:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->address->province }}</p>
                    </div>
                    <label class="col-sm-2 col-form-label">อำเภอ/เขต:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->address->district }}</p>
                    </div>
                    <label class="col-sm-2 col-form-label">ตำบล/แขวง:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->address->sub_district }}</p>
                    </div>
                    <label class="col-sm-2 col-form-label">รหัสไปรษณีย์:</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{ $user->address->postal_code }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('manage_users', ['users_type' => $user_type]) }}" class="btn btn-secondary me-2">ย้อนกลับ</a>
            <a href="{{ route('user_update', ['user_type' => $user_type, 'user_id' => $user->id]) }}" class="btn btn-primary">แก้ไข</a>
        </div>
    </div>

@endsection
