{{-- path หน้าเว็บเป็น /student/process/process_company_add_address/{student_process_status}/{app_type} --}}
@extends('student.student_layout')
@section('title', 'process_company_add_address')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@section('body_header', 'เพิ่มสถานที่ฝึกงาน')

@section('style')
    <style>
        input,
        select {
            height: 50px;
            margin-bottom: 5%;
        }
    </style>
@endsection
@section('body_content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form class="needs-validation" validate method="POST" action="{{ route('add_company', ['type' => $type]) }}">
            @csrf
            <section> {{-- input ข้อมูลสถานที่ฝึกงาน --}}
                <h5 class="mb-3">เพิ่มสถานที่ฝึกงาน</h5>

                <div class="row mx-2">
                    <div class="col-12">
                        <label for="company_name" class="form-label">ชื่อหน่วยงาน</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="company_name" 
                            value="{{ old('company_name') }}" required autocomplete="off">
                    </div>

                    <div class="col-6">
                        <label for="phone" class="form-label">โทรศัพท์</label>
                        <input type="tel" class="form-control rounded-5 ps-4" name="phone" 
                            value="{{ old('phone') }}" required autocomplete="off" maxlength="10">
                    </div>

                    <div class="col-6">
                        <label for="fax" class="form-label">โทรสาร</label>
                        <input type="tel" class="form-control rounded-5 ps-4" name="fax" 
                            value="{{ old('fax') }}" required autocomplete="off"maxlength='10'>
                    </div>
                </div>
            </section>

            <section> {{-- input ที่อยู่สถานที่ฝึกงาน --}}
                <hr class="my-4">
                <h5 class="mb-3">ที่อยู่</h5>

                <div class="row mx-2">
                    <div class="col-3">
                        <label for="house_no" class="form-label">เลขที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="house_no" 
                            value="{{ old('house_no') }}" required autocomplete="off">
                    </div>
                    <div class="col-3">
                        <label for="village_no" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="village_no" 
                            value="{{ old('village_no') }}" required autocomplete="off">
                    </div>
                    <div class="col-6">
                        <label for="road" class="form-label">ถนน</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="road" 
                            value="{{ old('road') }}" required autocomplete="off">
                    </div>
                    <div class="col-6">
                        <label for="province" class="form-label">จังหวัด</label>
                        <select id="input_province" class="form-select rounded-5 ps-4" name="province" required>
                            <option value="">กรุณาเลือกจังหวัด</option>
                            @foreach ($provinces as $item)
                                <option value="{{ $item }}" {{ old('province') == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="district" class="form-label">อำเภอ/เขต</label>
                        <select id="input_amphoe" class="form-select rounded-5 ps-4" name="district" required>
                            <option value="">กรุณาเลือกเขต/อำเภอ</option>
                            @foreach ($amphoes as $item)
                                <option value="{{ $item }}" {{ old('district') == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                        <select id="input_tambon" class="form-select rounded-5 ps-4" name="sub_district" required>
                            <option value="">กรุณาเลือกแขวง/ตำบล</option>
                            @foreach ($tambons as $item)
                                <option value="{{ $item }}" {{ old('sub_district') == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="postal_code" class="form-label">รหัสไปรษณีย์</label>
                        <input id="input_zipcode" type="text" class="form-control rounded-5 ps-4" name="postal_code" 
                            value="{{ old('postal_code') }}" autocomplete="off" required>
                    </div>
                </div>
            </section>

            <section> {{-- ปุ่ม เพิ่มสถานที่ --}}
                <hr class="my-4">

                <div class="mx-3">
                    <button class="btn submit_color p-3 px-5 float-end ms-3 rounded-5" type="submit">เพิ่มสถานที่</button>
                    <a class="cancel_color p-3 px-5 float-end rounded-5" href="{{ route('search_company', ['type' => $type]) }}">
                        ยกเลิก
                    </a>
                </div>
            </section>
        </form>
    </div>
@endsection
<script src="{{ asset('js/address.js') }}"></script>
