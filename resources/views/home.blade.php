<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>วิทยาการคอมพิวเตอร์ มหาวิทยาลัยรามคำแหง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            width: 100px;
            height: auto;
        }

        .navbar {
            background-color: #f0f0f0;
        }

        .main-content {
            background-color: #e9ecef;
            min-height: 300px;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12 text-center"> <img src="{{ asset('images/logo.png') }}"
                    alt="วิทยาการคอมพิวเตอร์ มหาวิทยาลัยรามคำแหง" class="h-16">
                <h1>วิทยาการคอมพิวเตอร์ มหาวิทยาลัยรามคำแหง</h1>
                <h3>Computer Science of Ramkhamhaeng University</p>
                <p class="text-muted">ระบบจัดการการศึกษาของนักศึกษาภาควิชาวิทยาการคอมพิวเตอร์</p>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light mt-3">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-house-door"></i> หน้าหลัก</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-box-arrow-in-right"></i> LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main-content">
            <!-- ส่วนนี้สำหรับเนื้อหาหลัก -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>



<footer class="py-16 text-center text-sm text-black dark:text-white/70">
    <p>Coppyright © {{ date('Y') }}.</p>
</footer>

</body>

</html>
