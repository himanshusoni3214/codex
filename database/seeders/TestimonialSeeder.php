<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::query()->delete();

        $testimonials = [
            [
                'name' => 'Claire Martin',
                'rating' => 5,
                'location' => 'Toronto, ON',
                'comment' => 'Transparent sourcing and clear certification details. The emerald arrived exactly as described.',
                'is_featured' => true,
            ],
            [
                'name' => 'David Nguyen',
                'rating' => 5,
                'location' => 'Vancouver, BC',
                'comment' => 'Professional service and honest guidance. I appreciated the treatment disclosure before buying.',
                'is_featured' => true,
            ],
            [
                'name' => 'Sophie Tremblay',
                'rating' => 4,
                'location' => 'Montreal, QC',
                'comment' => 'Great education resources. The team explained certification differences clearly.',
                'is_featured' => true,
            ],
            [
                'name' => 'Ravi Patel',
                'rating' => 5,
                'location' => 'Calgary, AB',
                'comment' => 'Beautiful gemstone selection and responsive support throughout the purchase process.',
                'is_featured' => false,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name'], 'comment' => $testimonial['comment']],
                $testimonial
            );
        }
    }
}
