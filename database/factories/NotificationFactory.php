<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notification; 
use App\Models\User; 

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        return [
            'sender_email' => User::factory()->create()->email, 
            'receiver_email' => User::factory()->create()->email, 
            'datetime' => $this->faker->dateTime(), 
            'subject' => $this->faker->sentence(), 
            'details' => $this->faker->paragraph(), 
        ];
    }

    public function sender(User $user)
    {
        return $this->state([
            'sender_email' => $user->email,
        ]);
    }

    public function receiver(User $user)
    {
        return $this->state([
            'receiver_email' => $user->email,
        ]);
    }
}
