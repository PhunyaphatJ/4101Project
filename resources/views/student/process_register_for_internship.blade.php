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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section> {{-- แสดงข้อมูลนักศึกษา --}}
        <div class="card rounded-0 shadow" id="display_info">
            <div class="card-body">
                <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
                <div class="px-5 py-4">
                    <p class="float-end " id="bookmark_text">{{ Auth::user()->person->student->department }}</p>
                    <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>ข้อมูลนักศึกษา</h5>
                    @if ($application != null)
                    <br>
                        <div>
                            <h6 style="display: inline-block" class=" me-2">สถานะการลงทะเบียน: {{ $application->application_status }}</h6>
                            @if ($application->application_status == 'reject')
                                <h6 style="display: inline-block" class=" me-2">เหตุผล: {{ $application->notification->details }}</h6>
                            @endif
                        </div>
                    @endif
                    <div class="row mt-4 ms-4">
                        <div class="col-6 mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <i class="bi bi-person-vcard-fill" style="font-size: 35px"></i>
                                </div>
                                <div class="col-8 mt-2">
                                    <h6 class="mb-0">รหัสนักศึกษา</h6>
                                    <p class="mb-0" style="font-size: 13px">
                                        {{ Auth::user()->person->student->student_id }}</p>
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
                                    <p class="mb-0" style="font-size: 13px">{{ Auth::user()->person->phone }}</p>
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
                                    <p class="mb-0" style="font-size: 13px">{{ Auth::user()->person->prefix }}
                                        {{ Auth::user()->person->name }} {{ Auth::user()->person->surname }}</p>
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
                                    <p class="mb-0" style="font-size: 13px">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (
        (Auth::user()->person->student->evidence != null || Auth::user()->person->student->student_type != 'no_register') &&
            $application->application_status != 'reject')
        <section> {{-- Display information and evidence for consideration --}}
            <div class="card rounded-0 shadow mt-3" id="display_info">
                <div class="card-body">
                    <div class="px-5 py-4">
                        <h5><i class="bi bi-folder-fill me-2"></i>ข้อมูลและหลักฐานประกอบการพิจารณา</h5>
                        <div class="row justify-content-center mt-4">
                            <div class="col-4 mb-3">
                                <a href="{{ asset('storage/' . Auth::user()->person->student->evidence->transcript_path) }}"
                                    class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                    target="_blank">
                                    ใบรายงานการเช็คเกรด
                                    <i class="bi bi-file-earmark-text ms-2" style="font-size: 30px"></i>
                                </a>
                            </div>
                            <div class="col-4 mb-3">
                                <a href="{{ asset('storage/' . Auth::user()->person->student->evidence->idcard_path) }}"
                                    class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                    target="_blank">
                                    สำเนาบัตรนักศึกษา
                                    <i class="bi bi-file-earmark-text ms-2" style="font-size: 30px"></i>
                                </a>
                            </div>
                            <div class="col-4 mb-3">
                                <a href="{{ asset('storage/' . Auth::user()->person->student->evidence->recentreceipt_path) }}"
                                    class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                    target="_blank">
                                    ใบเสร็จลงทะเบียนเรียนภาคล่าสุด
                                    <i class="bi bi-file-earmark-text ms-2" style="font-size: 30px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section> {{-- ปุ่มลงทะเบียน --}}
            <hr class="my-4">

            <div class="mx-3">
                <button class="btn submit_color p-3 px-5 float-end rounded-5 disabled" data-bs-toggle="modal"
                    data-bs-target="#app_approval_pending" type="submit">ลงทะเบียน</button>
            </div>
            <div class="mx-3">
                <a href="{{ route('process') }}" class="btn cancel_color p-3 px-5 me-3 float-end rounded-5"
                    type="cancel">ย้อนกลับ</a>
            </div>

        </section>
    @else
        <section> {{-- input ข้อมูลและหลักฐานประกอบการพิจารณา --}}
            <hr class="my-4">
            <h5 class="my-3">ข้อมูลและหลักฐานประกอบการพิจารณา</h5>

            <div id="more_info">
                <form class="needs-validation" enctype="multipart/form-data" validate method="POST"
                    action="{{ route('process_register_for_internship') }}">
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
                            <input type="file" class="form-control rounded-5 ps-4" name="recentreceipt"
                                placeholder="" required>
                        </div>
                    </div>
                    <p class="text-end text-danger mt-4 mb-0 me-4">หน่วยกิตสะสมต้องมากกว่า 100</p>
                    <hr class="mb-4 mt-0">

                    <div class="mx-3">
                        <button class="btn submit_color p-3 px-5 float-end rounded-5" type="submit">ลงทะเบียน</button>
                    </div>
                    <div class="mx-3">
                        <a href="{{ route('process') }}" class="btn cancel_color p-3 px-5 me-3 float-end rounded-5"
                            type="cancel">ยกเลิก</a>
                    </div>

                </form>
            </div>
        </section>
    @endif
@endsection
