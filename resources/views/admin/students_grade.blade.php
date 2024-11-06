@extends('admin.admin_layout')
@section('title', 'จัดการผู้ใช้งาน')
@section('sidebar_check_grade_color', 'select_menu_color')
@section('sub_content')
@section('body_header', 'ตรวจสอบเกรดนักศึกษา')

<div class="container">
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

    {{-- Search form --}}
    <form action="{{ route('check_grade') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="ค้นหาชื่อ"
                value="{{ request('name') }}">
            <input type="text" name="student_id" class="form-control" placeholder="ค้นหารหัส"
                value="{{ request('student_id') }}">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </div>
    </form>




    @if ($students->isEmpty())
        <div class="alert alert-warning">No users found.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through users and display their details --}}
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->person->name }}</td>
                        <td>{{ $student->person->surname }}</td>
                        <td>{{ $student->student_type }}</td>
                        <td>
                            <a href="{{ route('check_grade_detail', ['student_id' => $student->id]) }}">แสดง</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $students->links('pagination::bootstrap-4') }}
</div>
@endsection
