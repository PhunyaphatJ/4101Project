@extends('ui_layout.login_layout')
@section('title', 'Login')
@section('login', 'select_menu_color')
@section('body_header', 'Login')
@section('style')
    <style>
        /* hover button login */
        button[type="submit"]:hover {
            background: #ff96ad;
            box-shadow: 0 0 5px #ff96ad, 0 0 25px #ff96ad, 0 0 50px #ff96ad, 0 0 200px #ff96ad;

        }
    </style>
@endsection
@section('body_content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-5 col-item">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating my-4">
                    <input type="email" class="form-control rounded-5 ps-4" name="email"
                        placeholder="0000000000@rumail.ru.ac.th">
                    <label class="ps-4" for="email">Email address</label>
                </div>
                @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating my-4">
                    <input type="password" class="form-control rounded-5 ps-4" name="password" placeholder="Password">
                    <label class="ps-4" for="password">Password</label>
                </div>
                @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                @if ($invalid)
                    <p id="invalid-text" class="text-danger text-center">Email หรือรหัสผ่านไม่ถูกต้อง</p>
                @endif
                <button class="btn submit_color w-100 py-3 my-4 rounded-5" type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection
