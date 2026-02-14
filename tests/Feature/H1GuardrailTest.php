<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class H1GuardrailTest extends TestCase
{
    use RefreshDatabase;

    public function test_key_pages_render_single_h1(): void
    {
        foreach (['/', '/gemstones', '/education', '/contact', '/consultation', '/faq'] as $path) {
            $response = $this->get($path);
            $response->assertOk();

            $h1Count = substr_count(strtolower($response->getContent()), '<h1');
            $this->assertSame(1, $h1Count, "Expected exactly one H1 on {$path}");
        }
    }
}
