{{-- path หน้าเว็บเป็น /student/process/process_register_for_internship/{student_process_status} --}}
{{-- ถ้ากดปุ่มลงทะเบียนแล้ว student_process_status จะเปลี่ยนจาก no_register เป็น register_pending  --}}
{{-- หากต้องการทดลองใช้เมนูในขั้นตอนถัดไปให้เปลี่ยน student_process_status เป็น register_completed ตรง path  --}}
@extends('student.student_layout')
@section('title', 'process_register_for_internship')
@section('navbar_header', 'นักศึกษา')
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
            translate: 170% -100%;
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
    <section> {{-- แสดงข้อมูลนักศึกษา --}}
        @foreach ($students as $student)
            <div class="card rounded-0 shadow" id="display_info">
                <div class="card-body">
                    <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
                    <div class="px-5 py-4">
                        <p class="float-end " id="bookmark_text">{{ $student['department'] }}</p>
                        <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>ข้อมูลนักศึกษา</h5>
                        <div class="row mt-4 ms-4">
                            <div class="col-6 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-person-vcard-fill" style="font-size: 35px"></i>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <h6 class="mb-0">รหัสนักศึกษา</h6>
                                        <p class="mb-0" style="font-size: 13px">{{ $student['student_id'] }}</p>
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
                                        <p class="mb-0" style="font-size: 13px">{{ $student['phone'] }}</p>
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
                                        <p class="mb-0" style="font-size: 13px">{{ $student['prefix'] }}
                                            {{ $student['fname'] }} {{ $student['lname'] }}</p>
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
                                        <p class="mb-0" style="font-size: 13px">{{ $student['email'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    @if ($student_process_status == 'กำลังดำเนินการ')

        <section> {{-- input ข้อมูลและหลักฐานประกอบการพิจารณา --}}
            <hr class="my-4">
            <h5 class="my-3">ข้อมูลและหลักฐานประกอบการพิจารณา</h5>

            <div id="more_info">
                <form class="needs-validation" validate method="POST" action="{{ route('compare_internship_register') }}">
                    @csrf
                    <div id="file" class="row mx-3">

                        <div class="col-4">
                            <label for="transcript" class="form-label">ใบรายงานการเช็คเกรด</label>
                            <input type="file" class="form-control rounded-5 ps-4" name="transcript" placeholder=""
                                required>
                        </div>

                        <div class="col-4">
                            <label for="student_card" class="form-label">สำเนาบัตรนักศึกษา</label>
                            <input type="file" class="form-control rounded-5 ps-4" name="student_card" placeholder=""
                                required>
                        </div>

                        <div class="col-4">
                            <label for="recentreceipt" class="form-label">ใบเสร็จลงทะเบียนเรียนภาคล่าสุด</label>
                            <input type="file" class="form-control rounded-5 ps-4" name="recentreceipt" placeholder=""
                                required>
                        </div>
                    </div>
                    <p class="text-end text-danger mt-4 mb-0 me-4">หน่วยกิตสะสมต้องมากกว่า 100</p>
                    <hr class="mb-4 mt-0">

                    <div class="mx-3">
                        <button class="btn submit_color p-3 px-5 float-end rounded-5" type="submit">ลงทะเบียน</button>
                    </div>
                    <div class="mx-3">
                        <a href="{{ route('process_register_for_internship', 'no_register') }}"
                            class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" type="cancel">ยกเลิก</a>
                    </div>

                </form>
            </div>
        </section>
    @else
        @if (
            $student_process_status == 'register_pending' ||
                $student_process_status == 'register_completed' ||
                $student_process_status == 'company_pending' ||
                $student_process_status == 'internship')
            <section> {{-- แสดงข้อมูลและหลักฐานประกอบการพิจารณา --}}
                @foreach ($internship_register as $file)
                    <div class="card rounded-0 shadow mt-3" id="display_info">
                        <div class="card-body">
                            <div class="px-5 py-4">
                                <h5><i class="bi bi-folder-fill me-2"></i>ข้อมูลและหลักฐานประกอบการพิจารณา</h5>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-4 mb-3">
                                        <label>ใบรายงานการเช็คเกรด
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                            type="button">
                                            {{ $file['transcript'] }}<i class="bi bi-file-earmark-text ms-2"
                                                style="font-size: 30px"></i>
                                        </button>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>สำเนาบัตรนักศึกษา
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                            type="button">
                                            {{ $file['student_card'] }}<i class="bi bi-file-earmark-text ms-2"
                                                style="font-size: 30px"></i>
                                        </button>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label>ใบเสร็จลงทะเบียนเรียนภาคล่าสุด</label>
                                        {{-- เเก้ตรงนี้ --}}
                                        <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                            type="button">
                                            {{ $file['recentreceipt'] }}<i class="bi bi-file-earmark-text ms-2"
                                                style="font-size: 30px"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

            <section> {{-- ปุ่มลงทะเบียน --}}
                <hr class="my-4">

                <div class="mx-3">
                    <button class="btn submit_color p-3 px-5 float-end rounded-5 disabled" data-bs-toggle="modal"
                        data-bs-target="#app_approval_pending" type="submit">ลงทะเบียน</button>
                </div>
                <div class="mx-3">
                    <a href="{{ route('process', $student_process_status) }}"
                        class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" type="cancel">ย้อนกลับ</a>
                </div>

            </section>
        @endif

    @endif

@endsection
