<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        $businessUsers = User::where('role', 'umkm')->get();
        
        $businessData = [
            [
                'logo' => 'warung_logo.png',
                'type' => 'Kuliner',
                'description' => 'Warung makan yang menyajikan masakan rumahan dengan cita rasa autentik Indonesia. Menggunakan bahan-bahan segar dan bumbu tradisional.',
                'proposal' => 'proposal_warung.pdf',
            ],
            [
                'logo' => 'kerajinan_logo.png',
                'type' => 'Kerajinan',
                'description' => 'Usaha kerajinan bambu yang menghasilkan berbagai produk ramah lingkungan seperti tas, tempat pensil, dan dekorasi rumah.',
                'proposal' => 'proposal_kerajinan.pdf',
            ],
            [
                'logo' => 'catering_logo.png',
                'type' => 'Catering',
                'description' => 'Layanan catering untuk berbagai acara dengan menu yang variatif dan pelayanan profesional.',
                'proposal' => 'proposal_catering.pdf',
            ]
        ];

        foreach ($businessUsers as $index => $user) {
            $data = $businessData[$index] ?? [
                'logo' => 'business_logo_' . ($index + 1) . '.png',
                'type' => ['Kuliner', 'Fashion', 'Teknologi', 'Kerajinan', 'Jasa'][array_rand(['Kuliner', 'Fashion', 'Teknologi', 'Kerajinan', 'Jasa'])],
                'description' => 'Deskripsi usaha UMKM yang berkualitas dan inovatif.',
                'proposal' => 'proposal_business_' . ($index + 1) . '.pdf',
            ];

            Business::create([
                'user_id' => $user->id,
                'logo' => $data['logo'],
                'type' => $data['type'],
                'description' => $data['description'],
                'proposal' => $data['proposal'],
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now()->subDays(rand(0, 10)),
            ]);
        }
    }
}