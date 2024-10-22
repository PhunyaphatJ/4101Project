@extends('student.student_layout')
@section('title', 'student_process_company_rec_add_address')
@section('student_process', 'select_menu_color')
@section('student_process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารขอความอนุเคราะห์)')
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
        <h5 class="mb-3">เพิ่มสถานที่ฝึกงาน</h5>

        <div class="mx-3">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-12">
                        <label for="password" class="form-label">ชื่อหน่วยงาน</label>
                        <input type="password" class="form-control rounded-5 ps-4" id="password" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid password is required
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="password" class="form-label">โทรศัพท์</label>
                        <input type="password" class="form-control rounded-5 ps-4" id="password" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid password is required
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="password" class="form-label">โทรสาร</label>
                        <input type="password" class="form-control rounded-5 ps-4" id="password" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid password date required
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr class="my-4">
        <h5 class="mb-3">ที่อยู่</h5>

        <div class="mx-3">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-3">
                        <label for="#" class="form-label">เลขที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" id="#" placeholder=""
                            value="" required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="#" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control rounded-5 ps-4" id="#" placeholder=""
                            value="" required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">ถนน</label>
                        <input type="text" class="form-control rounded-5 ps-4" id="#" placeholder=""
                            value="" required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">จังหวัด</label>
                        <select class="form-select rounded-5 ps-4" id="#" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid province.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">อำเภอ/เขต</label>
                        <select class="form-select rounded-5 ps-4" id="#" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid county.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">ตำบล/แขวง</label>
                        <select class="form-select rounded-5 ps-4" id="#" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid district.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control rounded-5 ps-4" id="#" placeholder=""
                            value="" required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <hr class="my-4">

        <div class="mx-3">
            <a href="student_process_company_rec_choose_address"><button
                    class="btn sumit_color p-3 px-5 float-end ms-3 rounded-5" type="submit">เพิ่มสถานที่</button></a>
            <a href="student_process_company_rec_search_address"><button
                    class="btn cancel_color p-3 px-5 float-end  rounded-5" type="submit">ยกเลิก</button></a>
        </div>

    </div>
@endsection
