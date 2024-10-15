<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model = \App\Models\Admin::class;

    public function definition()
    {
        $user = \App\Models\User::factory()->create([
            'role' => 'admin',
        ]);

        \App\Models\Person::factory()->create([
            'email' => $user->email,
        ]);

        return [
            'email' => $user->email,
            'status' => $this->faker->randomElement(['active', 'no_active']),
        ];
    }
}

