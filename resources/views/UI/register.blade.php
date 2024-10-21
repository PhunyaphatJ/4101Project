@extends('login_layout')
@section('title', 'register')
@section('register', 'select_menu_color')
@section('body_header', 'Register')
@section('style')
<style>
    #register input, select{
        height: 50px;
        margin-bottom: 5%;
    }
    #form-check input{
        height: 18px;
    }
</style>
    
@endsection
@section('body_content')
    <div id="register" class="container">
        <h5 class="mb-3">ข้อมูลนักศึกษา</h5>

        <div class="mx-3">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <label for="#" class="form-label col-6">คำนำหน้า</label>
                    <label for="#" class="form-label col-6">สาขาวิชา</label>
                    <div id="form-check" class="form-check col-2">
                        <input id="#" name="#" type="radio" class="form-check-input ms-1" required>
                        <label class="form-check-label ms-1" for="#">นาง</label>
                    </div>
                    <div id="form-check" class="form-check col-2">
                        <input id="#" name="#" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="#">นาง</label>
                    </div>
                    <div id="form-check" class="form-check col-2">
                        <input id="#" name="#" type="radio" class="form-check-input" style="translate: -200% 0%" required>
                        <label class="form-check-label" for="#" style="translate: -70% 0%">นางสาว</label>
                    </div>

                    <div class="col-6">
                        <select class="form-select" id="#" required>
                            <option value="">COS</option>
                            <option>INT</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="firstName" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="#" class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="#" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid student id is required.
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="lastName" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="#" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="#" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid phone number is required.
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr class="my-4">
        <h5 class="mb-3">ที่อยู่</h5>

        <div class="mx-3">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-3">
                        <label for="#" class="form-label">เลขที่</label>
                        <input type="text" class="form-control" id="#" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="#" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control" id="#" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">ถนน</label>
                        <input type="text" class="form-control" id="#" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">จังหวัด</label>
                        <select class="form-select" id="#" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid province.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">อำเภอ/เขต</label>
                        <select class="form-select" id="#" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid county.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">ตำบล/แขวง</label>
                        <select class="form-select" id="#" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid district.
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="#" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="#" placeholder="" value=""
                            required>
                        <div class="invalid-feedback">
                            Valid is required.
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <hr class="my-4">
        <h5 class="mb-3">Accout</h5>

        <div class="mx-3">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email"
                            placeholder="0000000000@rumail.ru.ac.th" required>
                        <div class="invalid-feedback">
                            Valid email is required
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid password is required
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="password" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid password date required
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr class="my-4">

        <div class="mx-3">
            <a href="/student_manual"><button class="btn sumit_color p-3 px-5 float-end" type="submit">Register</button></a>
        </div>

    </div>
@endsection
