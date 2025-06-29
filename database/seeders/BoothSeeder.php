<?php

namespace Database\Seeders;

use App\Models\Booth;
use App\Models\Company;
use Illuminate\Database\Seeder;

class BoothSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();
        
        $booths = [
            [
                'name' => 'Booth A1',
                'size' => '3x3 meter',
                'facility' => 'Meja, kursi, listrik, wifi',
                'price' => 5000000,
                'picture' => 'booth_a1.jpg',
                'status' => 'booked',
                'company_id' => $companies->first()?->id,
            ],
            [
                'name' => 'Booth A2',
                'size' => '3x3 meter',
                'facility' => 'Meja, kursi, listrik, wifi',
                'price' => 5000000,
                'picture' => 'booth_a2.jpg',
                'status' => 'booked',
                'company_id' => $companies->skip(1)->first()?->id,
            ],
            [
                'name' => 'Booth B1',
                'size' => '4x4 meter',
                'facility' => 'Meja, kursi, listrik, wifi, proyektor',
                'price' => 7500000,
                'picture' => 'booth_b1.jpg',
                'status' => 'available',
                'company_id' => null,
            ],
            [
                'name' => 'Booth B2',
                'size' => '4x4 meter',
                'facility' => 'Meja, kursi, listrik, wifi, proyektor',
                'price' => 7500000,
                'picture' => 'booth_b2.jpg',
                'status' => 'available',
                'company_id' => null,
            ],
            [
                'name' => 'Booth Premium 1',
                'size' => '5x5 meter',
                'facility' => 'Meja, kursi, listrik, wifi, proyektor, sound system',
                'price' => 10000000,
                'picture' => 'booth_premium1.jpg',
                'status' => 'available',
                'company_id' => null,
            ]
        ];

        foreach ($booths as $booth) {
            Booth::create($booth);
        }
    }
}