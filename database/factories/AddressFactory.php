<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'house_no' => $this->faker->buildingNumber, 
            'village_no' => $this->faker->randomNumber(2, true), 
            'road' => $this->faker->streetName, 
            'sub_district' => $this->faker->word, 
            'district' => $this->faker->word, 
            'province' => $this->faker->word, 
            'postal_code' => $this->faker->postcode, 
        ];
    }
}
