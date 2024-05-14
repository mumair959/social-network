<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updated = [
            'name', 'country_id'
        ];
        $data = [
            [
                'id'   =>  1,
                'name' => 'Canberra',
                'country_id' => 1
            ],
            [
                'id'   =>  2,
                'name' => 'Sydney',
                'country_id' => 1
            ],
            [
                'id'   =>  3,
                'name' => 'Melbourne',
                'country_id' => 1
            ],
            [
                'id'   =>  4,
                'name' => 'Brisbane',
                'country_id' => 1
            ],
            [
                'id'   =>  5,
                'name' => 'Adelaide',
                'country_id' => 1
            ],
            [
                'id'   =>  6,
                'name' => 'Perth',
                'country_id' => 1
            ],
            [
                'id'   =>  7,
                'name' => 'Hobart',
                'country_id' => 1
            ],
            [
                'id'   =>  8,
                'name' => 'Darwin',
                'country_id' => 1
            ],
            [
                'id'   =>  9,
                'name' => 'Cairns',
                'country_id' => 1
            ]
        ];

       	DB::table('cities')->upsert($data, ['id'], $updated);
    }
}
