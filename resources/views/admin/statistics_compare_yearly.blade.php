@extends('admin.admin_layout')
@section('title', 'สถิติ')
@section('sidebar_statistics_color', 'select_menu_color')
@section('subsidebar_compare_yearly_statistic_color', 'select_menu_color')
@section('body_header', 'สถิติเปรียบเทียบรายปี')
@section('sub_content')
    @if (session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @else
        <div class="p-6 m-20 bg-white rounded shadow">
            <!-- Dropdown for Chart Type -->
            <label for="chartType">Chart Type:</label>
            <select id="chartType" onchange="updateChart()">
                <option value="bar" {{ $chartType == 'bar' ? 'selected' : '' }}>Bar</option>
                <option value="line" {{ $chartType == 'line' ? 'selected' : '' }}>Line</option>
                <!-- Add other chart types if needed -->
            </select>

            <!-- Dropdown for Start Year -->
            <label for="startYear">Start Year:</label>
            <select id="startYear" onchange="updateChart()">
                @foreach ($years as $year)
                    <option value="{{ $year }}" {{ $year == $startYear ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>

            <!-- Dropdown for End Year -->
            <label for="endYear">End Year:</label>
            <select id="endYear" onchange="updateChart()">
                @foreach ($years as $year)
                    <option value="{{ $year }}" {{ $year == $endYear ? 'selected' : '' }}>{{ $year }}</option>
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
                const startYear = parseInt(document.getElementById("startYear").value);
                const endYear = parseInt(document.getElementById("endYear").value);

                if (startYear > endYear) {
                    alert("Start year must be less than or equal to end year.");
                    return;
                }else if(endYear < startYear){
                    alert("End year must be more than or equal to end year.");
                    return;
                }

                window.location.href = `?chartType=${chartType}&startYear=${startYear}&endYear=${endYear}`;
            }
        </script>
    @endif
@endsection
