@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
@section('body_content')
<div class="card mt-3 p-4" style="border-color:black; border-width: 2px; border-radius: 0px">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-bordy row p-0">
        {{-- ประเภทคำร้อง --}}
        <div class="col-6" style="padding-top:10px">
            @if ($application['application_type'] == 'Internship_Register')
                <h3 style="display: inline-block">ขึ้นทะเบียนฝึกงาน</h3>
            @elseif($application['application_type'] == 'Internship_Request')
                <h3 style="display: inline-block">เอกสารขอความอนุเคราะห์</h3>
            @elseif($application['application_type'] == 'Recommendation')
                <h3 style="display: inline-block">เอกสารส่งตัว</h3>
            @elseif($application['application_type'] == 'Appreciation')
                <h3 style="display: inline-block">เอกสารขอบคุณ</h3>
            @endif
        </div>
        {{-- รายละเอียดคำร้อง --}}
        <div class="col-6 text-end">
            <p class="m-0">เลขที่คำร้อง {{ $application['application_id'] }}</p>
            <p class="m-0">วันที่ส่งคำร้อง {{ $application['date'] }}</p>
            <span>สถานะ </span>
            {{-- เปลี่ยนสถานะคำร้องเป็นภาษาไทย --}}
            @if ($application['application_status'] == 'approval_pending')
                <span class="status_approval_pending_color">รอการอนุมัติ</span>
            @elseif($application['application_status'] == 'document_pending')
                <span class="status_document_pending_color">กำลังจัดทำ</span>
            @elseif($application['application_status'] == 'completed')
                <span class="status_completed_color">สมบูรณ์</span>
            @elseif($application['application_status'] == 'reject')
                <span class="status_reject_color">ปฏิเสธ</span>
            @endif
        </div>
    </div>
    {{-- ข้อมูลนักศึกษา --}}
    <div class="card-body pb-0">
        <h4>ข้อมูลนักศึกษา</h4>
        <div class="ms-3">
            <div>
                <h6 style="display: inline-block">รหัสนักศึกษา: </h6>
                <span>{{ $application['student_id'] }}</span>
            </div>
            {{-- ชื่อ : prefix name lastname --}}
            <div>
                <h6 style="display: inline-block">ชื่อ: </h6>
                @if ($application->student->person->prefix == 'MR')
                    <span>นาย </span>
                @elseif($application->student->person->prefix == 'MS')
                    <span>นางสาว </span>
                @elseif($application->student->person->prefix == 'MRS')
                    <span>นาง </span>
                @endif
                <span>{{ $application->student->person->name }} </span>
                <span>{{ $application->student->person->surname }} </span>
            </div>
            <div>
                <h6 style="display: inline-block">ภาควิชา: </h6>
                <span>{{ $application->student->department }}</span>
            </div>
            <div>
                <h6 style="display: inline-block">เบอร์โทรศัพท์: </h6>
                <span>{{ $application->student->person->phone }}</span>
            </div>
            <div>
                <h6 style="display: inline-block">Email: </h6>
                <span>{{ $application->student->email }}</span>
            </div>
        </div>
    </div>
</div>
{{-- เลือกอาจารย์ --}}
<div class="m-4">
    <h5>เลือกอาจารย์ที่ปรึกษา</h5>
    <form method="POST" action="{{ route('assign_professor', ['application_id' => $application['application_id']]) }}">
        @csrf
        <!-- Queue Professor Selection -->
        <div class="form-group ps-2 pe-2 mb-3">
            <input type="radio" name="professor_option" value="true" id="queue_professor_radio" checked>
            <label for="queue_professor_radio">Select from Queue Professor</label>
            <select name="selected_professor" class="form-select" id="queue_professor_dropdown" disabled>
                <option value="{{ $queue_professor['id'] }}">
                    {{ $queue_professor['professor_id'] }} {{ $queue_professor->person->name }} {{ $queue_professor->person->surname }}
                </option>
            </select>
        </div>

        <!-- Professor List Selection -->
        <div class="form-group ps-2 pe-2">
            <input type="radio" name="professor_option" value="false" id="professor_list_radio">
            <label for="professor_list_radio">Select from Professor List</label>
            <select name="selected_professor" class="form-select" id="professor_list_dropdown" disabled>
                @foreach ($professors as $professor)
                    <option value="{{ $professor['id'] }}">
                        {{ $professor['professor_id'] }} {{ $professor->person->name }} {{ $professor->person->surname }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Button Group -->
        <div class="text-center mt-4">
            <div style="display: inline-block">
                <button type="button" class="btn btn-success" onclick="approve_block_on()">อนุมัติ</button>

                <!-- Popup Confirmation -->
                <div class="overlay" id="approve-popup" style="display: none;">
                    <div class="card overlay-item w-75">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="col-9 text-start mt-4 ps-3">อนุมัติคำร้อง</h4>
                                <div class="col-3 text-end">
                                    <button type="button" class="btn" onclick="approve_block_off()">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="text-start ps-3">
                                <span>อนุมัติคำร้อง {{ $application['application_id'] }} และเปลี่ยนสถานะคำร้องเป็น</span>
                                @if ($application['application_type'] == 'Internship_Register')
                                    <span>'สมบูรณ์'</span>
                                @else
                                    <span>'กำลังจัดทำ'</span>
                                @endif
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-warning">ยืนยัน</button>
                                <button type="button" class="btn btn-dark" onclick="approve_block_off()">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div style="display: inline-block">
                <a class="btn btn-secondary" href="/admin/manage_application/approval/{{ $application['application_type'] }}/{{ $application['application_id'] }}/">
                    ย้อนกลับ
                </a>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const queueProfessorRadio = document.getElementById('queue_professor_radio');
            const professorListRadio = document.getElementById('professor_list_radio');
            const queueProfessorDropdown = document.getElementById('queue_professor_dropdown');
            const professorListDropdown = document.getElementById('professor_list_dropdown');

            function toggleSelectDropdown() {
                queueProfessorDropdown.disabled = !queueProfessorRadio.checked;
                professorListDropdown.disabled = !professorListRadio.checked;
            }

            queueProfessorRadio.addEventListener("change", toggleSelectDropdown);
            professorListRadio.addEventListener("change", toggleSelectDropdown);

            toggleSelectDropdown();
        });

        function approve_block_on() {
            document.getElementById("approve-popup").style.display = "block";
        }

        function approve_block_off() {
            document.getElementById("approve-popup").style.display = "none";
        }
    </script>
</div>
@endsection
