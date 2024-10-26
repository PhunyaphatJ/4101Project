{{-- path หน้าเว็บเป็น /student/process/process_company_add_address/{student_process_status}/{app_type} --}}
@extends('student.student_layout')
@section('title', 'process_company_add_address')
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
        <section> {{-- input ข้อมูลสถานที่ฝึกงาน --}}
            <h5 class="mb-3">เพิ่มสถานที่ฝึกงาน</h5>

            <div class="mx-3">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-12">
                            <label for="company_name" class="form-label">ชื่อหน่วยงาน</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="company_name" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Valid password is required
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="phone" class="form-label">โทรศัพท์</label>
                            <input type="tel" class="form-control rounded-5 ps-4" id="phone" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Valid password is required
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="fax" class="form-label">โทรสาร</label>
                            <input type="tel" class="form-control rounded-5 ps-4" id="fax" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Valid password date required
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section> {{-- input ที่อยู่สถานที่ฝึกงาน --}}
            <hr class="my-4">
            <h5 class="mb-3">ที่อยู่</h5>

            <div class="mx-3">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-3">
                            <label for="house_no" class="form-label">เลขที่</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="house_no" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid is required.
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="village_no" class="form-label">หมู่ที่</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="village_no" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid is required.
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="road" class="form-label">ถนน</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="road" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid is required.
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="province" class="form-label">จังหวัด</label>
                            <select class="form-select rounded-5 ps-4" id="province" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid province.
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="district" class="form-label">อำเภอ/เขต</label>
                            <select class="form-select rounded-5 ps-4" id="district" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid district.
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                            <select class="form-select rounded-5 ps-4" id="sub_district" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid sub district.
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="postcode" class="form-label">รหัสไปรษณีย์</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="postcode" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid is required.
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>

        <section> {{-- ปุ่ม submit --}}
            <hr class="my-4">

            <div class="mx-3">
                <a href="/student/process/process_company_choose_address/{{ $student_process_status }}/{{ $app_type }}"><button
                        class="btn submit_color p-3 px-5 float-end ms-3 rounded-5" type="submit">เพิ่มสถานที่</button></a>
                <a href="/student/process/process_company_search_address/{{ $student_process_status }}/{{ $app_type }}"><button
                        class="btn cancel_color p-3 px-5 float-end  rounded-5" type="submit">ยกเลิก</button></a>
            </div>
        </section>

    </div>
@endsection
