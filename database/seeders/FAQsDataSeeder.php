<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updated = [
            'question', 'answer'
        ];
        $data = [
            [
                'id'   =>  1,
                'question' => 'This is testing question 1',
                'answer' => 'This is testing answer 1'
            ],
            [
                'id'   =>  2,
                'question' => 'This is testing question 2',
                'answer' => 'This is testing answer 2'
            ],
            [
                'id'   =>  3,
                'question' => 'This is testing question 3',
                'answer' => 'This is testing answer 3'
            ],
            [
                'id'   =>  4,
                'question' => 'This is testing question 4',
                'answer' => 'This is testing answer 4'
            ],
            [
                'id'   =>  5,
                'question' => 'This is testing question 5',
                'answer' => 'This is testing answer 5'
            ]
        ];

       	DB::table('faqs')->upsert($data, ['id'], $updated);
    }
}
