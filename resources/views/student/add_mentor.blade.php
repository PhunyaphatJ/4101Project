@extends('student.student_layout')
@section('title', 'add_mentor')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('process_company', 'select_menu_color')
@section('body_header', 'สถานที่ฝึกงาน(เพิ่มข้อมูลพี่เลี้ยง)')
@section('style')
    <style>
        #bottom_menu {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }
    </style>
@endsection
@section('body_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section> {{-- input ข้อมูลพี่เลี้ยง --}}
        <div class="container bg-white rounded-5 p-5 mt-5" style="max-width: 70%">
            <form class="needs-validation" validate method="POST" action="{{ route('add_mentor', [$type, $company_id, $application_id]) }}">
                @csrf
                <div class="row my-3">
                    <div class="col-2">
                        <i class="bi bi-cone-striped" style="font-size: 40px"></i>
                    </div>
                    <div class="col-10 form-floating">
                        <input type="text" class="form-control rounded-5 ps-4" name="name" id="name"
                            placeholder="ชื่อ" required>
                        <label class="ps-5 bg-transparent" for="name">ชื่อ</label>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-2">
                        <i class="bi bi-highlighter" style="font-size: 40px"></i>
                    </div>
                    <div class="col-10 form-floating">
                        <input type="text" class="form-control rounded-5 ps-4" name="surname" id="surname"
                            placeholder="นามสกุล" required>
                        <label class="ps-5 bg-transparent" for="surname">นามสุล</label>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-2">
                        <i class="bi bi-envelope-open" style="font-size: 40px"></i>
                    </div>
                    <div class="col-10 form-floating">
                        <input type="email" class="form-control rounded-5 ps-4" name="email" id="email"
                            placeholder="name@example.com" required>
                        <label class="ps-5 bg-transparent" for="email">Email
                            address</label>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-2">
                        <i class="bi bi-pc-display" style="font-size: 40px"></i>
                    </div>
                    <div class="col-10 form-floating">
                        <input type="text" class="form-control rounded-5 ps-4" name="position" id="position"
                            placeholder="ตำแหน่ง" required>
                        <label class="ps-5 bg-transparent" for="position">ตำแหน่ง</label>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-2">
                        <i class="bi bi-telephone" style="font-size: 40px"></i>
                    </div>
                    <div class="col-10 form-floating">
                        <input type="tel" class="form-control rounded-5 ps-4" name="phone" id="phone"
                            placeholder="โทรศัพท์" required maxlength="10">
                        <label class="ps-5 bg-transparent" for="phone">โทรศัพท์</label>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-2">
                        <i class="bi bi-printer" style="font-size: 40px"></i>
                    </div>
                    <div class="col-10 form-floating">
                        <input type="tel" class="form-control rounded-5 ps-4" name="fax" id="fax"
                            placeholder="โทรสาร" required>
                        <label class="ps-5 bg-transparent" for="fax" maxlength="10">โทรสาร</label>
                    </div>
                </div>
                <hr class="my-5">

                <button class="btn submit_color rounded-5 py-3 px-5 float-end ms-4" type="submit"
                    style="translate: 0% -50%">เพิ่ม<i class="bi bi-floppy2 ms-2"></i></button>
                <a type="button" class="btn cancel_color float-end rounded-5 py-3 px-5"
                    href="{{ route('select_company', [$type, $company_id]) }}" style="translate: 0% -50%">ปิด</a>
            </form>
        </div>
    </section>
@endsection
