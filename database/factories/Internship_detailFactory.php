<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Internship_detail; // Ensure this matches your model name
use App\Models\Student;
use App\Models\Company;

class Internship_detailFactory extends Factory
{
    protected $model = Internship_detail::class; 

    public function definition()
    {
        return [
            'register_semester' => $this->faker->randomElement(['1', '2', 'S', 'retake1', 'retake2']),
            'year' => $this->faker->year(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'attend_to' => $this->faker->optional()->sentence(),
        ];
    }

    public function student(Student $student)
    {
        return $this->state([
            'student_id' => $student->student_id,
        ]);
    }

    public function company(Company $company)
    {
        return $this->state([
            'company_id' =>  $company->company_id,
        ]);
    }
}
