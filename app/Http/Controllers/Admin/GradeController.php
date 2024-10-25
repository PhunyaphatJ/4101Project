<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class GradeController extends Controller
{
    function students_grade(){
        $students = Student::whereIn('student_type',['internship','former'])->get();


        return view('student.test_grade', compact('students'));
    }

    function student_grade_detail($student_id){
        $student = Student::findOrFail($student_id);

        if($student->student_type != 'former' || $student->student_type != 'internship'){
            return redirect()->back()->withErrors(['message' => 'สถานะนักศึกษาไม่ถูกต้อง']);        
        }

        return view('student.student_grade_detail', compact('student'));
    }
}
