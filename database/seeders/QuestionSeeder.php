<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('question_forms')->insert([
            [
                'form_id'=>1,
                'form_name'=>'form_1',
            ],
            [
                'form_id'=>2,
                'form_name'=>'form_2',
            ],
        ]);

        DB::table('question_parts')->insert([
            [
                'form_id'=>1,
                'part_id'=>1,
                'part_text'=>'part_1-1',
            ],
            [
                'form_id'=>1,
                'part_id'=>2,
                'part_text'=>'part_1-2',
            ],
        ]);

        DB::table('question_lists')->insert([
            [
                'form_id'=>1,
                'part_id'=>1,
                'question_id'=>1,
                'question_text'=>'question_1-1-1',
            ],
            [
                'form_id'=>1,
                'part_id'=>1,
                'question_id'=>2,
                'question_text'=>'question_1-1-2',
            ],
            [
                'form_id'=>1,
                'part_id'=>1,
                'question_id'=>3,
                'question_text'=>'question_1-1-3',
            ],
            [
                'form_id'=>1,
                'part_id'=>2,
                'question_id'=>1,
                'question_text'=>'question_1-2-1',
            ],
            [
                'form_id'=>1,
                'part_id'=>2,
                'question_id'=>2,
                'question_text'=>'question_1-2-2',
            ],
            [
                'form_id'=>1,
                'part_id'=>2,
                'question_id'=>3,
                'question_text'=>'question_1-2-3',
            ],
        ]);

        DB::table('evaluation_answers')->insert([
            [
                'form_id'=>1,
                'part_id'=>1,
                'question_id'=>1,
                'internship_id'=>1,
            ],
            [
                'form_id'=>1,
                'part_id'=>1,
                'question_id'=>2,
                'internship_id'=>1,
            ],
            [
                'form_id'=>1,
                'part_id'=>1,
                'question_id'=>3,
                'internship_id'=>1,
            ],
        ]);
    }
}
