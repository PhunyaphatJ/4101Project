{{-- path หน้าเว็บเป็น /student/register --}}
@extends('ui_layout.login_layout')
@section('title', 'register')
@section('register', 'select_menu_color')
@section('body_header', 'Register')
@section('style')
    <style>
        #register input,
        select {
            height: 50px;
            margin-bottom: 5%;
        }

        #form-check input {
            height: 18px;
        }
    </style>

@endsection
@section('body_content')
    <div id="register" class="container">
        <section> {{-- input ข้อมูลนักศึกษา --}}
            <h5 class="mb-3">ข้อมูลนักศึกษา</h5>

            <div class="mx-3">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <label for="prefix" class="form-label col-6">คำนำหน้า</label>
                        <label for="department" class="form-label col-6">สาขาวิชา</label>
                        <div id="form-check" class="form-check col-2">
                            <input id="mr" name="prefix" type="radio" class="form-check-input ms-1" required>
                            <label class="form-check-label ms-1" for="mr">นาย</label>
                        </div>
                        <div id="form-check" class="form-check col-2">
                            <input id="mrs" name="prefix" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="mrs">นาง</label>
                        </div>
                        <div id="form-check" class="form-check col-2">
                            <input id="miss" name="prefix" type="radio" class="form-check-input"
                                style="translate: -200% 0%" required>
                            <label class="form-check-label" for="mrs" style="translate: -70% 0%">นางสาว</label>
                        </div>

                        <div class="col-6">
                            <select class="form-select rounded-5 ps-4" id="department" required>
                                <option value="">COS</option>
                                <option>INT</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="fname" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="fname" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="student_id" class="form-label">รหัสนักศึกษา</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="student_id" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid student id is required.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="lname" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="lname" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="tel" class="form-control rounded-5 ps-4" id="phone" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid phone number is required.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section> {{-- input ข้อมูลที่อยู่ --}}
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
                            <input type="number" class="form-control rounded-5 ps-4" id="village_no" placeholder=""
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

        <section> {{-- input ข้อมูล account --}}
            <hr class="my-4">
            <h5 class="mb-3">Accout</h5>

            <div class="mx-3">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-5 ps-4" id="email"
                                placeholder="0000000000@rumail.ru.ac.th" required>
                            <div class="invalid-feedback">
                                Valid email is required
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control rounded-5 ps-4" id="password" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Valid password is required
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="password" class="form-label">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control rounded-5 ps-4" id="password" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Valid password date required
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section> {{-- ปุ่ม register จะเซทค่าดั้งนี้ student_process_status = no_register, app_type = no_app, report = no_report--}}
            <hr class="my-4">

            <div class="mx-3">
                <a href="/student/no_register/no_app/no_report/student_manual"><button
                        class="btn submit_color p-3 px-5 float-end  rounded-5" type="submit">Register</button></a>
            </div>
        </section>

    </div>
@endsection
