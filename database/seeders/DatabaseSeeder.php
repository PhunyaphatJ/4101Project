<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AddressTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(ApplicationTableSeeder::class);
        $this->call(IntershipInfoTableSeeder::class);
        $this->call(InternshipManual_ResponseLetterSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
