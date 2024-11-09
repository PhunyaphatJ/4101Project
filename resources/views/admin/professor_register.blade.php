@extends('admin.admin_layout')
@section('title', 'จัดการผู้ใช้งาน')
@section('sidebar_manage_user_color', 'select_menu_color')
@section('body_header', 'ลงทะเบียนอาจารย์')
@section('subsidebar_manage_professor_color', 'select_menu_color')
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
    <form class="needs-validation" validate method="POST" action="{{ route('professor_register') }}">
        @csrf
        <section> {{-- input ข้อมูลนักศึกษา --}}
            <h5 class="mb-3">ข้อมูลนักศึกษา</h5>
            <input type="hidden" name="role" value="professor">
            <div class="row mx-2">
                <div class="col-12">
                    <label for="status" class="form-label">สถานะ</label>
                    <div class="form-check form-check-inline">
                        <input id="status_active" name="status" type="radio" class="form-check-input" value="active" {{ old('status') == 'active' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_active">active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="status_no_active" name="status" type="radio" class="form-check-input" value="no_active" {{ old('status') == 'no_active' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_no_active">no_active</label>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <label for="prefix" class="form-label">คำนำหน้า</label>
                    <div class="form-check form-check-inline">
                        <input id="mr" name="prefix" type="radio" class="form-check-input" value="MR" {{ old('prefix') == 'MR' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="mr">นาย</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="mrs" name="prefix" type="radio" class="form-check-input" value="MRS" {{ old('prefix') == 'MRS' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="mrs">นาง</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="miss" name="prefix" type="radio" class="form-check-input" value="MS" {{ old('prefix') == 'MS' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="miss">นางสาว</label>
                    </div>
                </div>

                <div class="col-6">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control rounded-5 ps-4" name="name" placeholder="" value="{{ old('name') }}" autocomplete="off" required>
                </div>

                <div class="col-6">
                    <label for="surname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control rounded-5 ps-4" name="surname" placeholder="" value="{{ old('surname') }}" autocomplete="off" required>
                </div>

                <div class="col-6">
                    <label for="professor_id" class="form-label">รหัสอาจารย์</label>
                    <input type="text" class="form-control rounded-5 ps-4" name="professor_id" placeholder="" value="{{ old('professor_id') }}" maxlength="10" autocomplete="off">
                </div>

                <div class="col-6">
                    <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="tel" class="form-control rounded-5 ps-4" name="phone" placeholder="" value="{{ old('phone') }}" maxlength="10" autocomplete="off">
                </div>
            </div>
        </section>

        <section> {{-- input ข้อมูล account --}}
            <hr class="my-4">
            <h5 class="mb-3">Accout</h5>

            <div class="row mx-2">
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control rounded-5 ps-4" name="email" placeholder="0000000000@rumail.ru.ac.th" value="{{ old('email') }}" autocomplete="off" required>
                </div>

                <div class="col-6">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control rounded-5 ps-4" name="password" placeholder="" autocomplete="new-password" required>
                </div>

                <div class="col-6">
                    <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control rounded-5 ps-4" name="password_confirmation" placeholder="" autocomplete="new-password" required>
                </div>
            </div>
        </section>

        <section> {{-- ปุ่ม register จะเซทค่าดั้งนี้ student_process_status = no_register --}}
            <hr class="my-4">

            <div class="mx-3">
                <button class="btn submit_color p-3 px-5 float-end rounded-5" type="submit">Register</button>
            </div>
        </section>
    </form>
</div>
@endsection
