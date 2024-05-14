<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupsDataSeeder extends Seeder
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
                'title' => 'Group 1',
                'description' => 'This is group 1 description',
                'created_by' => 1
            ],
            [
                'id' =>  2,
                'title' => 'Group 2',
                'description' => 'This is group 2 description',
                'created_by' => 1
            ],
            [
                'id' =>  3,
                'title' => 'Group 3',
                'description' => 'This is group 3 description',
                'created_by' => 1
            ]
        ];

       	DB::table('groups')->upsert($data, ['id'], $updated);
    }
}
