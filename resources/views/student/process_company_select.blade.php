{{-- path หน้าเว็บเป็น /student/process/process_company_choose_address/{student_process_status}/{app_type} --}}
{{-- ถ้ากดปุ่ม submit ขอเอกสารส่งตัวแล้ว student_process_status จะเปลี่ยนจาก register_completed เป็น company_pending  --}}
{{-- หากต้องการทดลองใช้เมนูในขั้นตอนถัดไปให้เปลี่ยน student_process_status เป็น internship ตรง path  --}}
@extends('student.student_layout')
@section('title', 'process_company_choose_address')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@if ($type == 'with_request')
    @section('body_header', 'สถานที่ฝึกงาน(ขอเอกสารขอความอนุเคราะห์)')
@else
    @if ($type == 'without_request')
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

        #display_info {
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
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <section> {{-- แสดงข้อมูลสถานที่ฝึกงาน --}}
        <div class="card rounded-0 shadow" id="display_info">
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
                                    <p class="mb-0" style="font-size: 13px">{{ $company['company_name'] }}</p>
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
                                    <p class="mb-0" style="font-size: 13px">{{ $company['phone'] }}</p>
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
                                    @if ($company['company_id'] == 0)
                                        <p class="mb-0" style="font-size: 13px">{{ $company['address'] }}</p>
                                    @else
                                        <p class="mb-0" style="font-size: 13px">{{ $company->address->getAddress() }}</p>
                                    @endif
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
                                    <p class="mb-0" style="font-size: 13px">{{ $company['fax'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <form class="" validate method="POST"
            action="{{ route('request_document', ['type' => $type, 'application_id' => $application_id]) }}">
            @csrf
            <input type="hidden" id="company_id" name="company_id" value="{{ $company['company_id'] }}">
            @if ($application_id == null)
                <section> {{-- input รายละเอียดการฝึกงาน --}}
                    <hr class="my-4">
                    <h5 class="my-3">รายละเอียดการฝึกงาน</h5>

                    <div id="file" class="row mx-2">
                        <div class="col-6">
                            <label for="semester" class="form-label">ภาคการลงทะเบียน</label>
                            <select class="form-select rounded-5 ps-4" name="semester" id="semester" required
                                value="{{ old('semester') }}">
                                <option value="">Choose...</option>
                                <option value="1">ภาค 1</option>
                                <option value="2">ภาค 2</option>
                                <option value="s">ภาค ซัมเมอร์</option>
                                <option value="retake1">ภาคซ่อม 1</option>
                                <option value="retake2">ภาคซ่อม 2</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid district.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="years" class="form-label">ปีการศึกษา (ค.ศ)</label>
                            <input type="text" class="form-control rounded-5 ps-4" name="years" id="years"
                                pattern="[0-9]{4}" maxlength="4" minlength="4" placeholder="YYYY" required
                                value="{{ old('years') }}">
                            <div class="invalid-feedback">
                                Valid date required
                            </div>
                        </div>

                        {{-- <div class="col-3">
                                <label for="doc2" class="form-label">สำเนาแบบตอบรับ</label>
                                <input type="file" class="form-control rounded-5 ps-4" name="doc2" id="doc2" placeholder=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid is required
                                </div>
                            </div> --}}

                        <div class="col-3">
                            <label for="start_date" class="form-label">วันที่เริ่ม</label>
                            <input type="date" class="form-control rounded-5 ps-4" name="start_date" id="start_date"
                                placeholder="" required value="{{ old('start_date') }}">
                            <div class="invalid-feedback">
                                Valid date required
                            </div>
                        </div>

                        <div class="col-3">
                            <label for="end_date" class="form-label">วันที่สิ้นสุด</label>
                            <input type="date" class="form-control rounded-5 ps-4" name="end_date" id="end_date"
                                placeholder="" required value="{{ old('end_date') }}">
                            <label for="end_date" class="form-label"
                                style="font-size: 12px">(ก่อนวันสอบวันแรกของภาคการลงทะเบียน)</label>
                            <div class="invalid-feedback">
                                Valid date required
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="attend_to" class="form-label">เรียน(ผู้รับเอกสาร)</label>
                            <input type="text" class="form-control rounded-5 ps-4" name="attend_to" id="attend_to#"
                                placeholder="" required value="{{ old('attend_to') }}">
                            <div class="invalid-feedback">
                                Valid date required
                            </div>
                        </div>
                    </div>
                    <p class="text-end text-danger mb-0 me-4">COS ใช้เวลา 240 ชั่วโมง | INT ใช้เวลา 270 ชั่วโมง</p>
                    <hr class="mb-4 mt-0">
                </section>
            @endif
            @if ($type == 'request')
                <section> {{-- ปุ่ม submit สำหรับ ขอเอกสารขอความอนุเคราะห์ --}}
                    <div class="mx-3">
                        <button class="btn submit_color p-3 px-5 float-end rounded-5"
                            type="submit">ขอเอกสารขอความอนุเคราะห์</button>
                    </div>
                    <div class="mx-3">
                        <a class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" href="#">ยกเลิก</a>
                    </div>
                </section>
            @endif

            @if ($type == 'recommendation')
                <section> {{-- ปุ่มค้นพี่เลี้ยง ปุ่มเพิ่มพี่เลี้ยง และ input ข้อมูลพี่เลี้ยง --}}
                    <h5 class="my-3">ผู้รับผิดชอบ/พี่เลี้ยง</h5>

                    <div mx-3 mb-4>
                        <a class="btn submit_color rounded-5 py-2 px-4 float-end border-0 ms-4 mt-5" type="submit"
                            href="{{ route('add_mentor_form', [$type, $company['company_id'], $application_id]) }}"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="กรณีที่ไม่พบข้อมูลพี่เลี้ยงในระบบ">เพิ่มพี่เลี้ยง<i
                                class="bi bi-patch-plus ms-2" style="font-size: 18px"></i>
                        </a>
                        <label for="search" class="form-label mt-3">เลือกพี่เลี้ยง</label>
                        <span class="d-flex" role="search">
                            <input class="form-control me-2 rounded-5 px-4" type="search" placeholder="email mentor"
                                aria-label="Search" id="search" style="margin-bottom: 0%;">
                            <button class="btn rounded-5 cancel_color px-3" type=""><i
                                    class="bi bi-search"></i></button>
                        </span>
                    </div>
                </section>
                <section> {{-- แสดงข้อมูลพี่เลี้ยงในระบบที่ค้นหาได้ --}}
                    @if ($mentors == null)
                        <h5 class="my-3">ไม่พบข้อมูลพี่เลี้ยงในระบบ</h5>
                    @else
                        @foreach ($mentors as $mentor)
                            <div class="card rounded-2 shadow mb-3 mt-5">
                                <div class="card-body">
                                    <div>
                                        <div class="form-check float-end">
                                            <input class="form-check-input" type="radio" name="mentor_selection"
                                                id="mentorSelectionRadio" value="{{ $mentor['email'] }}">
                                            <label class="form-check-label" for="mentorSelectionRadio">
                                                เลือกพี่เลี้ยง
                                            </label>
                                        </div>
                                        <div class="row ">
                                            <div class="col-6 mb-3">
                                                <div class="row">
                                                    <div class="col-2 text-end">
                                                        <i class="bi bi-person-badge-fill" style="font-size: 20px"></i>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6 class="mb-0">ชื่อ</h6>
                                                        <p class="mb-0" style="font-size: 13px">
                                                            {{ $mentor['name'] }}
                                                            {{ $mentor['surname'] }}</p>
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
                                                        <p class="mb-0" style="font-size: 13px">
                                                            {{ $mentor['position'] }}</p>
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
                                                        <p class="mb-0" style="font-size: 13px">
                                                            {{ $mentor['email'] }}
                                                        </p>
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
                                                        <p class="mb-0" style="font-size: 13px">
                                                            {{ $mentor['phone'] }}
                                                        </p>
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
                                                        <p class="mb-0" style="font-size: 13px">
                                                            {{ $mentor['fax'] ?? '-' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                        @endforeach
                        {{-- {{ $mentors->links('pagination::bootstrap-4') }} --}}
                </section>
            @endif

            <section> {{-- ปุ่ม submit สำหรับ ขอเอกสารส่งตัวแบบไม่มี request และมี request --}}
                @if ($type != 'recommendation')
                    <div class="mx-3">
                        <button class="btn submit_color p-3 px-5 float-end rounded-5 disabled"
                            type="submit">ขอเอกสารส่งตัว</button>
                    </div>
                    <div class="mx-3">
                        <a class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" href="#">ย้อนกลับ</a>
                    </div>
                @else
                    <div class="mx-3">
                        <button class="btn submit_color p-3 px-5 float-end rounded-5"
                            type="submit">ขอเอกสารส่งตัว</button>
                    </div>
                    <div class="mx-3">
                        <a class="btn cancel_color p-3 px-5 me-3 float-end rounded-5" href="#">ยกเลิก</a>
                    </div>
                @endif
            </section>
            @endif
        </form>
    </div>

    {{-- สำหรับ tooltip ข้อความหมายเหตุปุ่มเพิ่มพี่เลี้ยง --}}
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
