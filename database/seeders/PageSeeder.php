<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'home',
                'title' => 'Home',
                'meta_title' => 'Natural Gem Store | Certified Natural Gemstones in Canada',
                'meta_description' => 'Shop certified natural gemstones with transparent sourcing, treatment disclosure, and expert guidance. Based in Canada.',
            ],
            [
                'slug' => 'about',
                'title' => 'About Natural Gem Store',
                'meta_title' => 'About Natural Gem Store | Certified Gemstone Specialists',
                'meta_description' => 'Learn how Natural Gem Store sources, certifies, and curates natural gemstones with transparency and care.',
            ],
            [
                'slug' => 'gemstones',
                'title' => 'Gemstones',
                'meta_title' => 'Natural Gemstones | Shop Certified Stones',
                'meta_description' => 'Explore certified emeralds, sapphires, rubies, and more with full disclosure and documentation.',
            ],
            [
                'slug' => 'education',
                'title' => 'Education',
                'meta_title' => 'Gemstone Education | Certification & Buying Guides',
                'meta_description' => 'Understand gemstone certification, treatments, and how to buy responsibly in Canada.',
            ],
            [
                'slug' => 'contact',
                'title' => 'Contact',
                'meta_title' => 'Contact Natural Gem Store',
                'meta_description' => 'Contact our gemstone specialists for sourcing, certification, or product inquiries.',
            ],
            [
                'slug' => 'purchase-request',
                'title' => 'Purchase Request',
                'meta_title' => 'Purchase Request | Natural Gem Store',
                'meta_description' => 'Submit a purchase request for certified gemstones or fine jewelry.',
            ],
            [
                'slug' => 'consultation',
                'title' => 'Traditional Gemstone Consultation',
                'meta_title' => 'Traditional Gemstone Consultation | By Appointment',
                'meta_description' => 'Book a private, belief-based consultation. No guarantees or outcomes are implied.',
            ],
            [
                'slug' => 'terms',
                'title' => 'Terms of Service',
                'meta_title' => 'Terms of Service | Natural Gem Store',
                'meta_description' => 'Review our terms of service and purchase policies.',
            ],
            [
                'slug' => 'privacy',
                'title' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy | Natural Gem Store',
                'meta_description' => 'Understand how we collect and protect your information.',
            ],
            [
                'slug' => 'disclaimer',
                'title' => 'Disclaimer',
                'meta_title' => 'Disclaimer | Natural Gem Store',
                'meta_description' => 'Important disclosures about certification, cultural symbolism, and no-outcome claims.',
            ],
            [
                'slug' => 'refunds',
                'title' => 'Refund & Return Policy',
                'meta_title' => 'Refund & Return Policy | Natural Gem Store',
                'meta_description' => 'Details on returns, exchanges, and verification requirements.',
            ],
            [
                'slug' => 'faq',
                'title' => 'FAQ',
                'meta_title' => 'FAQ | Natural Gem Store',
                'meta_description' => 'Answers to common questions about gemstones and certification.',
            ],
            [
                'slug' => 'testimonials',
                'title' => 'Testimonials',
                'meta_title' => 'Client Testimonials | Natural Gem Store',
                'meta_description' => 'Client experiences with our certified gemstone sourcing and service.',
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
