{{-- path หน้าเว็บเป็น /student/process/process_company/{student_process_status} --}}
@extends('student.student_layout')
@section('title', 'process_company')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน')
@section('style')
    <style>
        #bottom_menu,
        #display_info {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }
    </style>
@endsection
@section('body_content')
    @if ($student_process_status == 'register_completed' || $student_process_status == 'company_pending')
        <section> {{-- ปุ่ม ขอเอกสารส่งตัว จะเซทค่าดั้งนี้ app_type = rec --}} {{-- ปุ่ม ขอเอกสารขอความอนุเคราะห์ จะเซทค่าดั้งนี้ app_type = request --}}
            <div class="d-flex gap-4 justify-content-center py-5">
                <div class="sidebar_color" style="width: 45%">
                    <a id="bottom_menu" class="btn d-grid align-items-center mb-4 rounded-0 py-3" type="button"
                        href="{{ route('process_company_rec', [$student_process_status, 'rec']) }}" style="height: 85%">
                        <h5>ขอเอกสารส่งตัว</h5>
                        <p>(นักศึกษาที่มีสถานที่ฝึกงานแล้ว)</p>
                    </a>
                </div>
                <div class="sidebar_color" style="width: 45%">
                    <a id="bottom_menu" class="btn d-grid align-items-center mb-4 rounded-0 py-3" type="button"
                        href="{{ route('process_company_search_address', [$student_process_status, 'request']) }}"
                        style="height: 85%">
                        <h5>ขอเอกสารขอความอนุเคราะห์</h5>
                        <p>(นักศึกษาที่มีสถานที่ยังไม่มีฝึกงานแล้ว)</p>
                    </a>
                </div>
            </div>
        </section>
    @else
        @if ($student_process_status == 'internship')
            <section> {{-- แสดงข้อมูลสถานที่ฝึกงาน --}}
                @foreach ($company_addresses as $company)
                    <div class="card rounded-0 shadow" id="display_info">
                        <div class="card-body">
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
                                                <p class="mb-0" style="font-size: 13px">{{ $company['house_no'] }},
                                                    {{ $company['village_no'] }}, {{ $company['road'] }},
                                                    {{ $company['province'] }}, {{ $company['district'] }},
                                                    {{ $company['sub_district'] }}, {{ $company['postcode'] }}</p>
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
                @endforeach
            </section>

            <section> {{-- แสดงรายละเอียดการฝึกงาน --}}
                @foreach ($internship_info as $info)
                    <div class="card rounded-0 shadow mt-3" id="display_info">
                        <div class="card-body">
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
                                                <p class="mb-0" style="font-size: 13px">{{ $info['semester'] }}</p>
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
                                                <p class="mb-0" style="font-size: 13px">{{ $info['years'] }}</p>
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
                                                <p class="mb-0" style="font-size: 13px">{{ $info['start_date'] }} - {{ $info['end_date'] }} </p>
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
                                                <p class="mb-0" style="font-size: 13px">{{ $info['attend_to'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

            <section> {{-- แสดงรายละเอียดพี่เลี้ยง --}}
                @foreach ($mentors as $mentor)
                    <div class="card rounded-0 shadow mt-3" id="display_info">
                        <div class="card-body">
                            <div class="px-5 py-4">
                                <h5 class="mb-0"><i class="bi bi-folder-fill me-2"></i>รายละเอียดพี่เลี้ยง</h5>
                                <div class="row mt-4 ms-4">
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="bi bi-person-badge-fill" style="font-size: 35px"></i>
                                            </div>
                                            <div class="col-8 mt-2">
                                                <h6 class="mb-0">ชื่อ</h6>
                                                <p class="mb-0" style="font-size: 13px">{{ $mentor['fname'] }} {{ $mentor['lname'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="bi bi-pc-display" style="font-size: 35px"></i>
                                            </div>
                                            <div class="col-8 mt-2">
                                                <h6 class="mb-0">ตำแหน่ง</h6>
                                                <p class="mb-0" style="font-size: 13px">{{ $mentor['position'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="bi bi-envelope-open-fill" style="font-size: 35px"></i>
                                            </div>
                                            <div class="col-8 mt-2">
                                                <h6 class="mb-0">Email</h6>
                                                <p class="mb-0" style="font-size: 13px">{{ $mentor['email'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="bi bi-telephone-fill" style="font-size: 35px"></i>
                                            </div>
                                            <div class="col-8 mt-2">
                                                <h6 class="mb-0">โทรศัพท์</h6>
                                                <p class="mb-0" style="font-size: 13px">{{ $mentor['phone'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="bi bi-printer-fill" style="font-size: 35px"></i>
                                            </div>
                                            <div class="col-8 mt-2">
                                                <h6 class="mb-0">โทรสาร</h6>
                                                <p class="mb-0" style="font-size: 13px">{{ $mentor['fax'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

        @endif

    @endif

@endsection
