<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        $user = \App\Models\User::factory()->create([
            'role' => 'student',
        ]);

        \App\Models\Person::factory()->create([
            'email' => $user->email,
        ]);

        return [
            'email' => $user->email,
            'student_id' => $this->faker->unique()->numerify('##########'), 
            'student_type' => $this->faker->randomElement(['no_register', 'general', 'internship', 'former']),
            'department' => $this->faker->randomElement(['CS', 'IT']),
        ];
    }
}
