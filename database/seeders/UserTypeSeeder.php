<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
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
                'name' => 'Admin'
            ],
            [
                'id'   =>  2,
                'name' => 'User'
            ]
        ];

       	DB::table('user_types')->upsert($data, ['id'], $updated);
    }
}
