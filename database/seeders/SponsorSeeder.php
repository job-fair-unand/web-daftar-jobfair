<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    public function run(): void
    {
        $sponsorUsers = User::where('role', 'sponsor')->get();
        $packages = ['platinum', 'gold', 'silver', 'bronze'];
        
        $sponsorData = [
            [
                'logo' => 'mandiri_logo.png',
                'sponsor_package' => 'platinum',
                'mou' => 'mou_mandiri.pdf',
                'wish_for_event' => 'Kami berharap acara ini dapat menjadi wadah untuk menemukan talenta-talenta terbaik Indonesia dan memberikan kontribusi positif untuk pengembangan SDM.',
            ],
            [
                'logo' => 'telkomsel_logo.png', 
                'sponsor_package' => 'gold',
                'mou' => 'mou_telkomsel.pdf',
                'wish_for_event' => 'Telkomsel berkomitmen mendukung ekosistem digital Indonesia melalui pengembangan talent digital yang unggul.',
            ],
            [
                'logo' => 'gojek_logo.png',
                'sponsor_package' => 'silver',
                'mou' => 'mou_gojek.pdf',
                'wish_for_event' => 'Gojek ingin berkontribusi dalam menciptakan peluang karir terbaik bagi generasi muda Indonesia.',
            ]
        ];

        foreach ($sponsorUsers as $index => $user) {
            $data = $sponsorData[$index] ?? [
                'logo' => 'sponsor_logo_' . ($index + 1) . '.png',
                'sponsor_package' => $packages[array_rand($packages)],
                'mou' => 'mou_sponsor_' . ($index + 1) . '.pdf',
                'wish_for_event' => 'Kami berharap dapat berkontribusi dalam kesuksesan acara ini.',
            ];

            Sponsor::create([
                'user_id' => $user->id,
                'logo' => $data['logo'],
                'sponsor_package' => $data['sponsor_package'],
                'mou' => $data['mou'],
                'wish_for_event' => $data['wish_for_event'],
                'created_at' => now()->subDays(rand(1, 45)),
                'updated_at' => now()->subDays(rand(0, 7)),
            ]);
        }
    }
}