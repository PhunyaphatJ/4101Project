{{-- path หน้าเว็บเป็น /student/process/process_company_add_address/{student_process_status}/{app_type} --}}
@extends('student.student_layout')
@section('title', 'process_company_add_address')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@if ($app_type == 'request')
    @section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารขอความอนุเคราะห์)')
@else
    @if ($app_type == 'rec_no_request' || $app_type == 'rec_with_request')
        @section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารส่งตัว)')
    @endif
@endif
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
    <div class="container">
        <form class="needs-validation" validate method="POST" action="{{ route('compare_company', [$student_process_status, $app_type]) }}">
            @csrf
            <section> {{-- input ข้อมูลสถานที่ฝึกงาน --}}
                <h5 class="mb-3">เพิ่มสถานที่ฝึกงาน</h5>

                <div class="row mx-2">
                    <div class="col-12">
                        <label for="company_name" class="form-label">ชื่อหน่วยงาน</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="company_name" placeholder=""
                            required>
                    </div>

                    <div class="col-6">
                        <label for="phone" class="form-label">โทรศัพท์</label>
                        <input type="tel" class="form-control rounded-5 ps-4" name="phone" placeholder=""
                            required>
                    </div>

                    <div class="col-6">
                        <label for="fax" class="form-label">โทรสาร</label>
                        <input type="tel" class="form-control rounded-5 ps-4" name="fax" placeholder=""
                            required>
                    </div>
                </div>
            </section>

            <section> {{-- input ที่อยู่สถานที่ฝึกงาน --}}
                <hr class="my-4">
                <h5 class="mb-3">ที่อยู่</h5>

                <div class="row mx-2">
                    <div class="col-3">
                        <label for="house_no" class="form-label">เลขที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="house_no" placeholder=""
                            value="" required>
                    </div>
                    <div class="col-3">
                        <label for="village_no" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="village_no" placeholder=""
                            value="" required>
                    </div>
                    <div class="col-6">
                        <label for="road" class="form-label">ถนน</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="road" placeholder=""
                            value="" required>
                    </div>
                    <div class="col-6">
                        <label for="province" class="form-label">จังหวัด</label>
                        <select class="form-select rounded-5 ps-4" name="province" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="district" class="form-label">อำเภอ/เขต</label>
                        <select class="form-select rounded-5 ps-4" name="district" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                        <select class="form-select rounded-5 ps-4" name="sub_district" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="postcode" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control rounded-5 ps-4" name="postcode" placeholder=""
                            value="" required>
                    </div>
                </div>
            </section>

            <section> {{-- ปุ่ม เพิ่มสถานที่ --}}
                <hr class="my-4">

                <div class="mx-3">
                    <button
                            class="btn submit_color p-3 px-5 float-end ms-3 rounded-5"
                            type="submit">เพิ่มสถานที่</button>
                    <a class=" cancel_color p-3 px-5 float-end  rounded-5"
                        href="{{ route('process_company_search_address', [$student_process_status, $app_type]) }}">ยกเลิก</a>
                </div>
            </section>
        </form>
    </div>
@endsection
