<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email'=> 'admin@example.com',
                'password'=>Hash::make('12345678'),
                'roles'=>'admin',
            ],
            [
                'email'=> 'professor1@example.com',
                'password'=>Hash::make('12345678'),
                'roles'=>'professor',

            ],
            [
                'email'=> 'student1@example.com',
                'password'=>Hash::make('12345678'),
                'roles'=>'student',
            ],
        ]);

        DB::table('persons')->insert([
            [
                'email'=> 'admin@example.com',
                'prefix'=>'MR',
                'name'=>'admin',
                'surname'=>'admin',
            ],
            [
                'email'=> 'professor1@example.com',
                'prefix'=>'MR',
                'name'=>'professor',
                'surname'=>'professor',

            ],
            [
                'email'=> 'student1@example.com',
                'prefix'=>'MRS',
                'name'=>'student',
                'surname'=>'student',       
            ],
        ]);
        DB::table('students')->insert([
            [
                'email'=>"student1@example.com",
                'student_id'=>'705000879',
                'address_id'=>1,
                'department'=>'CS',
            ],
        ]);
        DB::table('professors')->insert([
            [
                'email'=>'professor1@example.com',
                'professor_id'=>'1234567890',
            ],
        ]);
    }
}
