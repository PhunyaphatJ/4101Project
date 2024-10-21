@extends('layout_login')
@section('title', 'login')
@section('login', 'select_menu_color')
@section('body_header', 'Login')
@section('body_content')
    <div class="row justify-content-center ">
        <div class="col-5 col-item">
            <form>
                <div class="form-floating my-4">
                    <input type="email" class="form-control" id="#" placeholder="0000000000@rumail.ru.ac.th">
                    <label for="#">Email address</label>
                </div>
                <div class="form-floating my-4">
                    <input type="password" class="form-control" id="#" placeholder="Password">
                    <label for="#">Password</label>
                </div>
                <a href="/manual"><button class="btn sumit_color w-100 py-3 my-4" type="submit">Login</button></a>
            </form>
        </div>
    </div>
@endsection
