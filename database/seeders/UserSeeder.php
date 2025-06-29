<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin ACEED EXPO',
            'email' => 'admin@aceedexpo.com',
            'phone_number' => '081234567890',
            'address' => 'Jl. Admin Utama No. 1, Jakarta',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);

        // Company Users
        $companies = [
            [
                'name' => 'PT Teknologi Maju',
                'email' => 'hr@teknologimaju.com',
                'phone_number' => '021-12345678',
                'address' => 'Jl. Sudirman No. 100, Jakarta Selatan',
                'role' => 'company',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'CV Digital Solutions',
                'email' => 'recruitment@digitalsol.com',
                'phone_number' => '021-87654321',
                'address' => 'Jl. Gatot Subroto No. 25, Jakarta Pusat',
                'role' => 'company',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'PT Inovasi Kreatif',
                'email' => 'career@inovasikreatif.co.id',
                'phone_number' => '021-11223344',
                'address' => 'Jl. Kuningan No. 88, Jakarta Selatan',
                'role' => 'company',
                'email_verified_at' => null, // Belum verifikasi
            ],
            [
                'name' => 'Startup Tech Indonesia',
                'email' => 'jobs@startuptech.id',
                'phone_number' => '021-99887766',
                'address' => 'Jl. Casablanca No. 15, Jakarta Selatan',
                'role' => 'company',
                'email_verified_at' => now(),
            ]
        ];

        foreach ($companies as $company) {
            User::create(array_merge($company, [
                'password' => Hash::make('password123')
            ]));
        }

        // Sponsor Users
        $sponsors = [
            [
                'name' => 'Bank Mandiri',
                'email' => 'partnership@bankmandiri.co.id',
                'phone_number' => '021-14045',
                'address' => 'Jl. Jendral Gatot Subroto Kav. 36-38, Jakarta',
                'role' => 'sponsor',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Telkomsel',
                'email' => 'corporate@telkomsel.com',
                'phone_number' => '021-52992999',
                'address' => 'Jl. Gatot Subroto Kav. 52, Jakarta Selatan',
                'role' => 'sponsor',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Gojek Indonesia',
                'email' => 'partnership@gojek.com',
                'phone_number' => '021-50885000',
                'address' => 'Jl. Iskandarsyah II No. 2, Jakarta Selatan',
                'role' => 'sponsor',
                'email_verified_at' => null,
            ]
        ];

        foreach ($sponsors as $sponsor) {
            User::create(array_merge($sponsor, [
                'password' => Hash::make('password123')
            ]));
        }

        // UMKM Users
        $umkms = [
            [
                'name' => 'Warung Makan Sederhana',
                'email' => 'owner@warungsederhana.com',
                'phone_number' => '081234567891',
                'address' => 'Jl. Kebon Jeruk No. 45, Jakarta Barat',
                'role' => 'umkm',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Toko Kerajinan Bambu',
                'email' => 'info@kerajinanbambu.com',
                'phone_number' => '081234567892',
                'address' => 'Jl. Rawamangun No. 12, Jakarta Timur',
                'role' => 'umkm',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Catering Mama Sarah',
                'email' => 'order@cateringmamasarah.com',
                'phone_number' => '081234567893',
                'address' => 'Jl. Cempaka Putih No. 88, Jakarta Pusat',
                'role' => 'umkm',
                'email_verified_at' => null,
            ]
        ];

        foreach ($umkms as $umkm) {
            User::create(array_merge($umkm, [
                'password' => Hash::make('password123')
            ]));
        }

        // Scholarship Users
        $scholarships = [
            [
                'name' => 'Yayasan Pendidikan Indonesia',
                'email' => 'info@ypindonesia.org',
                'phone_number' => '021-7654321',
                'address' => 'Jl. Pendidikan No. 123, Jakarta Pusat',
                'role' => 'scholarship',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Beasiswa Prestasi Nasional',
                'email' => 'admin@beasiswaprestasi.id',
                'phone_number' => '021-9876543',
                'address' => 'Jl. Merdeka No. 456, Jakarta Pusat',
                'role' => 'scholarship',
                'email_verified_at' => now(),
            ]
        ];

        foreach ($scholarships as $scholarship) {
            User::create(array_merge($scholarship, [
                'password' => Hash::make('password123')
            ]));
        }
    }
}