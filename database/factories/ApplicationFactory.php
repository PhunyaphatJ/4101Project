<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Application;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Internship_detail;
use App\Models\Notification;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'application_type' => 'Internship_Register',
            'application_status' => $this->faker->randomElement(['approval_pending', 'reject', 'document_pending', 'completed']),
            'internship_detail_id' => null, 
        ];
    }

    public function student(Student $student)
    {
        return $this->state([
            'student_id' => $student->student_id,
            'applicant_email' => $student->email,
            'notification_id' =>  Notification::factory()->sender($student->person->user)->receiver($student->person->user)->create()->notification_id,
        ]);
    }

    public function appreciation(Professor $professor,Student $student)
    {
        return $this->state([
            'student_id' => $student->student_id,
            'applicant_email' => $professor->email,
            'application_type' => 'Appreciation',
            'notification_id' =>  Notification::factory()->sender($professor->person->user)->receiver($student->person->user)->create()->notification_id,
        ]);
    }


    public function internship_detail(Internship_detail $internship_detail) 
    {
        return $this->state([
            'internship_detail_id' => $internship_detail->internship_detail_id,
        ]);
    }

    public function application_type(String $type){
        return $this->state([
            'application_type' => $type,
        ]);
    }
}
