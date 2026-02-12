<?php

namespace Tests\Unit;

use App\Models\Testimonial;
use PHPUnit\Framework\TestCase;

class TestimonialTest extends TestCase
{
    public function test_rating_is_integer_cast(): void
    {
        $testimonial = new Testimonial(['rating' => '5']);
        $this->assertIsInt($testimonial->rating);
        $this->assertSame(5, $testimonial->rating);
    }
}
