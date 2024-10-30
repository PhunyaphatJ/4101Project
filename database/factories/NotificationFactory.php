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
            'datetime' => $this->faker->dateTime(), 
            'subject' => $this->faker->sentence(), 
            'details' => substr($this->faker->paragraph(), 0, 255),        
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
