<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'company_name' => $this->faker->company,
            'phone' => $this->faker->numerify('##########'),
            'address_id' => \App\Models\Address::factory()->create()->address_id, 
            'fax' => $this->faker->optional()->numerify('##########'), 
        ];
    }
}