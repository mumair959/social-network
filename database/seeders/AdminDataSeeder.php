<?php

namespace Database\Seeders;

use App\Models\UserInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updated = [
            'first_name', 'last_name', 'username', 'email', 'password',
        ];

        $user_id = 1;

        $data = [
            [
                'id'   =>  $user_id,
                'first_name' => 'Admin',
                'last_name' => 'User',
                'username' => 'admin',
                'email' => 'admin@buzznstuff.com',
                'user_type_id' => 1,
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        ];

       	DB::table('users')->upsert($data, ['id'], $updated);

        UserInformation::create([
            'user_id' => $user_id, 
            'introduction' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
        ]);
    }
}
