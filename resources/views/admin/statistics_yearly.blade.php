@extends('admin.admin_layout')
@section('title', 'สถิติ')
@section('sidebar_statistics_color', 'select_menu_color')
@section('subsidebar_yearly_statistic_color', 'select_menu_color')
@section('body_header', 'สถิติรายปี')
@section('sub_content')
    @if (session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @else
        <div class="p-6 m-20 bg-white rounded shadow">
            <label for="chartType">Select Chart Type:</label>
            <select id="chartType" onchange="updateChart()">
                <option value="pie" {{ $chartType === 'pie' ? 'selected' : '' }}>Pie</option>
                <option value="bar" {{ $chartType === 'bar' ? 'selected' : '' }}>Bar</option>
            </select>

            <label for="year">Select Year:</label>
            <select id="year" onchange="updateChart()">
                @foreach ($years as $year)
                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="chartContainer">
            @if ($chart)
                {!! $chart->container() !!}
                <script src="{{ $chart->cdn() }}"></script>
                {{ $chart->script() }}
            @else
                <p>No data available for the selected criteria.</p>
            @endif
        </div>
        <script>
            function updateChart() {
                const chartType = document.getElementById("chartType").value;
                const year = document.getElementById("year").value;
                window.location.href = `?chartType=${chartType}&year=${year}`;
            }
        </script>
    @endif
@endsection
