<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'site_name' => 'Natural Gem Store',
            'logo_path' => '/images/natural-gem-logo.svg',
            'contact_phone' => '+1 (647) 555-0199',
            'contact_email' => 'hello@naturalgem.com',
            'contact_address' => 'Toronto, Ontario, Canada',
            'whatsapp' => '+1 (647) 555-0199',
            'cta_text' => 'Explore Certified Gemstones',
            'currency' => 'CAD',
            'tax_note' => 'GST/HST calculated at checkout based on your province.',
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
