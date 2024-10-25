{{-- สถานะคำร้องแบ่งเป็น 3 ประเภทคือ ขอเอกสารขอความอนุเคราะห์, ขอเอกสารส่งตัวแบบไม่ขอเอกสารขอความอนุเคราะห์, ขอเอกสารส่งตัวแบบขอเอกสารขอความอนุเคราะห์ --}}
@extends('student.student_layout')
@section('title', 'student_process_company_choose_address')
@section('student_process', 'select_menu_color')
@section('student_process_company', 'select_menu_color')
@if ($app_type == 'request')
    @section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารขอความอนุเคราะห์)')
@else
    @if ($app_type == 'rec_no_request' || $app_type == 'rec_with_request')
        @section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารส่งตัว)')
    @endif
@endif
@section('style')
    <style>
        #bookmark_icon {
            position: absolute;
            top: 0%;
            right: 0%;
            font-size: 300%;
            translate: 0% -10%;
        }

        #company_info {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }

        input,
        select {
            height: 50px;
            margin-bottom: 5%;
        }
    </style>
@endsection
@section('body_content')
    <div class="card rounded-0 shadow" id="company_info">
        <div class="card-body">
            <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
            <div class="px-5 py-4">
                <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>ข้อมูลสถานที่ฝึกงาน</h5>
                <div class="row mt-4 ms-4">
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-building-fill" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">ชื่อหน่วยงาน</h6>
                                <p class="mb-0" style="font-size: 13px">บริษัท xxx จำกัด</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-telephone-fill" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">โทรศัพท์</h6>
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-pin-map-fill" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">ที่อยู่</h6>
                                <p class="mb-0" style="font-size: 13px">a หมู่ที่ b ถนน c อำเภอ/เขต d ตำบล/แขง e จังหวัด f
                                    รหัสไปรษณีย์ g เบอร์โทรศัพท์ xxx เบอร์โทรสาร xxx</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-printer-fill" style="font-size: 35px"></i>
                            </div>
                            <div class="col-8 mt-2">
                                <h6 class="mb-0">โทรสาร</h6>
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($app_type == 'request' || $app_type == 'rec_no_request')
        <hr class="my-4">
        <h5 class="my-3">รายละเอียดการฝึกงาน</h5>

        <div class="mx-3">
            <form class="needs-validation" novalidate>
                <div id="file" class="row">
                    <div class="col-6">
                        <label for="semester" class="form-label">ภาคการลงทะเบียน</label>
                        <select class="form-select rounded-5 ps-4" id="semester" required>
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

                    @if ($app_type == 'request')
                        <div class="col-6">
                            <label for="years" class="form-label">ปีการศึกษา</label>
                            <input type="text" class="form-control rounded-5 ps-4" id="years" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Valid date required
                            </div>
                        </div>
                    @else
                        @if ($app_type == 'rec_no_request')
                            <div class="col-3">
                                <label for="years" class="form-label">ปีการศึกษา</label>
                                <input type="text" class="form-control rounded-5 ps-4" id="years" placeholder=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid date required
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="doc2" class="form-label">สำเนาแบบตอบรับ</label>
                                <input type="file" class="form-control rounded-5 ps-4" id="doc2" placeholder=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid is required
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="col-3">
                        <label for="start_date" class="form-label">วันที่เริ่ม</label>
                        <input type="date" class="form-control rounded-5 ps-4" id="start_date" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid date required
                        </div>
                    </div>

                    <div class="col-3">
                        <label for="end_date" class="form-label">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control rounded-5 ps-4" id="end_date" placeholder="" required>
                        <label for="end_date" class="form-label"
                            style="font-size: 12px">(ก่อนวันสอบวันแรกของภาคการลงทะเบี่ยน)</label>
                        <div class="invalid-feedback">
                            Valid date required
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="attend_to" class="form-label">เรียน(ผู้รับเอกสาร)</label>
                        <input type="text" class="form-control rounded-5 ps-4" id="attend_to#" placeholder=""
                            required>
                        <div class="invalid-feedback">
                            Valid date required
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <p class="text-end text-danger mb-0 me-4">COS ใช้เวลา 240 ชั่วโมง | INT ใช้เวลา 270 ชั่วโมง</p>
        <hr class="mb-4 mt-0">
    @else
        @if ($app_type == 'rec_with_request')
            <div class="card rounded-0 shadow mt-3" id="company_info">
                <div class="card-body">
                    <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
                    <div class="px-5 py-4">
                        <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>รายละเอียดการฝึกงาน</h5>
                        <div class="row mt-4 ms-4">
                            <div class="col-6 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-pin" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">ภาคการลงทะเบียน</h6>
                                        <p class="mb-0" style="font-size: 13px">0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-award" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">ปีการศึกษา</h6>
                                        <p class="mb-0" style="font-size: 13px">0000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-calendar" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">วันที่เริ่ม - วันที่สิ้นสุด</h6>
                                        <p class="mb-0" style="font-size: 13px">00/00/00 - 00/00/00 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-person-lines-fill" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">ชื่อผู้รับเอกสาร</h6>
                                        <p class="mb-0" style="font-size: 13px">xxx xxx</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
        @endif
    @endif

    @if ($app_type == 'request')

        <div class="mx-3">
            <button class="btn submit_color p-3 px-5 float-end rounded-5" data-bs-toggle="modal"
                data-bs-target="#app_approval_pending" type="submit">ขอเอกสารขอความอนุเคราะห์</button>
        </div>
        <div class="mx-3">
            <a href="student_process_company_search_address"><button
                    class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" type="cancel">ยกเลิก</button></a>
        </div>

        <div class="modal fade" id="app_approval_pending" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ขอเอกสารขอความอนุเคราะห์</h1>
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
    @else
        @if ($app_type == 'rec_no_request' || $app_type == 'rec_with_request')
            <h5 class="my-3">ผู้รับผิดชอบ/พี่เลี้ยง</h5>

            <div class="mx-3 mb-4">
                <div>
                    <div class="btn float-end border-0 mt-5" type="submit" data-bs-toggle="modal"
                        data-bs-target="#register_mentor" style="width:25%">
                        <button class="btn submit_color rounded-5 py-2 px-4" type="submit" style="padding: 1.6% 3%"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="กรณีที่ไม่พบข้อมูลพี่เลี้ยงในระบบ">เพิ่มพี่เลี้ยง<i
                                class="bi bi-patch-plus ms-2" style="font-size: 18px"></i></button>
                    </div>
                    <label for="search" class="form-label mt-3">เลือกพี่เลี้ยง</label>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 rounded-5 px-4" type="search" placeholder="email mentor"
                            aria-label="Search" id="search" style="margin-bottom: 0%;">
                        <button class="btn rounded-5 cancel_color px-3" type=""><i
                                class="bi bi-search"></i></button>
                    </form>
                </div>
                <div class="modal fade" id="register_mentor" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content rounded-4">
                            <div class="modal-header p-5 pb-4 border-bottom-0">
                                <h3 class="fw-bold mb-0">เพิ่มข้อมูลพี่เลี้ยง</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5 py-4">
                                <form class="">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-cone-striped" style="font-size: 40px"></i>
                                        </div>
                                        <div class="col-10 form-floating">
                                            <input type="text" class="form-control rounded-5 ps-4" id="fname"
                                                placeholder="ชื่อ">
                                            <label class="ps-5 bg-transparent" for="fname">ชื่อ</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-highlighter" style="font-size: 40px"></i>
                                        </div>
                                        <div class="col-10 form-floating">
                                            <input type="text" class="form-control rounded-5 ps-4" id="lname"
                                                placeholder="นามสกุล">
                                            <label class="ps-5 bg-transparent" for="lname">นามสุล</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-envelope-open" style="font-size: 40px"></i>
                                        </div>
                                        <div class="col-10 form-floating">
                                            <input type="email" class="form-control rounded-5 ps-4" id="email"
                                                placeholder="name@example.com">
                                            <label class="ps-5 bg-transparent" for="email">Email address</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-pc-display" style="font-size: 40px"></i>
                                        </div>
                                        <div class="col-10 form-floating">
                                            <input type="text" class="form-control rounded-5 ps-4" id="position"
                                                placeholder="ตำแหน่ง">
                                            <label class="ps-5 bg-transparent" for="position">ตำแหน่ง</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-telephone" style="font-size: 40px"></i>
                                        </div>
                                        <div class="col-10 form-floating">
                                            <input type="tel" class="form-control rounded-5 ps-4" id="phone"
                                                placeholder="โทรศัพท์">
                                            <label class="ps-5 bg-transparent" for="phone">โทรศัพท์</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-printer" style="font-size: 40px"></i>
                                        </div>
                                        <div class="col-10 form-floating">
                                            <input type="tel" class="form-control rounded-5 ps-4" id="fax"
                                                placeholder="โทรสาร">
                                            <label class="ps-5 bg-transparent" for="fax">โทรสาร</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn cancel_color rounded-5 py-2 px-4"
                                    data-bs-dismiss="modal">ปิด</button>
                                <button type="button" class="btn submit_color rounded-5 py-3 px-5"
                                    data-bs-dismiss="modal" type="submit">เพิ่ม<i
                                        class="bi bi-floppy2 ms-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card rounded-2 shadow mb-3">
                <div class="card-body">
                    <div>
                        <a href="student_process_company_choose_address"
                            class="btn sidebar_color float-end rounded-5">เลือกพี่เลี้ยง</a>
                        <div class="row ">
                            <div class="col-6 mb-3">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-person-badge-fill" style="font-size: 20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">ชื่อ</h6>
                                        <p class="mb-0" style="font-size: 13px">xxx xxx </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-pc-display" style="font-size: 20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">ตำแหน่ง</h6>
                                        <p class="mb-0" style="font-size: 13px">ตำแหน่ง</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-envelope-open-fill" style="font-size: 20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">Email</h6>
                                        <p class="mb-0" style="font-size: 13px">name@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-telephone-fill" style="font-size: 20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">โทรศัพท์</h6>
                                        <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-printer-fill" style="font-size:20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">โทรสาร</h6>
                                        <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            @if ($app_type == 'rec_no_request')
                <div class="modal fade" id="app_approval_pending" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ขอเอกสารส่งตัว</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p>บันทึกคำขอแล้ว</p>
                                <p class="app_approval_pending_color">รอการอนุมัติจากเจ้าหน้าที่</p>
                            </div>
                            <div class="modal-footer">
                                <a class="cancel_color py-3 px-4 rounded-5"
                                    href="/student/company_pending/rec_no_request/student_process_company_choose_address">ปิด</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @if ($app_type == 'rec_with_request')
                    <div class="modal fade" id="app_approval_pending" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">ขอเอกสารส่งตัว</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p>บันทึกคำขอแล้ว</p>
                                    <p class="app_approval_pending_color">รอการอนุมัติจากเจ้าหน้าที่</p>
                                </div>
                                <div class="modal-footer">
                                    <a class="cancel_color py-3 px-4 rounded-5"
                                        href="/student/company_pending/rec_with_request/student_process_company_choose_address">ปิด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            @if ($student_process_status == 'company_pending')
                <div class="mx-3">
                    <button class="btn submit_color p-3 px-5 float-end rounded-5 disabled" data-bs-toggle="modal"
                        data-bs-target="#app_approval_pending" type="submit">ขอเอกสารส่งตัว</button>
                </div>
                <div class="mx-3">
                    <a href="student_process_company_search_address"><button
                            class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" type="cancel">ย้อนกลับ</button></a>
                </div>
            @else
                <div class="mx-3">
                    <button class="btn submit_color p-3 px-5 float-end rounded-5" data-bs-toggle="modal"
                        data-bs-target="#app_approval_pending" type="submit">ขอเอกสารส่งตัว</button>
                </div>
                <div class="mx-3">
                    <a href="student_process_company_search_address"><button
                            class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" type="cancel">ยกเลิก</button></a>
                </div>
            @endif
        @endif
    @endif

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
