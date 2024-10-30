<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Internship_info;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Mentor;
use App\Models\Internship_detail;

class Internship_infoFactory extends Factory
{
    protected $model = Internship_info::class;

    public function definition()
    {
        return [
            'grade' => $this->faker->randomElement(['A', 'F']),
            'report_file_path' => $this->faker->optional()->filePath(),
        ];
    }
    public function student(Student $student)
    {
        return $this->state([
            'student_id' => $student->student_id,
        ]);
    }

    public function professor(Professor $professor)
    {
        return $this->state([
            'professor_id' => $professor->professor_id,
        ]);
    }

    public function mentor(Mentor $mentor)
    {
        return $this->state([
            'mentor_email' => $mentor->email,
        ]);
    }

    public function internship_detail(Internship_detail $internship_detail)
    {
        return $this->state([
            'internship_detail_id' => $internship_detail->internship_detail_id,
        ]);
    }
}
