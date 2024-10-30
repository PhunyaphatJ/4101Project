<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = \App\Models\Professor::class;

    public function definition()
    {
        $user = \App\Models\User::factory()->create([
            'role' => 'professor',
        ]);

        \App\Models\Person::factory()->create([
            'email' => $user->email,
        ]);

        return [
            'email' => $user->email,
            'professor_id' => $this->faker->unique()->numerify('##########'), 
            'remark' => $this->faker->optional()->sentence,
            'status' => $this->faker->randomElement(['active', 'no_active']),
            'assigned' => $this->faker->boolean,
            'last_assigned_at' => now(),
        ];
    }
}

