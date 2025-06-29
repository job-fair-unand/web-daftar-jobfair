<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            SponsorSeeder::class,
            BusinessSeeder::class,
            ScholarshipSeeder::class,
            ParticipantSeeder::class,
            BoothSeeder::class,
        ]);
    }
}