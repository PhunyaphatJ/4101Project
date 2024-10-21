@extends('student_layout')
@section('title', 'process_1')
@section('process', 'select_menu_color')
@section('process_1', 'select_menu_color')
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
    <h5 class="mt-5 mb-3">ช้อมูลและหลักฐานประกอบการพิจารณา</h5>

    <div id="more_info" class="mx-3">
        <form class="needs-validation" novalidate>
            <div style="width: 31%">
                <label for="#" class="form-label">หน่วยกิตสะสม</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="#" placeholder="" required>
                    <span class="input-group-text ">ควรมากกว่า 100</span>
                    <div class="invalid-feedback">
                        Valid is required.
                    </div>
                </div>
            </div>
            <div id="file" class="row">
                <div class="col-4">
                    <label for="#" class="form-label">ใบรายงานการเช็คเกรด</label>
                    <input type="#" class="form-control" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid is required
                    </div>
                </div>

                <div class="col-4">
                    <label for="#" class="form-label">บัตรนักศึกษา</label>
                    <input type="#" class="form-control" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid is required
                    </div>
                </div>

                <div class="col-4">
                    <label for="#" class="form-label">ใบเสร็จลงทะเบียนเรียนภาคล่าสุด</label>
                    <input type="#" class="form-control" id="#" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid is required
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr class="my-4">

    <div class="mx-3">
        <a href="/student_status"><button class="btn sumit_color p-3 px-5 float-end" type="submit">ลงทะเบียน</button></a>
    </div>
    <div class="mx-3">
        <a href="/student_process"><button class="btn cancel_color p-3 px-5 me-3 float-end" type="cancel">ยกเลิก</button></a>
    </div>
@endsection
