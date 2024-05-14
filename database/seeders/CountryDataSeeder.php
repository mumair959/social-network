<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updated = [
            'name'
        ];
        $data = [
            [
                'id'   =>  1,
                'name' => 'Australia'
            ]
        ];

       	DB::table('countries')->upsert($data, ['id'], $updated);
    }
}
