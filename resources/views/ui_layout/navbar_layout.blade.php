<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon " href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- icon จากเว็บ bootstrap --}}
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    @yield('style') {{-- @yield('style') จะรับค่า "style(css)" มาจากไฟล์ที่เรียกใช้ layout --}}
    @yield('layout_style')
    <style>
        body {
            background-color: #DFF2FF;
            margin: 0% 10%
        }

        .nav-link:hover {
            color: #e4e4e4;
        }
        /* ให้สร้างสีที่จะเรียกใช้ไว้ที่นี่ สามารถเรียกใช้จากไฟล์ที่เรียกใช้ layout ได้ */
        .navbar_color {
            background-color: #0A75BC;
            /*สี navbar*/
            color: #ffffff;
        }

        .sidebar_color {
            background-color: #0A75BC;
            /*สี sidebar*/
            color: #ffffff;
        }

        .select_menu_color {
            background-color: #FCE029;
            /*สี select manu*/
        }

        .body_color {
            background-color: #81BCE3;
            /*สี body*/
        }

        .submit_color {
            background-color: #FCE029;
            /*สีปุ่ม sumit*/
            color: #000000;
            text-decoration: none;
        }

        .submit_color:hover{
            background-color: #edd32a;
            color: #000000;
        }

        .cancel_color {
            background-color: #000000;
            /*สีปุ่ม cancel*/
            color: #ffffff;
            text-decoration: none;
        }

        .cancel_color:hover {
            background-color: #232323;
            /*สีปุ่ม cancel*/
            color: #ffffff;
        }

        .app_accept_color {
            color: #00ff4c;
            /*สีสถานะเอกสารอนุมัติ*/
        }

        .app_approval_pending_color {
            color: #ffe600;
            /*สีสถานะเอกสารรอการอนุมัติ*/
        }

        .app_reject_color {
            color: #ff0000;
            /*สีสถานะเอกสารไม่อนุมิติ*/
        }

    </style>
</head>

<body>
    <div class="row mt-3">
        <div class="alert col-sm-3 text-end" style="margin-left: 10%">
            <img src="{{ asset('img/logo.png') }}" height="100"> {{-- folder img อยู่ใน folder public --}}
            {{-- <img src="resources/img/logo.png"> --}}
        </div>
        <div class="alert col-sm-6">
            <h5>วิทยาการคอมพิวเตอร์ มหาวิทยาลัยรามคำแหง</h5>
            <h6>Computer Science of Ramkhamhaeng University</h6>
            <br>
            <h5>ระบบจัดการการฝึกงานของนักศึกษาภาควิชาวิทยาการคอมพิวเตอร์</h5>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar_color">
        <div class="container mx-5 py-3" style="font-size: 120%">
            <span><i class="bi bi-house-fill me-3"></i>สำหรับนักศึกษา</span>
            <div class="d-flex">
                <a class="nav-link mx-4" href="#"><i class="bi bi-bell-fill"></i></a>
                <a class="nav-link" href="#"><i class="bi bi-person-fill" style="font-size: 110%"></i></a>
            </div>
        </div>
    </nav>
    @yield('sidebar')

</body>

</html>
