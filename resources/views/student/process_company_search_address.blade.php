{{-- path หน้าเว็บเป็น /student/process/process_company_search_address/{student_process_status}/{app_type} --}}
@extends('student.student_layout')
@section('title', 'process_company_search_address')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน')
@section('style')
    <style>
        input,
        select {
            height: 50px;
        }

        select {
            margin-bottom: 10%;
        }
    </style>
@endsection
@section('body_content')
    <section> {{-- input ค้นหาสถานที่ฝึกงาน และ ปุ่มเพิ่มสถานที่ฝึกงาน --}}
        <form method="GET" action="{{ route('search_company',['type'=>$type])}}">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="province" class="form-label">จังหวัด</label>
                    <select id="input_province" class="form-select rounded-5 ps-4" name="province" >
                        <option value="">กรุณาเลือกจังหวัด</option>
                        @foreach($provinces as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                        @if(old('province') == $item) <option value="{{ $item }}" selected>{{ $item }}</option> @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="district" class="form-label">อำเภอ/เขต</label>
                    <select id="input_amphoe" class="form-select rounded-5 ps-4" name="district" >
                        <option value="">กรุณาเลือกเขต/อำเภอ</option>
                        @foreach($amphoes as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                        {{-- action เเล้ว address ไม่หาย --}}
                        @if(old('district') == $item) <option value="{{ $item }}" selected>{{ $item }}</option> @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                    <select id="input_tambon" class="form-select rounded-5 ps-4" name="sub_district" >
                        <option value="">กรุณาเลือกแขวง/ตำบล</option>
                        @foreach($tambons as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                        @if(old('sub_district') == $item) <option value="{{ $item }}" selected>{{ $item }}</option> @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <a class="btn submit_color float-end ms-4 rounded-5" type="button" style="padding: 1.6% 3%"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="กรณีที่ไม่พบสถานที่ฝึกงานที่ต้องการ"
                    href="{{ route('add_company',['type'=>$type])}}">เพิ่มสถานที่<i
                        class="bi bi-patch-plus ms-2" style="font-size: 18px"></i></a>

                {{-- input ค้นหา --}}
                <span class="d-flex" role="search">
                    <input class="form-control me-2 rounded-5 px-4" type="search" placeholder="ชื่อสถานที่"
                        aria-label="Search" name="company_name" >
                    <button class="btn rounded-5 cancel_color px-3" type="" style="padding: 1.5% 0%"><i
                            class="bi bi-search"></i></button>
                </span>
            </div>
        </form>

    </section>

    {{-- สำหรับ tooltip ข้อความหมายเหตุปุ่มเพิ่มสถานที่ฝึกงาน --}}
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection

@section('out_body_header', 'รายการสถานที่ฝึกงาน')
@section('out_body_content')
    <section> {{-- แสดงรายระเอียดสถานที่ฝึกงานตามที่มีในระบบ --}}
        @foreach ($companies as $company)
            <div class="card rounded-2 shadow mb-3">
                <div class="card-body">
                    <div>
                        <a href="{{ route('select_company', [$type,$company['company_id']]) }}"
                            class="btn submit_color float-end rounded-5">เลือกสถานที่</a>
                        <div class="row ">

                            <div class="col-6 ">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-building-fill" style="font-size: 20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">ชื่อหน่วยงาน</h6>
                                        <p class="mb-0" style="font-size: 13px">{{ $company['company_name'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-telephone-fill" style="font-size: 20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">โทรศัพท์</h6>
                                        <p class="mb-0" style="font-size: 13px">{{ $company['phone'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-pin-map-fill" style="font-size: 20px"></i>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">ที่อยู่</h6>
                                        <p class="mb-0" style="font-size: 13px">{{ $company->address->getAddress() }}</p>
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
                                        <p class="mb-0" style="font-size: 13px">{{ $company['fax'] ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $companies->links('pagination::bootstrap-4') }}
    </section>
@endsection
<script src="{{ asset('js/address.js') }}"></script>
