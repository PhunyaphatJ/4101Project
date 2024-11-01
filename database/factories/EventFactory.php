<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event; 
use App\Models\Internship_info; 

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(), 
            'sent' => $this->faker->boolean(), 
        ];
    }

    public function student(Internship_info $internship_info)
    {
        return $this->state([
            'student_id' => $internship_info->student_id,
        ]);
    }
}
