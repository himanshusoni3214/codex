<?php

namespace Database\Seeders;

use App\Models\ConsultationTier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ConsultationTierSeeder extends Seeder
{
    public function run(): void
    {
        $tiers = [
            ['name' => 'Basic', 'price_cad' => 150, 'duration_minutes' => 45],
            ['name' => 'Premium', 'price_cad' => 300, 'duration_minutes' => 75],
            ['name' => 'Master', 'price_cad' => 500, 'duration_minutes' => 120],
        ];

        foreach ($tiers as $tier) {
            ConsultationTier::updateOrCreate(
                ['slug' => Str::slug($tier['name'])],
                [
                    'name' => $tier['name'],
                    'price_cad' => $tier['price_cad'],
                    'duration_minutes' => $tier['duration_minutes'],
                    'description' => 'Appointment-only consultation tier.',
                    'is_active' => true,
                ]
            );
        }
    }
}
