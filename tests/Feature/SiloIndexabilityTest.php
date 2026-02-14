<?php

namespace Tests\Feature;

use App\Models\GemstoneType;
use App\Models\Origin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiloIndexabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_indexable_type_returns_404(): void
    {
        GemstoneType::create([
            'name' => 'Ruby',
            'slug' => 'ruby',
            'is_indexable' => false,
        ]);

        $this->get('/gemstones/ruby')->assertNotFound();
    }

    public function test_non_indexable_origin_returns_404(): void
    {
        $type = GemstoneType::create([
            'name' => 'Sapphire',
            'slug' => 'sapphire',
            'is_indexable' => true,
        ]);

        Origin::create([
            'name' => 'Ceylon',
            'slug' => 'ceylon',
            'gemstone_type_id' => $type->id,
            'is_indexable' => false,
        ]);

        $this->get('/gemstones/sapphire/ceylon')->assertNotFound();
    }
}

