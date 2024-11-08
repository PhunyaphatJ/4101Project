@extends('student.student_layout')

@section('title', 'report')
@section('navbar_header', 'นักศึกษา')
@section('process', 'select_menu_color')
@section('report', 'select_menu_color')
@section('body_header', 'รายงานการฝึกงาน')

@section('style')
    <style>
        #student_info {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
        }

        input,
        button {
            height: 50px;
        }
    </style>
@endsection

@section('body_content')
    <section>
        <div class="card rounded-0 shadow" id="student_info">
            <div class="card-body">
                <div class="" style="margin: 5% 15%">
                    <div class="row justify-content-center">
                        <div class="col-6 mb-4">
                            <button class="btn sidebar_color d-inline-flex align-items-center m-auto rounded-5"
                                type="button" onclick="openPdf()">
                                ตัวอย่างรายงานการฝึกงาน<i class="bi bi-file-earmark-arrow-down ms-2" style="font-size: 30px"></i>
                            </button>
                        </div>
                        @if ($report != null)
                            <div class="col-6 mb-3">
                                <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto"
                                    type="button" onclick="openMyReport('{{ $report }}')">
                                    รายงานการฝึกงานของฉัน<i class="bi bi-file-earmark-text ms-2" style="font-size: 30px"></i>
                                </button>
                            </div>
                            <div class="col-6"></div>
                            <form class="row" method="POST" action="{{ route('report') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6 mb-4">
                                    <input type="file" class="form-control rounded-5 ps-4" name="report_file" placeholder=""
                                        required>
                                </div>
                                <div class="col-6 mb-4">
                                    <button class="btn submit_color d-inline-flex align-items-center rounded-5 ps-3 float-end disabled"
                                        type="button">
                                        แก้ไขรายงาน<i class="bi bi-pencil ms-2" style="font-size: 25px"></i>
                                    </button>
                                </div>
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <button class="btn submit_color d-inline-flex align-items-center rounded-5 float-end"
                                        type="submit">
                                        บันทึก<i class="bi bi-floppy2 ms-2" style="font-size: 25px"></i>
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="col-6 mb-3">
                                <button class="btn sidebar_color d-inline-flex align-items-center rounded-5 m-auto disabled"
                                    type="button">
                                    รายงานการฝึกงานของฉัน<i class="bi bi-file-earmark-text ms-2" style="font-size: 30px"></i>
                                </button>
                            </div>
                            <form class="row" method="POST" action="{{ route('report') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6 mb-4">
                                    <input type="file" class="form-control rounded-5 ps-4" name="report_file" placeholder=""
                                        required>
                                </div>
                                <div class="col-6">
                                    <button class="btn submit_color d-inline-flex align-items-center rounded-5 float-end"
                                        type="submit">
                                        บันทึก<i class="bi bi-floppy2 ms-2" style="font-size: 25px"></i>
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function openPdf() {
        window.open('/storage/documents/ตัวอย่างรายงานการฝึกงาน01.pdf', '_blank');
    }

    function openMyReport(reportPath) {
        window.open('/storage/' + reportPath, '_blank');
    }
</script>
