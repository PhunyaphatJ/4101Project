{{-- path หน้าเว็บเป็น /student/process/process_register_for_internship/{student_process_status} --}}
{{-- ถ้ากดปุ่มลงทะเบียนแล้ว student_process_status จะเปลี่ยนจาก no_register เป็น register_pending  --}}
{{-- หากต้องการทดลองใช้เมนูในขั้นตอนถัดไปให้เปลี่ยน student_process_status เป็น register_completed ตรง path  --}}
@extends('student.student_layout')
@section('title', 'process_register_for_internship')
@section('process', 'select_menu_color')
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

        #display_info {
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
    @if ($student_process_status == 'no_register' || $student_process_status == 'register_pending')
        <section> {{-- แสดงข้อมูลนักศึกษา --}}
            <div class="card rounded-0 shadow" id="display_info">
                <div class="card-body">
                    <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
                    <div class="px-5 py-4">
                        <p class="float-end " id="bookmark_text">COS</p>
                        <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>ข้อมูลนักศึกษา</h5>
                        <div class="row mt-4 ms-4">
                            <div class="col-6 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-person-vcard-fill" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">รหัสนักศึกษา</h6>
                                        <p class="mb-0" style="font-size: 13px">0000000000</p>
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
                                        <i class="bi bi-person-bounding-box" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">ชื่อ</h6>
                                        <p class="mb-0" style="font-size: 13px">นางสาว xxx xxxx</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-envelope-open-fill" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">email</h6>
                                        <p class="mb-0" style="font-size: 13px">0000000000@rumail.ru.ac.th</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section> {{-- input ข้อมูลและหลักฐานประกอบการพิจารณา --}}
            <hr class="my-4">
            <h5 class="my-3">ข้อมูลและหลักฐานประกอบการพิจารณา</h5>

            <div id="more_info" class="mx-3">
                <form class="needs-validation" validate>
                    <div id="file" class="row">

                        <div class="col-4">
                            <label for="transcript" class="form-label">ใบรายงานการเช็คเกรด</label>
                            <input type="file" class="form-control rounded-5 ps-4" id="transcript" placeholder=""
                                required>
                        </div>

                        <div class="col-4">
                            <label for="student_card" class="form-label">สำเนาบัตรนักศึกษา</label>
                            <input type="file" class="form-control rounded-5 ps-4" id="student_card" placeholder=""
                                required>
                        </div>

                        <div class="col-4">
                            <label for="recentreceipt" class="form-label">ใบเสร็จลงทะเบียนเรียนภาคล่าสุด</label>
                            <input type="file" class="form-control rounded-5 ps-4" id="recentreceipt" placeholder=""
                                required>
                        </div>
                    </div>
                    <p class="text-end text-danger mt-4 mb-0 me-4">หน่วยกิตสะสมต้องมากกว่า 100</p>
                    <hr class="mb-4 mt-0">
                    @if ($student_process_status == 'no_register')
                        <div class="mx-3">
                            <button class="btn cancel_color p-3 px-5 float-end rounded-5" type="submit">ยืนยัน</button>
                        </div>
                        <div class="mx-3">
                            <a href="/student/process/{{ $student_process_status }}"
                                class="btn btn-secondary p-3 px-5 me-3 float-end rounded-5" type="cancel">ยกเลิก</a>
                        </div>
                    @endif
                </form>
            </div>
        </section>

        <section> {{-- ปุ่มลงทะเบียน --}}
            @if ($student_process_status == 'no_register')
                <div class="mx-3">
                    <button class="btn submit_color p-3 px-5 float-end rounded-5" data-bs-toggle="modal"
                        data-bs-target="#app_approval_pending" type="submit">ลงทะเบียน</button>
                </div>
                <div class="mx-3">
                    <a href="/student/process/{{ $student_process_status }}"
                        class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" type="cancel">ยกเลิก</a>
                </div>
            @else
                @if (
                    $student_process_status == 'register_pending' ||
                        $student_process_status == 'register_completed' ||
                        $student_process_status == 'company_pending' ||
                        $student_process_status == 'internship')
                    <div class="mx-3">
                        <button class="btn submit_color p-3 px-5 float-end rounded-5 disabled" data-bs-toggle="modal"
                            data-bs-target="#app_approval_pending" type="submit">ลงทะเบียน</button>
                    </div>
                    <div class="mx-3">
                        <a href="/student/process/{{ $student_process_status }}"
                            class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" type="cancel">ย้อนกลับ</a>
                    </div>
                @endif

            @endif

            <div class="modal fade" id="app_approval_pending" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ลงทะเบียนขอฝึกงาน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <p>บันทึกคำขอแล้ว</p>
                            <p class="app_approval_pending_color">รอการอนุมัติจากเจ้าหน้าที่</p>
                        </div>
                        <div class="modal-footer">
                            <a class="cancel_color py-3 px-4 rounded-5"
                                href="{{ route('process_register_for_internship', 'register_pending') }}">ปิด</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        @if (
            $student_process_status == 'register_completed' ||
                $student_process_status == 'company_pending' ||
                $student_process_status == 'internship')
            <section> {{-- แสดงข้อมูลนักศึกษา --}}
                <div class="card rounded-0 shadow" id="display_info">
                    <div class="card-body">
                        <div class="px-5 py-4">
                            <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>ข้อมูลนักศึกษา</h5>
                            <div class="row mt-4 ms-4">
                                <div class="col-6 mb-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-person-vcard-fill" style="font-size: 35px"></i>
                                        </div>
                                        <div class="col-8 mt-2">
                                            <h6 class="mb-0">รหัสนักศึกษา</h6>
                                            <p class="mb-0" style="font-size: 13px">0000000000</p>
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
                                            <i class="bi bi-person-bounding-box" style="font-size: 35px"></i>
                                        </div>
                                        <div class="col-8 mt-2">
                                            <h6 class="mb-0">ชื่อ</h6>
                                            <p class="mb-0" style="font-size: 13px">นางสาว xxx xxxx</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-envelope-open-fill" style="font-size: 35px"></i>
                                        </div>
                                        <div class="col-8 mt-2">
                                            <h6 class="mb-0">email</h6>
                                            <p class="mb-0" style="font-size: 13px">0000000000@rumail.ru.ac.th</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section> {{-- แสดงข้อมูลและหลักฐานประกอบการพิจารณา --}}
                <div class="card rounded-0 shadow mt-3" id="display_info">
                    <div class="card-body">
                        <div class="px-5 py-4">
                            <h5><i class="bi bi-folder-fill me-2"></i>ข้อมูลและหลักฐานประกอบการพิจารณา</h5>
                            <div class="row justify-content-center mt-4">
                                <div class="col-4 mb-3">
                                    <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                        type="button">
                                        ใบรายงานการเช็คเกรด<i class="bi bi-file-earmark-text ms-2"
                                            style="font-size: 30px"></i>
                                    </button>
                                </div>
                                <div class="col-4 mb-3">
                                    <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                        type="button">
                                        สำเนาบัตรนักศึกษา<i class="bi bi-file-earmark-text ms-2"
                                            style="font-size: 30px"></i>
                                    </button>
                                </div>
                                <div class="col-4 mb-3">
                                    <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                        type="button">
                                        ใบเสร็จลงทะเบียนเรียนภาคล่าสุด<i class="bi bi-file-earmark-text ms-2"
                                            style="font-size: 30px"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif

@endsection
