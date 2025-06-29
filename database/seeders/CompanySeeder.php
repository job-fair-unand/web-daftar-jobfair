<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companyUsers = User::where('role', 'company')->get();

        foreach ($companyUsers as $index => $user) {
            Company::create([
                'user_id' => $user->id,
                'logo' => 'company_logo_' . ($index + 1) . '.png',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(0, 5)),
            ]);
        }
    }
}