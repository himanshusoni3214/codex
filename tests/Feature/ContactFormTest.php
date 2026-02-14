<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_stores_inquiry(): void
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '+91 12345 67890',
            'message' => 'I want to know about remedies.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contacts', [
            'email' => 'test@example.com',
            'message' => 'I want to know about remedies.',
        ]);
    }
}
