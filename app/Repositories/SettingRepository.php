<?php

namespace App\Repositories;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class SettingRepository
{
    public function all(): array
    {
        if (! Schema::hasTable('settings')) {
            return [];
        }

        return Setting::all()->pluck('value', 'key')->toArray();
    }

    public function updateMany(array $data): void
    {
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
