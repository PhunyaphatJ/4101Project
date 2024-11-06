@extends('admin.admin_layout')
@section('title', 'จัดการผู้ใช้งาน')
@section('sidebar_manage_user_color', 'select_menu_color')
@section('sub_content')

    @if ($users_type == 'professor')
        @section('body_header', 'จัดการข้อมูลอาจารย์')
    @section('subsidebar_manage_professor_color', 'select_menu_color')
@elseif($users_type == 'student')
    @section('body_header', 'จัดการข้อมูลนักศึกษา')
    @section('subsidebar_manage_student_color', 'select_menu_color')
@endif

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    {{-- Search form --}}
    <form action="{{ route('manage_users', ['users_type' => $users_type]) }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="ค้นหาชื่อ" value="{{ request('name') }}">
            <input type="text" name="id" class="form-control" placeholder="ค้นหารหัส" value="{{ request('id') }}">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            @if ($users_type == 'professor')
                <a href="{{route('professor_register')}}" class="btn btn-success">สร้างอาจารย์</a>
            @endif
        </div>
    </form>
    
    

    @if ($users->isEmpty())
        <div class="alert alert-warning">No users found.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    @if ($users_type == 'professor')
                        <th>สถานะ</th>
                    @else
                        <th>ประเภท</th>
                    @endif
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through users and display their details --}}
                @foreach ($users as $user)
                    <tr>
                        @if ($users_type == 'professor')
                            <td>{{ $user->professor_id }}</td>
                        @else
                            <td>{{ $user->student_id }}</td>
                        @endif
                        <td>{{ $user->person->name }}</td>
                        <td>{{ $user->person->surname }}</td>
                        @if ($users_type == 'professor')
                            <td>{{ $user->status }}</td>
                            <td>
                                <a
                                    href="{{ route('user_detail', ['user_type' => 'professor', 'user_id' => $user->id]) }}">แสดง</a>
                            </td>
                        @else
                            <td>{{ $user->student_type }}</td>
                            <td>
                                <a
                                    href="{{ route('user_detail', ['user_type' => 'student', 'user_id' => $user->id]) }}">แสดง</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $users->links('pagination::bootstrap-4') }}
</div>
@endsection
