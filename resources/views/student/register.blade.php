{{-- path หน้าเว็บเป็น /student/register --}}
@extends('ui_layout.login_layout')
@section('title', 'register')
@section('navbar_header', 'นักศึกษา')
@section('register', 'select_menu_color')
@section('body_header', 'Register')
@section('style')
    <style>
        input,
        select {
            height: 50px;
            margin-bottom: 5%;
        }

        #form-check input {
            height: 18px;
        }
        /* hover button login */
        button[type="submit"]:hover {
            background: #ff96ad;
            box-shadow: 0 0 5px #ff96ad, 0 0 25px #ff96ad, 0 0 50px #ff96ad, 0 0 200px #ff96ad;

        }
    </style>
@endsection

@section('body_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <form class="needs-validation" validate method="POST" action="{{ route('register') }}">
            @csrf
            <section> {{-- input ข้อมูลนักศึกษา --}}
                <h5 class="mb-3">ข้อมูลนักศึกษา</h5>
                <input type="hidden" name="role" value="student">
                <div class="row mx-2">
                    <label for="prefix" class="form-label col-6">คำนำหน้า</label>
                    <label for="department" class="form-label col-6">สาขาวิชา</label>
                    <div id="form-check" class="form-check col-2">
                        <input id="mr" name="prefix" type="radio" class="form-check-input ms-1" value="MR"
                            {{ old('prefix') == 'MR' ? 'checked' : '' }} required>
                        <label class="form-check-label ms-1" for="mr">นาย</label>
                    </div>
                    <div id="form-check" class="form-check col-2">
                        <input id="mrs" name="prefix" type="radio" class="form-check-input" value="MRS"
                            {{ old('prefix') == 'MRS' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="mrs">นาง</label>
                    </div>
                    <div id="form-check" class="form-check col-2">
                        <input id="miss" name="prefix" type="radio" class="form-check-input" value="MS"
                            style="translate: -200% 0%" {{ old('prefix') == 'MS' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="miss" style="translate: -70% 0%">นางสาว</label>
                    </div>

                    <div class="col-6">
                        <select class="form-select rounded-5 ps-4" name="department" autocomplete="off" required>
                            <option value="">Choose...</option>
                            <option value="CS" {{ old('department') == 'CS' ? 'selected' : '' }}>CS</option>
                            <option value="IT" {{ old('department') == 'IT' ? 'selected' : '' }}>IT</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="name" placeholder=""
                            value="{{ old('name') }}" autocomplete="off" required>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="student_id" class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="student_id" placeholder=""
                            value="{{ old('student_id') }}" maxlength="10" autocomplete="off">
                        

                    </div>

                    <div class="col-6">
                        <label for="surname" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="surname" placeholder=""
                            value="{{ old('surname') }}" autocomplete="off" required>
                            @error('surname')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control rounded-5 ps-4" name="phone" placeholder=""
                            value="{{ old('phone') }}" maxlength="10" autocomplete="off">
                    </div>
                </div>
            </section>

            <section> {{-- input ข้อมูลที่อยู่ --}}
                <hr class="my-4">
                <h5 class="mb-3">ที่อยู่</h5>

                <div class="row mx-2">
                    <div class="col-3">
                        <label for="house_no" class="form-label">เลขที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="house_no" placeholder=""
                            value="{{ old('house_no') }}" autocomplete="off" required>
                    </div>
                    <div class="col-3">
                        <label for="village_no" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="village_no" placeholder=""
                            value="{{ old('village_no') }}" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <label for="road" class="form-label">ถนน</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="road" placeholder=""
                            value="{{ old('road') }}" autocomplete="off" required>
                        {{-- old data  --}}

                    </div>
                    <div class="col-6">
                        <label for="province" class="form-label">จังหวัด</label>
                        <select id="input_province" class="form-select rounded-5 ps-4" name="province" required>
                            <option value="">กรุณาเลือกจังหวัด</option>
                            @foreach ($provinces as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @if (old('province') == $item)
                                    <option value="{{ $item }}" selected>{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="district" class="form-label">อำเภอ/เขต</label>
                        <select id="input_amphoe" class="form-select rounded-5 ps-4" name="district" required>
                            <option value="">กรุณาเลือกเขต/อำเภอ</option>
                            @foreach ($amphoes as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                {{-- action เเล้ว address ไม่หาย --}}
                                @if (old('district') == $item)
                                    <option value="{{ $item }}" selected>{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                        <select id="input_tambon" class="form-select rounded-5 ps-4" name="sub_district" required>
                            <option value="">กรุณาเลือกแขวง/ตำบล</option>
                            @foreach ($tambons as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @if (old('sub_district') == $item)
                                    <option value="{{ $item }}" selected>{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="postal_code" class="form-label">รหัสไปรษณีย์</label>
                        <input id="input_zipcode" type="text" class="form-control rounded-5 ps-4" name="postal_code"
                            placeholder="" value="{{ old('postal_code') }} " autocomplete="off" required>
                    </div>
                </div>
            </section>

            <section> {{-- input ข้อมูล account --}}
                <hr class="my-4">
                <h5 class="mb-3">Accout</h5>

                <div class="row mx-2">
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control rounded-5 ps-4" name="email"
                            placeholder="0000000000@rumail.ru.ac.th" value="{{ old('email') }}" autocomplete="off"
                            required>
                    </div>

                    <div class="col-6">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control rounded-5 ps-4" name="password" placeholder=""
                            autocomplete="new-password" required>
                    </div>

                    <div class="col-6">
                        <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control rounded-5 ps-4" name="password_confirmation"
                            placeholder="" autocomplete="new-password" required>
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
<script src="{{ asset('js/address.js') }}"></script>
