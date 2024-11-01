<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evidence;
use App\Models\Student;

class EvidenceFactory extends Factory
{
    protected $model = Evidence::class;

    public function definition()
    {
        return [
            'credit' => $this->faker->numberBetween(0, 100),
            'idcard_path' => $this->faker->word . '.jpg', 
            'transcript_path' => $this->faker->word . '.pdf',
            'recentreceipt_path' => $this->faker->word . '.pdf',
        ];
    }

    public function student(Student $student)
    {
        return $this->state([
            'student_id' => $student->student_id,
        ]);
    }
}
