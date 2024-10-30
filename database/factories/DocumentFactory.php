<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Document;
use App\Models\Admin; 

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition()
    {
        return [
            'document_path' => $this->faker->filePath(),
            'document_type' => $this->faker->randomElement(['pdf', 'docx', 'xlsx']), 
        ];
    }

    public function admin(Admin $admin)
    {
        return $this->state([
            'admin_email' => $admin->email, 
        ]);
    }
}
