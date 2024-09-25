<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntershipInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('internship_info')->insert([
        [
            'student_email'=>'student1@example.com',
            'professor_email'=>'professor1@example.com',
            'mentor_email'=>'mentor1@example.com',
            'company_id'=>1,
            'register_semester'=>'1',
            'year'=>2024,
            'start_date'=>'2024-01-09',
            'end_date'=>'2025-10-01',
        ],
       ]);

    }
}
