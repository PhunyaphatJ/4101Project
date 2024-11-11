@extends('professor.professor_layout')
@section('title', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('sidebar_intern_supervision_and_information_color', 'select_menu_color')
@section('body_header', 'บันทึกการนิเทศและข้อมูลนักศึกษา')
@section('sub_content')
    <div class="card bg-transparent border-0">
        <div class="card-body">
            <h4>นักศึกษาที่กำลังฝึกงานอยู่</h4>
            {{-- เขียน for สำหรับแสดงรายการนักศึกษา --}}
            @foreach ($students as $student)
                @if ($student->student->student_type == 'internship')
                    <ul class="card ms-2 pt-2">
                        <div class="card-bordy row">
                            <h1 class="col-1"><i class="bi bi-person-vcard"></i></h1>
                            <div class="col-11">
                                <div class="row pt-2">
                                    {{-- รหัสนักศึกษา --}}
                                    <h4>{{ $student->student_id }}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <h6 style="display: inline-block">ชื่อ: </h6>
                                            @if ($student->student->person->prefix == 'MR')
                                                <span>นาย </span>
                                            @elseif($student->student->person->prefix == 'MS')
                                                <span>นางสาว </span>
                                            @elseif($student->student->person->prefix == 'MRS')
                                                <span>นาง </span>
                                            @endif
                                            <span>{{ $student->student->person->name }} </span>
                                            <span>{{ $student->student->person->surname }} </span>
                                        </div>
                                        <div>
                                            <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                                            <span>{{ $student->student->person->phone }}</span>
                                        </div>
                                        <div>
                                            <h6 style="display: inline-block">Email: </h6>
                                            <span>{{ $student->student->email }}</span>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div>
                                            <h6 style="display: inline-block">ภาควิชา: </h6>
                                            <span>{{ $student->student->department }}</span>
                                        </div>
                                        <div>
                                            {{-- เพิ่มเติมจากที่ออกแบบไว้ คือ วันเริ่มกับวันสิ้นสุดการฝึกงาน เป็นข้อมูลที่จำเป็นสำหร้บอาจารย์ --}}
                                            <h6 style="display: inline-block">วันที่เริ่มฝึกงาน: </h6>
                                            <span>{{ $student->internship_detail->start_date }}</span>
                                        </div>
                                        <div>
                                            <h6 style="display: inline-block">วันที่สิ้นสุดการฝึกงาน: </h6>
                                            <span>{{ $student->internship_detail->end_date }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-end me-2">
                            {{-- ลิงค์ไปหน้า intern_information --}}
                            <a class="btn btn-outline-info" href="{{route('internship_information',[$student->internship_id])}}">นิเทศและเกรด</a>
                        </div>
                    </ul>
                @endif
                {{-- endfor รายการนักศึกษา --}}
            @endforeach
        </div>
    </div>
    <div class="card bg-transparent border-0">
        <div class="card-body">
            <h4>นักศึกษาที่ผ่านการฝึกงานแล้ว</h4>
            {{-- เขียน for สำหรับแสดงรายการนักศึกษา --}}
            @foreach ($students as $student)
                @if ($student->student->student_type == 'former')
                    <ul class="card ms-2 pt-2">
                        <div class="card-bordy row">
                            <h1 class="col-1"><i class="bi bi-person-vcard"></i></h1>
                            <div class="col-11">
                                <div class="row pt-2">
                                    {{-- รหัสนักศึกษา --}}
                                    <h4>{{ $student->student_id }}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6 style="display: inline-block">ชื่อ: </h6>
                                        @if ($student->student->person->prefix == 'MR')
                                                <span>นาย </span>
                                            @elseif($student->student->person->prefix == 'MS')
                                                <span>นางสาว </span>
                                            @elseif($student->student->person->prefix == 'MRS')
                                                <span>นาง </span>
                                            @endif
                                        <span>{{ $student->student->person->name }} </span>
                                        <span>{{ $student->student->person->surname }} </span>
                                        <br>
                                        <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                                        <span>{{ $student->student->person->phone }}</span>
                                        <br>
                                        <h6 style="display: inline-block">Email: </h6>
                                        <span>{{ $student->student->email }}</span>
                                    </div>
                                    <div class="col-7">
                                        <h6 style="display: inline-block">ภาควิชา: </h6>
                                        <span>{{ $student->student->department }}</span>
                                        <br>
                                        {{-- เพิ่มเติมจากที่ออกแบบไว้ คือ วันเริ่มกับวันสิ้นสุดการฝึกงาน เป็นข้อมูลที่จำเป็นสำหร้บอาจารย์ --}}
                                        <h6 style="display: inline-block">วันที่เริ่มฝึกงาน: </h6>
                                        <span>{{ $student->internship_detail->start_date }}</span>
                                        <br>
                                        <h6 style="display: inline-block">วันที่สิ้นสุดการฝึกงาน: </h6>
                                        <span>{{ $student->internship_detail->end_date }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-end me-2">
                            {{-- ลิงค์ไปหน้า former_intern_information --}}
                            <a class="btn btn-outline-info" href="#">เพิ่มเติม</a>
                        </div>
                    </ul>
                    {{-- endfor รายการนักศึกษา --}}
                @endif
            @endforeach
        </div>
    </div>
@endsection
