@extends('admin.admin_layout')
@section('title', 'จัดการผู้ใช้งาน')
@section('sidebar_check_grade_color', 'select_menu_color')
@section('body_header', 'เกรดวิชาฝึกงาน')
@section('sub_content')
<div class="container mt-4">

    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <h5 class="mb-3">
              <i class="bi bi-person"></i> นักศึกษา
            </h5>
            <div class="mb-2">ชื่อ : {{$student->person->name}} {{$student->person->surname}}</div>
            <div class="mb-2">สาขาวิชา : {{$student->department}}</div>
            <div class="mb-2">ภาคการศึกษา : {{$student->internship_info->internship_detail->register_semester}}/{{$student->internship_info->internship_detail->year}}</div>
            <div class="mb-2">เบอร์โทรศัพท์ : {{$student->person->phone ?? '-'}}</div>
            <div class="mb-2">Email : {{$student->email}}</div>
          </div>
          <div class="col-md-6">
            <h5 class="mb-3">ข้อมูลสถานที่ฝึกงาน</h5>
            <div class="mb-2">ชื่อ : {{$student->internship_info->internship_detail->company->company_name}}</div>
            <div class="mb-2">ที่อยู่ : {{$student->internship_info->internship_detail->company->address->getAddress()}}</div>
            <div class="mb-2">เบอร์โทรศัพท์ : {{$student->internship_info->internship_detail->company->phone ?? '-'}}</div>
            <div class="mb-2">เบอร์โทรสาร : {{$student->internship_info->internship_detail->company->fax ?? '-'}}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="mb-3">
              <i class="bi bi-person"></i> อาจารย์
            </h5>
            <div class="mb-2">ชื่อ : {{$student->internship_info->professor->person->name}} {{$student->internship_info->professor->person->surname}}</div>
            <div class="mb-2">เบอร์โทรศัพท์ : {{$student->internship_info->professor->person->phone ?? '-'}}</div>
            <div class="mb-2">Email : {{$student->internship_info->professor->email}}</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-4 bg-dark text-white">
          <div class="card-body">
            <h5 class="mb-3">เกรด</h5>
            @if($student->internship_info->grade != null)
            <h2>{{$student->internship_info->grade}}</h2>
            @else
            <div>• ยังไม่ได้การเกรด</div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="text-end">
        <a href="{{ route('check_grade') }}" class="btn btn-secondary me-2">ย้อนกลับ</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
