@extends('admin.admin_layout')
@section('title', 'อนุมัติคำร้อง')
@section('sidebar_manage_application_color', 'select_menu_color')
@section('subsidebar_application_appoval_color', 'select_menu_color')
@section('body_header', 'อนุมัติคำร้อง')
@section('sub_content')
    <div>
        <ul class="navigation">
            {{-- เลือกแสดงคำร้องทั้งหมด --}}
            @if ($application_type == 'all')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval') }}">ทั้งหมด</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอขึ้นทะเบียนฝึกงาน --}}
            @if ($application_type == 'Internship_Register')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'Internship_Register') }}">ขึ้นทะเบียนฝึกงาน</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอเอกสารขอความอนุเคราะห์ --}}
            @if ($application_type == 'Internship_Request')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'Internship_Request') }}">เอกสารขอความอนุเคราะห์</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอเอกสารส่งตัว --}}
            @if ($application_type == 'Recommendation')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'Recommendation') }}">เอกสารส่งตัว</a></li>
            {{-- เลือกแสดงเฉพาะคำร้องขอเอกสารสขอบคุณ --}}
            @if ($application_type == 'Appreciation')
                <li class="navigation active">
                @else
                <li class="navigation">
            @endif
            <a href="{{ route('application_approval_list', 'Appreciation') }}">เอกสารขอบคุณ</a></li>
        </ul>
        {{-- ตารางแสดงรายการคำร้อง --}}
        @if ($applications->isEmpty())
            <h2>
                ไม่พบคำร้อง
            </h2>
        @else
            <table class="table mt-1 text-center">
                <thead>
                    <tr>
                        <th scope="col">
                            <a href="{{ route('application_approval', ['sort' => 'application_id', 'direction' => request('sort') === 'application_id' && request('direction') === 'asc' ? 'desc' : 'asc']) }}"
                                style="color: inherit; text-decoration: none;">
                                เลขที่คำขอ
                                @if (request('sort') === 'application_id')
                                    @if (request('direction') === 'asc')
                                        <span>&#9650;</span> <!-- Ascending arrow -->
                                    @else
                                        <span>&#9660;</span> <!-- Descending arrow -->
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{ route('application_approval', ['sort' => 'student_id', 'direction' => request('sort') === 'student_id' && request('direction') === 'asc' ? 'desc' : 'asc']) }}"
                                style="color: inherit; text-decoration: none;">
                                รหัสนักศึกษา
                                @if (request('sort') === 'student_id')
                                    @if (request('direction') === 'asc')
                                        <span>&#9650;</span>
                                    @else
                                        <span>&#9660;</span>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">
                            <a href="{{ route('application_approval', ['sort' => 'datetime', 'direction' => request('sort') === 'datetime' && request('direction') === 'asc' ? 'desc' : 'asc']) }}"
                                style="color: inherit; text-decoration: none;">
                                วันที่ส่งคำขอ
                                @if (request('sort') === 'datetime')
                                    @if (request('direction') === 'asc')
                                        <span>&#9650;</span>
                                    @else
                                        <span>&#9660;</span>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{ route('application_approval', ['sort' => 'application_type', 'direction' => request('sort') === 'application_type' && request('direction') === 'asc' ? 'desc' : 'asc']) }}"
                                style="color: inherit; text-decoration: none;">
                                ประเภท
                                @if (request('sort') === 'application_type')
                                    @if (request('direction') === 'asc')
                                        <span>&#9650;</span>
                                    @else
                                        <span>&#9660;</span>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col">สถานะ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- รายการคำร้อง --}}
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{ $application['application_id'] }}</td>
                            <td>{{ $application['student_id'] }}</td>
                            <td>{{ $application->person->name }}</td>
                            <td>{{ $application->person->surname }}</td>
                            <td>{{ $application->notification->datetime }}</td>
                            {{-- เปลี่ยนประเภทคำร้องเป็นภาษาไทย --}}
                            @if ($application['application_type'] == 'Internship_Register')
                                <td>ขึ้นทะเบียนฝึกงาน</td>
                            @elseif($application['application_type'] == 'Internship_Request')
                                <td>เอกสารขอความอนุเคราะห์</td>
                            @elseif($application['application_type'] == 'Recommendation')
                                <td>เอกสารส่งตัว</td>
                            @elseif($application['application_type'] == 'Appreciation')
                                <td>เอกสารขอบคุณ</td>
                            @endif
                            {{-- เปลี่ยนสถานะคำร้องเป็นภาษาไทย --}}
                            @if ($application['application_status'] == 'approval_pending')
                                <td class="status_approval_pending_color">รอการอนุมัติ</td>
                            @elseif($application['application_status'] == 'document_pending')
                                <td class="status_document_pending_color">กำลังจัดทำ</td>
                            @elseif($application['application_status'] == 'completed')
                                <td class="status_completed_color">สมบูรณ์</td>
                            @elseif($application['application_status'] == 'reject')
                                <td class="status_reject_color">ปฏิเสธ</td>
                            @endif
                            <td>
                                <a class="btn btn-warning btn-sm"
                                    href="{{ route('application_detail', [$application['application_type'], $application['application_id']]) }}">แสดง</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $applications->links('pagination::bootstrap-4') }}
        @endif
    </div>
@endsection
