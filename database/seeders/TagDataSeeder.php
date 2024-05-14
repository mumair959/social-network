<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagDataSeeder extends Seeder
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
                'name' => '#cricket'
            ],
            [
                'id'   =>  2,
                'name' => '#football'
            ],
            [
                'id'   =>  3,
                'name' => '#movie'
            ]
        ];

       	DB::table('tags')->upsert($data, ['id'], $updated);
    }
}
