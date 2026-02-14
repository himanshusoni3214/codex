<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GemstoneSeeder extends Seeder
{
    public function run(): void
    {
        // Backward-compatible alias:
        // running `db:seed --class=GemstoneSeeder` now seeds inventory-based
        // products/pieces and then refreshes SEO taxonomies.
        $this->call([
            InventorySeeder::class,
            SeoSiloSeeder::class,
        ]);
    }
}
