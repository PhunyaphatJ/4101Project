<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Application;
use App\Models\Student;
use App\Models\Person;
use App\Models\Internship_detail;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'student_id' => $this->faker->unique()->numerify('##########'), 
            'applicant_email' => $this->faker->unique()->safeEmail,
            'application_type' => 'Internship_Register',
            'application_status' => $this->faker->randomElement(['approval_pending', 'reject', 'document_pending', 'completed']),
            'sent' => $this->faker->dateTime,
            'internship_detail_id' => null, 
        ];
    }

    public function student(Student $student)
    {
        return $this->state([
            'student_id' => $student->student_id,
        ]);
    }

    public function applicant(Person $person)
    {
        return $this->state([
            'applicant_email' => $person->email,
        ]);
    }

    public function internship_detail(Internship_detail $internship_detail) 
    {
        return $this->state([
            'internship_detail_id' => $internship_detail->internship_detail_id,
            'application_type' => $this->faker->randomElement([ 'Internship_Request', 'Recommendation', 'Appreciation']),
        ]);
    }
}
