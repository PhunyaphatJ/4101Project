<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companys')->insert([
            [
                'company_name'=>'company1',
                'phone'=>'09999999',
                'address_id'=>2,
            ],
            [
                'company_name'=>'company2',
                'phone'=>'08888889',
                'address_id'=>1,
            ],
        ]);

        DB::table('mentors')->insert([
            [
                'email'=>'mentor1@example.com',
                'name'=>'mentor',
                'surname'=>'mentor',
                'company_id'=>1,
            ],
            [
                'email'=>'mentor2@example.com',
                'name'=>'mentor',
                'surname'=>'mentor',
                'company_id'=>2,
            ],
        ]);
    }
}
