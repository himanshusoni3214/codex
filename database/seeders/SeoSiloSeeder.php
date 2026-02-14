<?php

namespace Database\Seeders;

use App\Models\GemstoneType;
use App\Models\Origin;
use App\Models\Page;
use App\Models\Product;
use App\Models\SiteSeoSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SeoSiloSeeder extends Seeder
{
    public function run(): void
    {
        $typeData = [
            [
                'name' => 'Sapphire',
                'slug' => 'sapphire',
                'hero_title' => 'Buy Sapphire in Canada',
                'hero_subtitle' => 'Certified natural sapphires with CAD pricing, disclosure-first listings, and report verification support.',
                'history_content' => '<p>Sapphires have been valued across civilizations for color, durability, and craftsmanship suitability.</p>',
                'buying_guide_content' => '<p>For Canadian buyers, prioritize CAD pricing clarity, GST/HST transparency, and recognized laboratory reports.</p>',
                'certification_content' => '<p>Review report number, lab source, and matching measurements before purchase.</p>',
                'treatment_content' => '<p>Heat treatment is common in the market and should be clearly disclosed where known.</p>',
                'faq_items' => $this->defaultFaq('sapphire'),
                'meta_title' => 'Buy Sapphire in Canada | Certified Natural Gemstones',
                'meta_description' => 'Shop certified natural sapphire in Canada with transparent CAD pricing and treatment disclosures.',
            ],
            [
                'name' => 'Ruby',
                'slug' => 'ruby',
                'hero_title' => 'Buy Ruby in Canada',
                'hero_subtitle' => 'Natural ruby inventory with report-first transparency and compliance-safe educational guidance.',
                'history_content' => '<p>Ruby remains one of the most sought-after corundum varieties due to color and rarity profiles.</p>',
                'buying_guide_content' => '<p>Confirm CAD pricing structure, per-carat logic, and documented treatment status before finalizing.</p>',
                'certification_content' => '<p>Choose inventory backed by recognized reports and clear gemstone identity details.</p>',
                'treatment_content' => '<p>Disclosure of treatments such as heat or filling should be provided whenever known.</p>',
                'faq_items' => $this->defaultFaq('ruby'),
                'meta_title' => 'Buy Ruby in Canada | Certified Natural Gemstones',
                'meta_description' => 'Shop natural ruby inventory in Canada with transparent disclosure and report verification.',
            ],
        ];

        $originData = [
            [
                'name' => 'Ceylon',
                'slug' => 'ceylon',
                'hero_title' => 'Ceylon Sapphire in Canada',
                'hero_subtitle' => 'Sri Lankan sapphire listings with documentation, CAD pricing, and treatment disclosures.',
                'history_content' => '<p>Ceylon sapphires are historically associated with Sri Lankan gem mining and trade.</p>',
                'buying_guide_content' => '<p>Check color consistency, report identity, and inclusion profile before purchase.</p>',
                'certification_content' => '<p>Request certificate links and compare report details with listing attributes.</p>',
                'treatment_content' => '<p>Treatment status is listed when known and should be reviewed before checkout.</p>',
                'faq_items' => $this->defaultFaq('ceylon sapphire'),
                'meta_title' => 'Buy Ceylon Sapphire in Canada | Certified Natural Gemstones',
                'meta_description' => 'Explore Ceylon sapphire inventory in Canada with report-first transparency.',
            ],
            [
                'name' => 'Burma',
                'slug' => 'burma',
                'hero_title' => 'Burma Ruby in Canada',
                'hero_subtitle' => 'Natural Burma ruby inventory with transparent CAD pricing and disclosure-first details.',
                'history_content' => '<p>Burma rubies are widely referenced in gem history for notable color saturation.</p>',
                'buying_guide_content' => '<p>Compare per-carat price and stone-level documentation before placing an order.</p>',
                'certification_content' => '<p>Use recognized report references to validate gemstone identity and properties.</p>',
                'treatment_content' => '<p>Review treatment disclosures carefully, including known enhancements if applicable.</p>',
                'faq_items' => $this->defaultFaq('burma ruby'),
                'meta_title' => 'Buy Burma Ruby in Canada | Certified Natural Gemstones',
                'meta_description' => 'Shop Burma ruby inventory in Canada with CAD-first pricing and report verification support.',
            ],
        ];

        $typeData = array_map(function (array $item): array {
            $item['intro'] = $item['description'] ?? null;
            $item['intro_html'] = $item['description'] ?? null;
            $item['history'] = $item['history_content'] ?? null;
            $item['history_html'] = $item['history_content'] ?? null;
            $item['buying_guide'] = $item['buying_guide_content'] ?? null;
            $item['buying_guide_html'] = $item['buying_guide_content'] ?? null;
            $item['certification'] = $item['certification_content'] ?? null;
            $item['certification_html'] = $item['certification_content'] ?? null;
            $item['treatment'] = $item['treatment_content'] ?? null;
            $item['treatment_html'] = $item['treatment_content'] ?? null;
            $item['faq_json'] = $item['faq_items'] ?? null;
            $item['seo_title'] = $item['meta_title'] ?? null;
            $item['seo_description'] = $item['meta_description'] ?? null;
            $item['schema_overrides_json'] = $item['schema_json'] ?? null;
            $item['is_indexable'] = true;

            return $item;
        }, $typeData);

        $originData = array_map(function (array $item): array {
            $item['intro'] = $item['description'] ?? null;
            $item['intro_html'] = $item['description'] ?? null;
            $item['history'] = $item['history_content'] ?? null;
            $item['history_html'] = $item['history_content'] ?? null;
            $item['buying_guide'] = $item['buying_guide_content'] ?? null;
            $item['buying_guide_html'] = $item['buying_guide_content'] ?? null;
            $item['certification'] = $item['certification_content'] ?? null;
            $item['certification_html'] = $item['certification_content'] ?? null;
            $item['treatment'] = $item['treatment_content'] ?? null;
            $item['treatment_html'] = $item['treatment_content'] ?? null;
            $item['faq_json'] = $item['faq_items'] ?? null;
            $item['seo_title'] = $item['meta_title'] ?? null;
            $item['seo_description'] = $item['meta_description'] ?? null;
            $item['schema_overrides_json'] = $item['schema_json'] ?? null;
            $item['is_indexable'] = true;

            return $item;
        }, $originData);

        foreach ($typeData as $type) {
            GemstoneType::updateOrCreate(['slug' => $type['slug']], $type);
        }

        $typeIdBySlug = GemstoneType::query()->pluck('id', 'slug');

        $originTypeMap = [
            'ceylon' => 'sapphire',
            'burma' => 'ruby',
        ];

        foreach ($originData as $origin) {
            $mappedTypeSlug = $originTypeMap[$origin['slug']] ?? null;
            $origin['gemstone_type_id'] = $mappedTypeSlug ? ($typeIdBySlug[$mappedTypeSlug] ?? null) : null;
            Origin::updateOrCreate(['slug' => $origin['slug']], $origin);
        }

        // Create missing taxonomy entries from product attributes for scalability.
        Product::query()->whereNotNull('gem_type')->get()->each(function (Product $product): void {
            $name = trim((string) $product->gem_type);
            if ($name === '') {
                return;
            }
            GemstoneType::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => Str::title($name),
                    'description' => "Inventory landing content for {$name}.",
                    'intro_html' => "Inventory landing content for {$name}.",
                ]
            );
        });

        Product::query()->whereNotNull('origin')->get()->each(function (Product $product): void {
            $name = trim((string) $product->origin);
            if ($name === '') {
                return;
            }
            Origin::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => Str::title($name),
                    'description' => "Origin landing content for {$name}.",
                    'intro_html' => "Origin landing content for {$name}.",
                ]
            );
        });

        $typeMap = GemstoneType::query()->get()->keyBy('slug');
        $originMap = Origin::query()->get()->keyBy('slug');

        Product::query()->whereNotNull('sku')->get()->each(function (Product $product) use ($typeMap, $originMap): void {
            $resolvedType = null;
            $resolvedOrigin = null;

            if ($product->gem_type) {
                $typeSlug = Str::slug($product->gem_type);
                if (isset($typeMap[$typeSlug])) {
                    $resolvedType = $typeMap[$typeSlug];
                    $product->gemstoneTypes()->syncWithoutDetaching([$resolvedType->id]);
                }
            }

            if ($product->origin) {
                $originSlug = Str::slug($product->origin);
                if (isset($originMap[$originSlug])) {
                    $resolvedOrigin = $originMap[$originSlug];
                    $product->origins()->syncWithoutDetaching([$resolvedOrigin->id]);
                }
            }

            if ($product->origin && str_contains(strtolower($product->origin), 'ceylon') && isset($originMap['ceylon'])) {
                $resolvedOrigin = $originMap['ceylon'];
                $product->origins()->syncWithoutDetaching([$resolvedOrigin->id]);
            }

            if ($product->origin && str_contains(strtolower($product->origin), 'burma') && isset($originMap['burma'])) {
                $resolvedOrigin = $originMap['burma'];
                $product->origins()->syncWithoutDetaching([$resolvedOrigin->id]);
            }

            if ($resolvedOrigin && $resolvedType && ! $resolvedOrigin->gemstone_type_id) {
                $resolvedOrigin->update(['gemstone_type_id' => $resolvedType->id]);
            }
        });

        $this->seedEducationPages();
        $this->seedLocalPages();

        SiteSeoSetting::updateOrCreate(
            ['id' => 1],
            [
                'organization_name' => 'Natural Gem',
                'site_url' => rtrim(config('app.url', 'https://naturalgem.com'), '/'),
                'logo_url' => '/images/natural-gem-logo.svg',
                'same_as' => [
                    'https://www.instagram.com/naturalgem',
                    'https://www.facebook.com/naturalgem',
                ],
                'contact_phone' => '+1 (647) 555-0199',
                'contact_email' => 'hello@naturalgem.com',
                'address_line' => 'Toronto',
                'city' => 'Toronto',
                'province' => 'Ontario',
                'postal_code' => null,
                'country' => 'CA',
                'default_meta_title' => 'Natural Gem Canada',
                'default_meta_description' => 'Certified natural gemstones in Canada with transparent pricing and disclosure.',
                'default_og_image' => '/images/natural-gem-logo.svg',
            ]
        );
    }

    private function seedEducationPages(): void
    {
        $pages = [
            [
                'slug' => 'buying-gemstones-canada',
                'section' => 'education',
                'title' => 'How to Buy Gemstones Responsibly in Canada',
                'hero_title' => 'Buying Gemstones in Canada',
                'hero_subtitle' => 'A practical framework for CAD pricing, tax expectations, and certification checks.',
                'excerpt' => 'Use this guide to evaluate gemstone quality, pricing transparency, and disclosure standards in Canada.',
                'content' => '<p>Canadian buyers should prioritize transparent CAD pricing, clear GST/HST handling, and report-backed inventory.</p><p>Before purchase, verify treatment status, return terms, and report references.</p>',
                'meta_title' => 'Buying Gemstones in Canada | Natural Gem Education',
                'meta_description' => 'Learn how to evaluate gemstone quality, pricing, and disclosures when buying in Canada.',
                'status' => 'published',
                'is_indexable' => true,
                'faq_items' => $this->defaultFaq('gemstones in canada'),
                'related_links' => [
                    ['label' => 'Browse Sapphire', 'url' => '/gemstones/sapphire'],
                    ['label' => 'Browse Ruby', 'url' => '/gemstones/ruby'],
                ],
            ],
            [
                'slug' => 'gia-vs-igi',
                'section' => 'education',
                'title' => 'GIA vs IGI for Gemstone Buyers',
                'hero_title' => 'GIA vs IGI',
                'hero_subtitle' => 'Understand report context and when each lab is used in the market.',
                'excerpt' => 'Compare two well-known labs and what their reports mean for practical buying decisions.',
                'content' => '<p>Both GIA and IGI reports can support transparent buying. Focus on report details, consistency, and listing alignment.</p>',
                'meta_title' => 'GIA vs IGI | Natural Gem Education',
                'meta_description' => 'Compare GIA and IGI report context for Canadian gemstone buying decisions.',
                'status' => 'published',
                'is_indexable' => true,
                'faq_items' => $this->defaultFaq('gia vs igi'),
                'related_links' => [
                    ['label' => 'Certification Guide', 'url' => '/education/gemstone-certification-canada'],
                    ['label' => 'Browse Sapphire', 'url' => '/gemstones/sapphire'],
                ],
            ],
            [
                'slug' => 'gemstone-certification-canada',
                'section' => 'education',
                'title' => 'Gemstone Certification in Canada',
                'hero_title' => 'Gemstone Certification Explained',
                'hero_subtitle' => 'What certification confirms, and what buyers should still verify independently.',
                'excerpt' => 'Understand certificate scope, report numbers, and practical verification steps.',
                'content' => '<p>Certification reports describe measurable gemstone attributes. They should be reviewed together with listing disclosures and seller policy details.</p>',
                'meta_title' => 'Gemstone Certification Canada | Natural Gem Education',
                'meta_description' => 'Understand gemstone certificates, lab reports, and verification steps for Canadian buyers.',
                'status' => 'published',
                'is_indexable' => true,
                'faq_items' => $this->defaultFaq('gemstone certification'),
                'related_links' => [
                    ['label' => 'GIA vs IGI', 'url' => '/education/gia-vs-igi'],
                    ['label' => 'Buying Guide', 'url' => '/education/buying-gemstones-canada'],
                ],
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }

    private function seedLocalPages(): void
    {
        Page::updateOrCreate(
            ['slug' => 'toronto-gemstone-store'],
            [
                'section' => 'local',
                'title' => 'Toronto Gemstone Store',
                'hero_title' => 'Toronto Gemstone Store',
                'hero_subtitle' => 'Certified natural gemstone inventory for Toronto and GTA buyers.',
                'excerpt' => 'Toronto-focused gemstone buying guidance with transparent CAD pricing and disclosures.',
                'content' => '<p>Natural Gem supports Toronto clients with report-first inventory, CAD pricing transparency, and clear disclosure standards.</p>',
                'meta_title' => 'Toronto Gemstone Store | Natural Gem Canada',
                'meta_description' => 'Toronto gemstone inventory with certification-first listings and transparent buying guidance.',
                'status' => 'published',
                'is_indexable' => true,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'canada-ontario'],
            [
                'section' => 'province',
                'title' => 'Ontario Gemstone Buying Guide',
                'hero_title' => 'Ontario Gemstone Buying Guide',
                'hero_subtitle' => 'GST/HST-aware buying guidance for Ontario customers.',
                'excerpt' => 'Ontario guidance covering tax treatment, disclosure expectations, and shipping transparency.',
                'content' => '<p>Ontario orders are subject to applicable HST rules. Before purchase, verify certificate references and treatment disclosures for each item.</p><p>No guarantees or outcomes are implied.</p>',
                'meta_title' => 'Ontario Gemstone Guide | Natural Gem Canada',
                'meta_description' => 'Ontario-focused gemstone buying guidance including HST and disclosure expectations.',
                'status' => 'published',
                'is_indexable' => true,
            ]
        );
    }

    private function defaultFaq(string $context): array
    {
        return [
            [
                'question' => "How do I buy {$context} responsibly in Canada?",
                'answer' => 'Review CAD pricing, report references, treatment disclosures, and return terms before purchase.',
            ],
            [
                'question' => 'Are results or outcomes guaranteed by gemstone purchases?',
                'answer' => 'No. Listings are product-focused and educational. No personal outcomes are implied.',
            ],
            [
                'question' => 'Do you provide certification details?',
                'answer' => 'Yes. Certificate details are listed when available and can be verified with lab references.',
            ],
            [
                'question' => 'How are taxes applied in Canada?',
                'answer' => 'GST/HST is applied based on destination province at checkout.',
            ],
            [
                'question' => 'Is treatment status disclosed?',
                'answer' => 'Yes. Known treatment information is disclosed per listing.',
            ],
        ];
    }
}
