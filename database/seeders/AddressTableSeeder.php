<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            [
                'house_no'=>'9/9',
                'village_no'=>'99',
                'sub_district'=>"huamak",
                'district'=>'bang kapi',
                'province'=>'Krung Thep Maha Nakhon',
                'postal_code'=>'10204',
            ],
            [
                'house_no'=>'8/8',
                'village_no'=>'88',
                'sub_district'=>"huamak",
                'district'=>'bang kapi',
                'province'=>'Krung Thep Maha Nakhon',
                'postal_code'=>'10204',
            ],
        ]);
    }
}
