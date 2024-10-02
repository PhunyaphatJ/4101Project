<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipManual_ResponseLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('internship_manuals')->insert([
            'manual_path' =>'c://',
            'admin_email'=>'admin@example.com',
        ]);

        DB::table('response_letters')->insert([
            'response_letter_path'=>'c://',
            'admin_email'=>'admin@example.com',
        ]);
    }
}
