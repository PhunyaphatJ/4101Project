@extends('student.student_layout')
@section('title', 'process_register_for_internship')
@section('student_process', 'select_menu_color')
@section('process_register_for_internship', 'select_menu_color')
@section('body_header', 'ลงทะเบียนขอฝึกงาน')
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

        #more_info input {
            height: 50px;
            /* margin-bottom: 5%; */
        }

        #file {
            margin-top: 3%;
        }
    </style>
@endsection
@section('body_content')
    <div class="card rounded-0 shadow" id="student_info">
        <div class="card-body">
            <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
            <div class="px-5 py-4">
                <p class="float-end " id="bookmark_text">COS</p>
                <h5 class="mb-0">ข้อมูลนักศึกษา</h5>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-person-badge-fill" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">0000000000</h6>
                                <p class="mb-0" style="font-size: 13px">นางสาว xxx xxxx</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-chat-square-dots-fill mt-1" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8">
                                <h6 class="mb-0">ติดต่อ</h6>
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                                <p class="mb-0" style="font-size: 13px">0000000000@rumail.ru.ac.th</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">
    <h5 class="my-3">ข้อมูลและหลักฐานประกอบการพิจารณา</h5>

    <div id="more_info" class="mx-3">
        <form class="needs-validation" novalidate>
            <div id="file" class="row">
                <div class="col-4">
                    <label for="#" class="form-label">ใบรายงานการเช็คเกรด</label>
                    <input type="file" class="form-control rounded-5 ps-4" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid is required
                    </div>
                </div>

                <div class="col-4">
                    <label for="#" class="form-label">บัตรนักศึกษา</label>
                    <input type="file" class="form-control rounded-5 ps-4" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid is required
                    </div>
                </div>

                <div class="col-4">
                    <label for="#" class="form-label">ใบเสร็จลงทะเบียนเรียนภาคล่าสุด</label>
                    <input type="file" class="form-control rounded-5 ps-4" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid is required
                    </div>
                </div>
            </div>
        </form>
    </div>
    <p class="text-end text-danger mt-4 mb-0 me-4">หน่วยกิตสะสมต้องมากกว่า 100</p>
    <hr class="mb-4 mt-0">

    <div class="mx-3">
        <button class="btn sumit_color p-3 px-5 float-end rounded-5" data-bs-toggle="modal" data-bs-target="#app_approval_pending"
            type="submit">ลงทะเบียน</button>
    </div>
    <div class="mx-3">
        <a href="/student_process"><button class="btn cancel_color p-3 px-5 me-3 float-end rounded-5"
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
