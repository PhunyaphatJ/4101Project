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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="container">
        <form class="needs-validation" method="POST"
            action="{{ route('user_update', ['user_type' => $user_type, 'user_id' => $user->id]) }}">
            @csrf
            @method('PUT') {{-- Use PUT for update method --}}

            <h5 class="mb-3">User Information</h5>
            @if ($user_type == 'professor')
                <div class="col-12">
                    <label for="status" class="form-label">สถานะ</label>
                    <div class="form-check form-check-inline">
                        <input id="status_active" name="status" type="radio" class="form-check-input" value="active"
                            {{ old('status', $user->status) == 'active' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="status_no_active" name="status" type="radio" class="form-check-input"
                            value="no_active" {{ old('status', $user->status) == 'no_active' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_no_active">No Active</label>
                    </div>
                </div>
            @endif
            <div class="col-12 mt-2">
                <label for="prefix" class="form-label">คำนำหน้า</label>
                <div class="form-check form-check-inline">
                    <input id="mr" name="prefix" type="radio" class="form-check-input" value="MR"
                        {{ old('prefix', $user->person->prefix) == 'MR' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="mr">นาย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input id="mrs" name="prefix" type="radio" class="form-check-input" value="MRS"
                        {{ old('prefix', $user->person->prefix) == 'MRS' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="mrs">นาง</label>
                </div>
                <div class="form-check form-check-inline">
                    <input id="miss" name="prefix" type="radio" class="form-check-input" value="MS"
                        {{ old('prefix', $user->person->prefix) == 'MS' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="miss">นางสาว</label>
                </div>
            </div>
            @if ($user_type == 'student')
                <label for="department" class="form-label col-6">สาขาวิชา</label>
                <div class="col-6">
                    <select class="form-select rounded-5 ps-4" name="department" autocomplete="off" required>
                        <option value="">Choose...</option>
                        <option value="CS" {{ old('department', $user->department) == 'CS' ? 'selected' : '' }}>CS
                        </option>
                        <option value="IT" {{ old('department', $user->department) == 'IT' ? 'selected' : '' }}>IT
                        </option>
                    </select>
                </div>
            @endif


            <div class="row mx-2">
                <div class="col-6">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->person->name) }}"
                        required>
                </div>

                <div class="col-6">
                    <label for="surname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" name="surname"
                        value="{{ old('surname', $user->person->surname) }}" required>
                </div>

                <div class="col-6">
                    <label for="email" class="form-label">รหัสประจำตัว</label>
                    @if ($user_type == 'professor')
                        <input type="text" class="form-control" name="professor_id"
                            value="{{ old('professor_id', $user->professor_id) }}" readonly>
                    @else
                        <input type="text" class="form-control" name="student_id"
                            value="{{ old('student_id', $user->student_id) }}" readonly>
                    @endif
                </div>

                <div class="col-6">
                    <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="tel" class="form-control" name="phone"
                        value="{{ old('phone', $user->person->phone) }}" required>
                </div>
            </div>
            @if($user_type == 'student')
            <section> {{-- input ข้อมูลที่อยู่ --}}
                <hr class="my-4">
                <h5 class="mb-3">ที่อยู่</h5>
            
                <div class="row mx-2">
                    <div class="col-3">
                        <label for="house_no" class="form-label">เลขที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="house_no" placeholder=""
                            value="{{ old('house_no', $user->address->house_no ?? '') }}" autocomplete="off" required>
                    </div>
                    <div class="col-3">
                        <label for="village_no" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="village_no" placeholder=""
                            value="{{ old('village_no', $user->address->village_no ?? '') }}" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <label for="road" class="form-label">ถนน</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="road" placeholder=""
                            value="{{ old('road', $user->address->road ?? '') }}" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <label for="province" class="form-label">จังหวัด</label>
                        <select id="input_province" class="form-select rounded-5 ps-4" name="province" required>
                            <option value="">กรุณาเลือกจังหวัด</option>
                            @foreach($provinces as $item)
                                <option value="{{ $item }}" {{ (old('province', $user->address->province ?? '') == $item) ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label for="district" class="form-label">อำเภอ/เขต</label>
                        <select id="input_amphoe" class="form-select rounded-5 ps-4" name="district" required>
                            <option value="">กรุณาเลือกเขต/อำเภอ</option>
                            @foreach($amphoes as $item)
                                <option value="{{ $item }}" {{ (old('district', $user->address->district ?? '') == $item) ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                        <select id="input_tambon" class="form-select rounded-5 ps-4" name="sub_district" required>
                            <option value="">กรุณาเลือกแขวง/ตำบล</option>
                            @foreach($tambons as $item)
                                <option value="{{ $item }}" {{ (old('sub_district', $user->address->sub_district ?? '') == $item) ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label for="postal_code" class="form-label">รหัสไปรษณีย์</label>
                        <input id="input_zipcode" type="text" class="form-control rounded-5 ps-4" name="postal_code" placeholder=""
                            value="{{ old('postal_code', $user->address->postal_code ?? '') }}" autocomplete="off" required>
                    </div>
                </div>
            </section>
        @endif
    </div>

    <hr class="my-4">
    <button class="btn btn-primary float-end" type="submit">Update</button>
    </form>
    </div>
    <script src="{{ asset('js/address.js') }}"></script>

@endsection
