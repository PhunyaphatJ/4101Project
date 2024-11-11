<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class GradeController extends Controller
{
    function students_grade(Request $request)
    {
        $menu = '';
        $request->validate(
            [
                'name' => 'nullable|string',
                'student_id' => 'nullable|string'
            ],
            [
                'name.string' => 'ชื่อจะต้องเป็นข้อความ',
                'student_id.string' => 'รหัสนักศึกษาจะต้องเป็นข้อความ'
            ]
        );

        $name = $request->input('name');
        $student_id = $request->input('student_id');

        $query = Student::query();

        if ($name) {
            $query->whereHas('person', function ($query) use ($name) {
                $query->where('name', 'like', $name . '%');
            });
        }

        if ($student_id) {
                $query->where('student_id', 'like', $student_id . '%');
        }
        $query->where('student_type','former');

        $students = $query->paginate(10);

        if ($students->isEmpty()) {
            session()->flash('error', 'ไม่พบบุคคลที่ตรงกับคำค้นหา');
        }
        return view('admin.students_grade', compact('students','menu'));
    }

    function student_grade_detail($student_id)
    {
        $menu = '';
        $student = Student::findOrFail($student_id);

        if ($student->student_type == 'former' || $student->student_type == 'internship') {
            return view('admin.student_grade_detail', compact('student','menu'));
        }
        return redirect()->back()->withErrors(['message' => 'สถานะนักศึกษาไม่ถูกต้อง']);

    }
    
}
