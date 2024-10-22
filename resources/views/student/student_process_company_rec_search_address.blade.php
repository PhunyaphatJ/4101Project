@extends('student.student_layout')
@section('title', 'student_process_company_rec_search_address')
@section('student_process', 'select_menu_color')
@section('student_process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารขอความอนุเคราะห์)')
@section('style')
    <style>
        input,
        select {
            height: 50px;
        }

        select {
            margin-bottom: 10%;
        }

        #search_button {
            font-size: 18px;
            position: absolute;
            right: 30%;
            margin-top: 0.5%;
        }
    </style>
@endsection
@section('body_content')
    <form>
        <div class="row">
            <div class="col-4">
                <label for="#" class="form-label">จังหวัด</label>
                <select class="form-select rounded-5 ps-4" id="#">
                    <option value="">Choose...</option>
                    <option>United States</option>
                </select>
            </div>
            <div class="col-4">
                <label for="#" class="form-label">อำเภอ/เขต</label>
                <select class="form-select rounded-5 ps-4" id="#">
                    <option value="">Choose...</option>
                    <option>United States</option>
                </select>
            </div>
            <div class="col-4">
                <label for="#" class="form-label">ตำบล/แขวง</label>
                <select class="form-select rounded-5 ps-4" id="#">
                    <option value="">Choose...</option>
                    <option>United States</option>
                </select>
            </div>
        </div>
    </form>

    <div>
        <a class="btn sumit_color float-end ms-4 rounded-5" type="button" style="padding: 1.6% 3%"
            data-bs-toggle="tooltip" data-bs-placement="bottom"
            data-bs-title="กรณีที่ไม่พบสถานที่ฝึกงานที่ต้องการ" href="student_process_company_rec_add_address">เพิ่มสถานที่<i class="bi bi-patch-plus ms-2"
                style="font-size: 18px"></i></a>
        <form class="d-flex" role="search">
            <input class="form-control me-2 pe-5 rounded-5 ps-4" type="search" placeholder="ชื่อสถานที่" aria-label="Search">
            <button id="search_button" class="btn" type=""><i class="bi bi-search"></i></button>
        </form>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection

@section('out_body_header', 'รายการสถานที่ฝึกงาน')
@section('out_body_content')
    <div class="card my-2">
        <div class="card-body">
            <h6 class="card-title"><i class="bi bi-pin-map-fill me-2"></i>ชื่อสถานที่</h6>
            <a href="student_process_company_rec_choose_address" class="btn sumit_color float-end ms-4 rounded-5">เลือกสถานที่</a>
            <p class="card-text mx-2" style="font-size: 14px">ที่อยู่ a หมู่ที่ b ถนน c  อำเภอ/เขต d ตำบล/แขง e จังหวัด f รหัสไปรษณีย์ g
                เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx</p>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-body">
            <h6 class="card-title"><i class="bi bi-pin-map-fill me-2"></i>ชื่อสถานที่</h6>
            <a href="student_process_company_rec_choose_address" class="btn sumit_color float-end ms-4 rounded-5">เลือกสถานที่</a>
            <p class="card-text mx-2" style="font-size: 14px">ที่อยู่ a หมู่ที่ b ถนน c  อำเภอ/เขต d ตำบล/แขง e จังหวัด f รหัสไปรษณีย์ g
                เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx</p>
        </div>
    </div>
@endsection
