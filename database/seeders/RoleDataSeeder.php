<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updated = [
            'name', 'display_name'
        ];
        $data = [
            [
                'id'   =>  1,
                'name' => 'admin',
                'display_name' => 'Admin'
            ]
        ];

       	DB::table('roles')->upsert($data, ['id'], $updated);
    }
}
