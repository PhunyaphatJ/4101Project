<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mentor;
use App\Models\Company;

class MentorFactory extends Factory
{
    protected $model = Mentor::class;

    public function definition()
    {
        $company = \App\Models\Company::factory()->create(); 

        return [
            'email' => $this->faker->unique()->safeEmail, 
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'position' => $this->faker->jobTitle,
            'phone' => $this->faker->optional()->numerify('##########'), 
            'fax' => $this->faker->optional()->numerify('##########'), 
            'company_id' => $company->company_id, 
        ];
    }
    public function company(Company $company)
    {
        return $this->state([
            'company_id' => $company->company_id, 
        ]);
    }
}
