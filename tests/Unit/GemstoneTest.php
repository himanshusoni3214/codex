<?php

namespace Tests\Unit;

use App\Models\Gemstone;
use Tests\TestCase;

class GemstoneTest extends TestCase
{
    public function test_route_key_name_is_slug(): void
    {
        $gemstone = new Gemstone();
        $this->assertSame('slug', $gemstone->getRouteKeyName());
    }
}
