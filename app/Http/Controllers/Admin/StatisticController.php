<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Internship_Detail;
use Illuminate\Support\Facades\DB;


class StatisticController extends Controller
{
    // สถิติ รายปี ,หน้าแรก
    public function statistics_yearly(Request $request)
    {
        $menu = 'statistics';

        $chartType = $request->query('chartType', 'pie');

        $years = Internship_Detail::join('students', 'internship_details.student_id', '=', 'students.student_id')
            ->whereIn('students.student_type', ['internship', 'former'])
            ->orderBy('year', 'desc')->pluck('year')->unique();
        if ($years->isEmpty()) {
            session()->flash('error', 'ไม่พบข้อมูลปีที่พร้อมใช้งาน');
            return view('admin.statistic', compact('menu'));
        }

        $selectedYear = $request->query('year', $years->first());

        $internshipsBySemester = Internship_Detail::join('students', 'internship_details.student_id', '=', 'students.student_id')
            ->whereIn('students.student_type', ['internship', 'former'])
            ->where('internship_details.year', $selectedYear)
            ->select('internship_details.register_semester')
            ->selectRaw('count(*) as count')
            ->groupBy('internship_details.register_semester')
            ->orderBy('internship_details.register_semester')
            ->get();

        if ($internshipsBySemester->isEmpty()) {
            $chart = null;
        } else {
            $semesters = $internshipsBySemester->pluck('register_semester')->toArray();
            $counts = $internshipsBySemester->pluck('count')->toArray();

            if ($chartType == 'pie' || $chartType == 'donut') {
                $chart = (new LarapexChart)
                    ->{$chartType . 'Chart'}()
                    ->setTitle("Internships by Semester in $selectedYear")
                    ->addData($counts)
                    ->setLabels($semesters);
            } else {
                $chart = (new LarapexChart)
                    ->{$chartType . 'Chart'}()
                    ->setTitle("Internships by Semester in $selectedYear")
                    ->addData('Internship Counts', $counts)
                    ->setLabels($semesters);
            }
        }


        return view('admin.statistics_yearly', compact('menu', 'chart', 'selectedYear', 'years', 'chartType'));
    }

    // สถิติ เปรียบเทียบสถิติรายปี ,หน้าแรก
    function statistics_compare_yearly(Request $request)
    {
        $menu = 'statistics';

        $chartType = $request->query('chartType', 'bar');

        $years = Internship_Detail::join('students', 'internship_details.student_id', '=', 'students.student_id')
            ->whereIn('students.student_type', ['internship', 'former'])
            ->orderBy('year', 'desc')->pluck('year')->unique();

        if ($years->isEmpty()) {
            session()->flash('error', 'ไม่พบข้อมูลปีที่พร้อมใช้งาน');
            return view('admin.statistics_compare_yearly', compact('menu'));
        }

        $startYear = $request->query('startYear', $years->last());
        $endYear = $request->query('endYear', $years->first());

        $internships_compare_year = Internship_Detail::join('students', 'internship_details.student_id', '=', 'students.student_id')
            ->whereIn('students.student_type', ['internship', 'former'])
            ->whereBetween('year', [$startYear, $endYear])
            ->select(DB::raw('year, register_semester, COUNT(*) as count'))
            ->groupBy('year', 'register_semester')
            ->orderBy('year')
            ->orderBy('register_semester')
            ->get();

        if ($internships_compare_year->isEmpty()) {
            $chart = null;
        } else {
            $result = [];
            $semesterOrder = ['1', '2', 'S', 'retake1', 'retake2'];

            // Organize the data
            foreach ($internships_compare_year as $record) {
                $year = $record->year;
                $semester = $record->register_semester;
                $count = $record->count;

                if (!isset($result[$year])) {
                    $result[$year] = [
                        'semester_counts' => [],
                    ];
                }
                // Store the count for the semester
                $result[$year]['semester_counts'][$semester] = $count;
            }

            // Ensure all semesters are accounted for and format the result
            foreach ($result as $year => $data) {
                $newCounts = []; // New array for ordered counts
                foreach ($semesterOrder as $semester) {
                    $newCounts[$semester] = $data['semester_counts'][$semester] ?? 0;
                }

                $result[$year]['semester_counts'] = $newCounts;
            }

            // Initialize the chart
            $chart = (new LarapexChart)
                ->{$chartType . 'Chart'}()
                ->setTitle('Internship Statistics')
                ->setSubtitle('Counts of Semesters by Year');

            // Add data to the chart
            foreach ($result as $year => $data) {
                $chart->addData('Year: ' . $year, array_values($data['semester_counts']));
            }

            $chart->setXAxis($semesterOrder);
        }

        return view('admin.statistics_compare_yearly', compact('menu', 'chart', 'startYear', 'endYear', 'years', 'chartType'));
    }




    // สถิติ แบบประเมิน ,หน้าแรก
    function statistics_evaluation()
    {
        $menu = 'statistics';
        return view('admin.admin_layout', compact('menu'));
    }
}
