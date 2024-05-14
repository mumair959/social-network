<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updated = [
            'title', 'description', 'created_by'
        ];

        $data = [
            [
                'id' =>  1,
                'title' => 'Page 1',
                'description' => 'This is page 1 description',
                'created_by' => 1
            ],
            [
                'id' =>  2,
                'title' => 'Page 2',
                'description' => 'This is page 2 description',
                'created_by' => 1
            ],
            [
                'id' =>  3,
                'title' => 'Page 3',
                'description' => 'This is page 3 description',
                'created_by' => 1
            ]
        ];

       	DB::table('pages')->upsert($data, ['id'], $updated);
    }
}
