@extends('ui_layout.login_layout')
@section('title', 'login')
@section('login', 'select_menu_color')
@section('body_header', 'Login')
@section('body_content')
    <div class="row justify-content-center ">
        <div class="col-5 col-item">
            <form>
                <div class="form-floating my-4">
                    <input type="email" class="form-control  rounded-5 ps-4" id="email" placeholder="0000000000@rumail.ru.ac.th">
                    <label class=" ps-4" for="email">Email address</label>
                </div>
                <div class="form-floating my-4">
                    <input type="password" class="form-control  rounded-5 ps-4" id="password" placeholder="Password">
                    <label class=" ps-4" for="password">Password</label>
                </div>
                <a href="student_manual"><button class="btn submit_color w-100 py-3 my-4  rounded-5" type="submit">Login</button></a>
            </form>
        </div>
    </div>
@endsection
