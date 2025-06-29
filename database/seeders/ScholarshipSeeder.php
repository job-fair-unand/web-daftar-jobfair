<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        $scholarshipUsers = User::where('role', 'scholarship')->get();
        
        $scholarshipData = [
            [
                'logo' => 'ypi_logo.png',
                'description' => 'Yayasan Pendidikan Indonesia menyediakan beasiswa penuh untuk mahasiswa berprestasi dari keluarga kurang mampu. Program ini mencakup biaya kuliah, uang saku bulanan, dan bimbingan akademik.',
                'file' => 'brosur_beasiswa_ypi.pdf',
            ],
            [
                'logo' => 'bpn_logo.png',
                'description' => 'Beasiswa Prestasi Nasional memberikan kesempatan bagi siswa-siswi terbaik Indonesia untuk melanjutkan pendidikan ke jenjang yang lebih tinggi dengan dukungan finansial penuh.',
                'file' => 'info_beasiswa_prestasi.pdf',
            ]
        ];

        foreach ($scholarshipUsers as $index => $user) {
            $data = $scholarshipData[$index] ?? [
                'logo' => 'scholarship_logo_' . ($index + 1) . '.png',
                'description' => 'Program beasiswa untuk mendukung pendidikan generasi muda Indonesia.',
                'file' => 'brosur_beasiswa_' . ($index + 1) . '.pdf',
            ];

            Scholarship::create([
                'user_id' => $user->id,
                'logo' => $data['logo'],
                'description' => $data['description'],
                'file' => $data['file'],
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(0, 5)),
            ]);
        }
    }
}