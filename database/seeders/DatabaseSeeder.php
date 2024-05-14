<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            UserTypeSeeder::class,
            RoleDataSeeder::class,
            PermissionDataSeeder::class,
            AdminDataSeeder::class,
            CountryDataSeeder::class,
            CityDataSeeder::class,
            //todo: Test data seeders, remove on production 
            TagDataSeeder::class,
            GroupsDataSeeder::class,
            PagesDataSeeder::class,
            FAQsDataSeeder::class,
            UserDataSeeder::class
        ];

        $this->call($seeders);
    }
}
