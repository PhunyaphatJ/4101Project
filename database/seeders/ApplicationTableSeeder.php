<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            [
                'application_name'=>'ลงทะเบียนฝึกงาน',
                'document_status'=>'approval_pending',
                'student_email'=>'student1@example.com',
            ],
            [
                'application_name'=>'หนังสือส่งตัว',
                'document_status'=>'completed',
                'student_email'=>'student1@example.com',
            ],
            [
                'application_name'=>'หนังสือขอความอนุเคราะห์',
                'document_status'=>'document_pending',
                'student_email'=>'student1@example.com',
            ],
            [
                'application_name'=>'หนังสือขอบคุณ',
                'document_status'=>'completed',
                'student_email'=>'student1@example.com',
            ],
        ]);
    }
}
