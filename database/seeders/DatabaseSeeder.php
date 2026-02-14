<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            PageSeeder::class,
            InventorySeeder::class,
            SeoSiloSeeder::class,
            TestimonialSeeder::class,
            ConsultationTierSeeder::class,
        ]);
    }
}
