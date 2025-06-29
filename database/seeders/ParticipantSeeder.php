<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    public function run(): void
    {
        $participants = [
            [
                'name' => 'Ahmad Fauzi',
                'phone' => '081234567801',
                'email' => 'ahmad.fauzi@email.com',
                'participant_category' => 'Mahasiswa',
                'identity_number' => '3201234567890123',
                'domicile' => 'Jakarta',
                'institution_name' => 'Universitas Indonesia',
                'purpose' => 'Mencari peluang magang dan kerja',
                'where_did_you_hear' => 'Media Sosial',
                'wish_for_event' => 'Semoga dapat bertemu dengan perusahaan impian',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'phone' => '081234567802',
                'email' => 'siti.nurhaliza@email.com',
                'participant_category' => 'Fresh Graduate',
                'identity_number' => '3202345678901234',
                'domicile' => 'Bandung',
                'institution_name' => 'Institut Teknologi Bandung',
                'purpose' => 'Mencari pekerjaan pertama',
                'where_did_you_hear' => 'Website Resmi',
                'wish_for_event' => 'Dapat networking yang luas dan peluang karir yang baik',
            ],
            [
                'name' => 'Budi Santoso',
                'phone' => '081234567803',
                'email' => 'budi.santoso@email.com',
                'participant_category' => 'Professional',
                'identity_number' => '3203456789012345',
                'domicile' => 'Surabaya',
                'institution_name' => 'PT ABC Company',
                'purpose' => 'Mencari peluang karir yang lebih baik',
                'where_did_you_hear' => 'Teman/Kolega',
                'wish_for_event' => 'Menemukan peluang karir yang sesuai dengan passion',
            ],
            [
                'name' => 'Dewi Permatasari',
                'phone' => '081234567804',
                'email' => 'dewi.permata@email.com',
                'participant_category' => 'Mahasiswa',
                'identity_number' => '3204567890123456',
                'domicile' => 'Yogyakarta',
                'institution_name' => 'Universitas Gadjah Mada',
                'purpose' => 'Mencari informasi beasiswa',
                'where_did_you_hear' => 'Kampus',
                'wish_for_event' => 'Mendapat informasi beasiswa untuk melanjutkan studi',
            ],
            [
                'name' => 'Eko Prasetyo',
                'phone' => '081234567805',
                'email' => 'eko.prasetyo@email.com',
                'participant_category' => 'Entrepreneur',
                'identity_number' => '3205678901234567',
                'domicile' => 'Medan',
                'institution_name' => 'CV Eko Jaya',
                'purpose' => 'Mencari partnership bisnis',
                'where_did_you_hear' => 'Media Massa',
                'wish_for_event' => 'Mendapat partner bisnis dan investor',
            ]
        ];

        foreach ($participants as $participant) {
            Participant::create(array_merge($participant, [
                'created_at' => now()->subDays(rand(1, 20)),
                'updated_at' => now()->subDays(rand(0, 3)),
            ]));
        }
    }
}