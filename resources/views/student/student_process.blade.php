@extends('student.student_layout')
@section('title', 'student_process')
@section('student_process', 'select_menu_color')
{{-- @section('body_header', 'ข้อมูลนักศึกษา') --}}
@section('style')
    <style>
        #bookmark_icon{
            position: absolute;
            top: 0%;
            right: 0%;
            font-size: 300%;
            translate: 0% -10%;
        }
        #bookmark_text{
            color: #000000;
            translate: 130% -120%;
        }
    </style>
@endsection
@section('body_content')
    <div class="modal modal-sheet position-static d-block" tabindex="-1" role="dialog" id="modalTour" style="color: #ffffff">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-0 shadow" style="background-color: rgba(0,0,0,0.7)">
                <i class="bi bi-bookmark-fill" id="bookmark_icon"></i>
                <div class="modal-body p-5">
                    <p class="float-end " id="bookmark_text">COS</p>
                    <h4 class="mb-0">ข้อมูลนักศึกษา</h4>

                    <ul class="d-grid gap-4 my-4 list-unstyled small">
                        <li class="d-flex gap-4">
                            <i class="bi bi-person-badge-fill" style="font-size: 35px"></i>
                            <div class="mt-2">
                                <h6 class="mb-0">0000000000</h6>
                                <p class="mb-0" style="font-size: 13px">นางสาว xxx xxxx</p>
                            </div>
                        </li>
                        <li class="d-flex gap-4">
                            <i class="bi bi-chat-square-dots-fill mt-1" style="font-size: 35px"></i>
                            <div>
                                <h6 class="mb-0">ติดต่อ</h6>
                                <p class="mb-0" style="font-size: 13px">000-000-0000 </p>
                                <p class="mb-0" style="font-size: 13px">0000000000@rumail.ru.ac.th</p>
                            </div>
                        </li>
                    </ul>
                    <a href="/student_process_register_for_internship"><button type="button" class="btn btn-lg sumit_color mt-4 w-100 p-3  rounded-5" data-bs-dismiss="modal" style="font-size: 18px">ลงทะเบียนขอฝึกงาน</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
