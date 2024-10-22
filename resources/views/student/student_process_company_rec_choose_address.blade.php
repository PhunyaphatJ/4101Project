@extends('student.student_layout')
@section('title', 'student_process_company_rec_choose_address')
@section('student_process', 'select_menu_color')
@section('student_process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารขอความอนุเคราะห์)')
@section('style')
    <style>
        #bookmark_icon {
            position: absolute;
            top: 0%;
            right: 0%;
            font-size: 300%;
            translate: 0% -10%;
        }

        #bookmark_text {
            color: #000000;
            translate: 185% -90%;
        }

        #student_info {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }

        #more_info input,select {
            height: 50px;
            margin-bottom: 5%;
        }

        #file {
            margin-top: 3%;
        }
    </style>
@endsection
@section('body_content')
    <div class="card rounded-0 shadow" id="student_info">
        <div class="card-body">
            <div class="px-5 py-4">
                <h5 class="mb-0">ข้อมูลสถานที่ฝึกงาน</h5>
                <div class="row mt-4">
                    
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">
    <h5 class="my-3">รายละเอียดการฝึกงาน</h5>

    <div id="more_info" class="mx-3">
        <form class="needs-validation" novalidate>
            <div id="file" class="row">
                <div class="col-6">
                    <label for="#" class="form-label">ภาคการลงทะเบียน</label>
                    <select class="form-select rounded-5 ps-4" id="#" required>
                        <option value="">Choose...</option>
                        <option>ภาค 1</option>
                        <option>ภาค 2</option>
                        <option>ภาค s</option>
                        <option>ภาคซ่อม 1</option>
                        <option>ภาคซ่อม 2</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid district.
                    </div>
                </div>

                <div class="col-6">
                    <label for="#" class="form-label">ปีการศึกษา</label>
                    <input type="#" class="form-control rounded-5 ps-4" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid date required
                    </div>
                </div>

                <div class="col-3">
                    <label for="#" class="form-label">วันที่เริ่ม</label>
                    <input type="password" class="form-control rounded-5 ps-4" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid date required
                    </div>
                </div>

                <div class="col-3">
                    <label for="#" class="form-label">วันที่สิ้นสุด</label>
                    <input type="#" class="form-control rounded-5 ps-4" id="#" placeholder="" required>
                    <label for="#" class="form-label" style="font-size: 12px">(ก่อนวันสอบวันแรกของภาคการลงทะเบี่ยน)</label>
                    <div class="invalid-feedback">
                        Valid date required
                    </div>
                </div>

                <div class="col-6">
                    <label for="#" class="form-label">เรียน(ผู้รับเอกสาร)</label>
                    <input type="#" class="form-control rounded-5 ps-4" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid date required
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr class="my-4">

    <div class="mx-3">
        <button class="btn sumit_color p-3 px-5 float-end rounded-5" data-bs-toggle="modal" data-bs-target="#app_approval_pending"
            type="submit">ขอเอกสารขอความอนุเคราะห์</button>
    </div>
    <div class="mx-3">
        <a href="student_process_company_rec_search_address"><button class="btn cancel_color p-3 px-5 me-3 float-end rounded-5"
                type="cancel">ยกเลิก</button></a>
    </div>

    <div class="modal fade" id="app_approval_pending" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนขอฝึกงาน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>บันทึกคำขอแล้ว</p>
                    <p class="app_approval_pending_color">รอการอนุมัติจากเจ้าหน้าที่</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancel_color" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="app_accept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนขอฝึกงาน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="app_accept_color">ลงทะเบียนฝึกงานสำเร็จ</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancel_color" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="app_reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนขอฝึกงาน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="app_reject_color">ลงทะเบียนฝึกงานไม่สำเร็จ</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancel_color" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn sumit_color" data-bs-dismiss="modal">แก้ไขข้อมูล</button>
                </div>
            </div>
        </div>
    </div>

@endsection
