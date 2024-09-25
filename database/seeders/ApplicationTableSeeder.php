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

        DB::table('internship_registers')->insert([
            [
                'application_id'=>1,
                'student_id'=>'705000879',
                'credit'=>100,
                'department'=>'CS',
                'transcript_path'=>'c://',
                'idcard_path'=>'c://',
                'recentreceipt_path'=>'c://',
            ],
        ]);

        DB::table('internship_app_info')->insert([
            [
                'company_name'=>'company1',
                'company_address'=>1,
                'company_phone'=>'023412345',
                'register_semester'=>'s',
                'year'=>2024,
                'start_date'=>'2024-09-30',
                'end_date'=>'2024-12-30',
            ],
        ]);
        
        DB::table('internship_request_apps')->insert([
            [
                'application_id'=>3,
                'internship_app_info_id'=>1,
            ],
        ]);

        DB::table('recommendation_apps')->insert([
            [
                'application_id'=>2,
                'internship_app_info_id'=>1,
                'mentor_email'=>'mentor1@example.com',
                'response_letter_path'=>'c:///',
            ],
        ]);

        DB::table('appreciation_apps')->insert([
            [
                'application_id'=>4,
                'professor_email'=>'professor1@example.com',
                'company_id'=>1,
            ],
        ]);
    }
}
