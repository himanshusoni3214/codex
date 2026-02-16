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
        $this->seedAstrologyPages();
        $this->seedCertificationPages();
        $this->seedEngagementPages();
        $this->seedGtaPages();
        $this->seedBlogPages();

        SiteSeoSetting::updateOrCreate(
            ['id' => 1],
            [
                'organization_name' => 'Natural Gem Store',
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
                'default_meta_title' => 'Natural Gem Store Canada',
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
                'meta_title' => 'Buying Gemstones in Canada | Natural Gem Store Education',
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
                'meta_title' => 'GIA vs IGI | Natural Gem Store Education',
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
                'meta_title' => 'Gemstone Certification Canada | Natural Gem Store Education',
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
                'content' => '<p>Natural Gem Store supports Toronto clients with report-first inventory, CAD pricing transparency, and clear disclosure standards.</p>',
                'meta_title' => 'Toronto Gemstone Store | Natural Gem Store Canada',
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
                'meta_title' => 'Ontario Gemstone Guide | Natural Gem Store Canada',
                'meta_description' => 'Ontario-focused gemstone buying guidance including HST and disclosure expectations.',
                'status' => 'published',
                'is_indexable' => true,
            ]
        );
    }

    private function seedAstrologyPages(): void
    {
        Page::updateOrCreate(
            ['slug' => 'astrology'],
            [
                'section' => 'astrology_hub',
                'title' => 'Astrology Gemstone Guidance',
                'hero_title' => 'Astrology Gemstone Guidance in Toronto & GTA',
                'hero_subtitle' => 'Belief-based pages for clients who want traditional gemstone context while keeping certification, disclosure, and product quality first.',
                'excerpt' => 'Explore traditional stone pages with compliance-safe language, verification tips, and consultation pathways.',
                'content' => '<p>This hub organizes traditional stone pages for Toronto and GTA clients. Each guide is educational and belief-based. Product purchases remain documentation-first, with treatment disclosures and report references where available.</p>',
                'meta_title' => 'Astrology Gemstone Guidance Toronto | Natural Gem Store',
                'meta_description' => 'Explore belief-based astrology gemstone pages in Toronto with disclosure-first guidance and certification-focused buying links.',
                'status' => 'published',
                'is_indexable' => true,
            ]
        );

        $pages = [
            [
                'slug' => 'blue-sapphire-neelam',
                'title' => 'Blue Sapphire (Neelam) Guide for Toronto Buyers',
                'type_slug' => 'sapphire',
            ],
            [
                'slug' => 'yellow-sapphire-pukhraj',
                'title' => 'Yellow Sapphire (Pukhraj) Guide for GTA',
                'type_slug' => 'sapphire',
            ],
            [
                'slug' => 'emerald-panna',
                'title' => 'Emerald (Panna) Buying Guide in Toronto',
                'type_slug' => 'emerald',
            ],
            [
                'slug' => 'ruby-manik',
                'title' => 'Ruby (Manik) Traditional Guide in Canada',
                'type_slug' => 'ruby',
            ],
            [
                'slug' => 'pearl-moti',
                'title' => 'Pearl (Moti) Traditional Guidance',
                'type_slug' => 'pearl',
            ],
            [
                'slug' => 'hessonite-gomed',
                'title' => 'Hessonite (Gomed) Practical Guide',
                'type_slug' => 'hessonite',
            ],
            [
                'slug' => 'cats-eye-lehsunia',
                'title' => "Cat's Eye (Lehsunia) Guide for GTA Clients",
                'type_slug' => 'cats-eye',
            ],
        ];

        foreach ($pages as $item) {
            $stoneLabel = Str::title(str_replace('-', ' ', $item['slug']));
            $content = <<<HTML
<h2>Who Traditionally Chooses {$stoneLabel}</h2>
<p>In many belief systems, {$stoneLabel} is traditionally selected after reviewing birth-chart context with an experienced advisor. This is a cultural practice, not a guaranteed outcome service. Buyers in Toronto and the GTA typically compare documentation quality first, then decide whether traditional symbolism matters for them personally.</p>
<h2>Who May Choose Another Stone First</h2>
<p>Clients focused on color, budget, or jewelry design often shortlist stones by physical quality and report details before considering tradition. If a stone's treatment status, certification path, or budget fit is unclear, it is better to pause and review alternatives rather than rushing into a purchase.</p>
<h2>Benefits and Cautions (Belief-Based)</h2>
<p>This page discusses symbolic associations used in cultural practice. These associations are belief-based and educational. No medical, legal, financial, or personal results are implied. Always evaluate visible quality factors, return terms, and documentation before checkout.</p>
<h2>Treatments &amp; Disclosure</h2>
<p>Treatment status (for example heated, fracture-filled, or unknown) must be disclosed when known. Ask for written disclosure and compare that information with the listing and report details.</p>
<h2>Certification &amp; Verification Tips</h2>
<p>Prefer stones with recognized report references (GIA, IGI, or other credible labs). Match report number, weight, dimensions, and identifying notes to the exact item you are buying.</p>
<h2>Price Guidance in Toronto and GTA</h2>
<p>Pricing varies by color quality, clarity, origin profile, treatment status, and certification coverage. Use per-carat benchmarks only as a starting point and confirm final CAD totals, taxes, and insured shipping before placing an order.</p>
HTML;

            Page::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'section' => 'astrology',
                    'title' => $item['title'],
                    'hero_title' => $item['title'],
                    'hero_subtitle' => 'Traditional, belief-based gemstone guidance with transparent buying checks for Toronto and GTA clients.',
                    'excerpt' => "Understand {$stoneLabel} from a traditional perspective with certification, disclosure, and CAD pricing context.",
                    'content' => $content,
                    'meta_title' => "{$item['title']} | Natural Gem Store",
                    'meta_description' => "Explore {$stoneLabel} guidance in Toronto with disclosure-first buying tips, report verification steps, and consultation options.",
                    'status' => 'published',
                    'is_indexable' => true,
                    'faq_items' => $this->astrologyFaq($stoneLabel),
                    'related_links' => [
                        ['label' => 'Book Traditional Consultation', 'url' => '/consultation'],
                        ['label' => 'Submit Purchase Request', 'url' => '/purchase-request'],
                        ['label' => 'Browse Matching Gemstone Inventory', 'url' => '/gemstones/' . $item['type_slug']],
                        ['label' => 'Certification Library', 'url' => '/certification'],
                        ['label' => 'GIA vs IGI Guide', 'url' => '/education/gia-vs-igi'],
                    ],
                ]
            );
        }
    }

    private function seedCertificationPages(): void
    {
        Page::updateOrCreate(
            ['slug' => 'certification'],
            [
                'section' => 'certification_hub',
                'title' => 'Gemstone Certification Library',
                'hero_title' => 'Gemstone Certification Library',
                'hero_subtitle' => 'Practical report-reading and verification guides for Canadian gemstone buyers.',
                'excerpt' => 'Compare labs, verify report details, and understand treatment disclosure terminology before purchase.',
                'content' => '<p>This library centralizes verification workflows for gemstone certificates. Use these guides before placing a purchase request or scheduling a consultation.</p>',
                'meta_title' => 'Gemstone Certification Library | Natural Gem Store',
                'meta_description' => 'Read gemstone certification guides for Canada: verification steps, report interpretation, and treatment disclosure checks.',
                'status' => 'published',
                'is_indexable' => true,
            ]
        );

        $pages = [
            'verify-gemstone-certificate' => 'How to Verify a Gemstone Certificate',
            'how-to-read-gemstone-report' => 'How to Read a Gemstone Report',
            'gia-vs-igi-vs-gra' => 'GIA vs IGI vs GRA: Practical Differences',
            'treatments-disclosure-guide' => 'Gemstone Treatments Disclosure Guide',
            'synthetic-vs-natural-vs-treated' => 'Synthetic vs Natural vs Treated Gemstones',
        ];

        foreach ($pages as $slug => $title) {
            Page::updateOrCreate(
                ['slug' => $slug],
                [
                    'section' => 'certification',
                    'title' => $title,
                    'hero_title' => $title,
                    'hero_subtitle' => 'A clear checklist for Canadian buyers evaluating documentation and disclosure quality.',
                    'excerpt' => 'Understand lab report sections, verification methods, and practical buying safeguards.',
                    'content' => <<<HTML
<h2>Why this topic matters</h2>
<p>{$title} is a frequent decision point for buyers comparing gemstone listings online. Documentation quality can materially affect confidence and resale clarity.</p>
<h2>Canadian buying workflow</h2>
<p>Confirm the report number, verify it on the issuing lab portal where available, and compare values against the exact stone listing. Keep records of CAD invoices and disclosure notes.</p>
<h2>Treatment and disclosure checks</h2>
<p>When treatment is known, the listing should disclose it directly. If treatment is unknown, that status should also be explicit before purchase.</p>
<h2>Practical safeguards</h2>
<p>Use written communication, request high-resolution media, and avoid outcome-based claims. Focus on physical attributes and documentation consistency.</p>
HTML,
                    'meta_title' => "{$title} | Natural Gem Store Certification",
                    'meta_description' => "Read {$title} with practical verification steps and disclosure guidance for Canadian gemstone buyers.",
                    'status' => 'published',
                    'is_indexable' => true,
                    'faq_items' => $this->defaultFaq(Str::lower($title)),
                    'related_links' => [
                        ['label' => 'Astrology Stone Guides', 'url' => '/astrology'],
                        ['label' => 'Browse Gemstones', 'url' => '/gemstones'],
                        ['label' => 'Book Consultation', 'url' => '/consultation'],
                    ],
                ]
            );
        }
    }

    private function seedEngagementPages(): void
    {
        Page::updateOrCreate(
            ['slug' => 'engagement-rings'],
            [
                'section' => 'engagement_hub',
                'title' => 'Colored Gemstone Engagement Rings',
                'hero_title' => 'Colored Gemstone Engagement Rings in Toronto',
                'hero_subtitle' => 'Appointment-led custom ring design with certification-backed gemstone sourcing.',
                'excerpt' => 'Plan custom sapphire, ruby, or emerald engagement rings with transparent timelines and CAD pricing support.',
                'content' => '<p>Our engagement ring hub focuses on process clarity: stone selection, setting design, manufacturing timeline, and post-delivery care in Canada.</p>',
                'meta_title' => 'Colored Gemstone Engagement Rings Toronto | Natural Gem Store',
                'meta_description' => 'Explore custom colored gemstone engagement ring options in Toronto and GTA with transparent process and certified stones.',
                'status' => 'published',
                'is_indexable' => true,
            ]
        );

        $pages = [
            'sapphire-engagement-ring-toronto' => 'Sapphire Engagement Ring Toronto',
            'custom-gemstone-ring-gta' => 'Custom Gemstone Ring Design in GTA',
            'ethical-colored-stone-engagement-rings-canada' => 'Ethical Colored Stone Engagement Rings in Canada',
        ];

        foreach ($pages as $slug => $title) {
            Page::updateOrCreate(
                ['slug' => $slug],
                [
                    'section' => 'engagement',
                    'title' => $title,
                    'hero_title' => $title,
                    'hero_subtitle' => 'Design consultations for Toronto and GTA clients with CAD estimates and disclosure-first sourcing.',
                    'excerpt' => 'Learn timeline, durability, warranty care, and appointment steps for custom gemstone engagement rings.',
                    'content' => <<<HTML
<h2>Design and sourcing process timeline</h2>
<p>Most custom projects begin with a planning call, then gemstone shortlist, then setting design approval. Timeline depends on gemstone availability, setting complexity, and finishing requirements.</p>
<h2>Durability and daily wear guidance</h2>
<p>Durability varies by gemstone species and cut. We discuss practical wear patterns, protective setting choices, and long-term care expectations before finalizing.</p>
<h2>Warranty and care</h2>
<p>After delivery, clients receive care recommendations and inspection checkpoints for prongs, metal wear, and stone security. Service timelines are explained before purchase.</p>
<h2>Canada service area</h2>
<p>Toronto-based appointments are available, with broader GTA and Ontario support for consultation and insured shipping where appropriate.</p>
HTML,
                    'meta_title' => "{$title} | Natural Gem Store",
                    'meta_description' => "Plan {$title} with transparent process, durability guidance, and certification-backed gemstone sourcing.",
                    'status' => 'published',
                    'is_indexable' => true,
                    'faq_items' => $this->defaultFaq(Str::lower($title)),
                    'related_links' => [
                        ['label' => 'Browse Sapphire Inventory', 'url' => '/gemstones/sapphire'],
                        ['label' => 'Browse Ruby Inventory', 'url' => '/gemstones/ruby'],
                        ['label' => 'Book Consultation', 'url' => '/consultation'],
                        ['label' => 'Purchase Request', 'url' => '/purchase-request'],
                    ],
                ]
            );
        }
    }

    private function seedGtaPages(): void
    {
        $pages = [
            'scarborough-gemstone-store' => 'Scarborough Gemstone Store',
            'brampton-gemstone-store' => 'Brampton Gemstone Store',
            'mississauga-gemstone-store' => 'Mississauga Gemstone Store',
            'north-york-gemstone-store' => 'North York Gemstone Store',
            'markham-gemstone-store' => 'Markham Gemstone Store',
        ];

        foreach ($pages as $slug => $title) {
            $city = Str::of($slug)->replace('-gemstone-store', '')->replace('-', ' ')->title()->toString();

            Page::updateOrCreate(
                ['slug' => $slug],
                [
                    'section' => 'gta',
                    'title' => $title,
                    'hero_title' => $title,
                    'hero_subtitle' => "Certified gemstone support for {$city} clients with Toronto appointment coordination.",
                    'excerpt' => "{$city}-focused gemstone buying support with transparent CAD pricing, disclosure checks, and consultation access.",
                    'content' => <<<HTML
<h2>{$city} buyers: how we support your purchase</h2>
<p>Clients from {$city} can shortlist stones online, request documentation checks, and schedule Toronto-area appointments before final decision-making.</p>
<h2>Pickup and appointment details</h2>
<p>Consultation and pickup timelines are confirmed case by case. For shipped orders, insured courier options and GST/HST treatment are explained in writing.</p>
<h2>Disclosure and certification policy</h2>
<p>Known treatments are disclosed in listing details. Certificate references and report verification guidance are provided where available.</p>
HTML,
                    'meta_title' => "{$title} | Natural Gem Store Canada",
                    'meta_description' => "Find certified gemstone buying support for {$city} with Toronto/GTA consultation options and transparent disclosures.",
                    'status' => 'published',
                    'is_indexable' => true,
                    'related_links' => [
                        ['label' => 'Book Consultation', 'url' => '/consultation'],
                        ['label' => 'Purchase Request', 'url' => '/purchase-request'],
                        ['label' => 'Browse Gemstone Inventory', 'url' => '/gemstones'],
                    ],
                ]
            );
        }
    }

    private function seedBlogPages(): void
    {
        $posts = [
            'how-to-evaluate-sapphire-color-in-canada',
            'ruby-clarity-buying-framework-for-beginners',
            'emerald-inclusions-what-is-normal',
            'how-gst-hst-affects-gemstone-purchases',
            'reading-carat-cut-clarity-with-confidence',
            'natural-vs-treated-quick-checklist',
            'how-to-compare-two-gemstones-fairly',
            'questions-to-ask-before-buying-a-gemstone-online',
            'toronto-gemstone-consultation-what-to-expect',
            'how-to-store-and-care-for-loose-gemstones',
        ];

        foreach ($posts as $slug) {
            $title = Str::of(str_replace('-', ' ', $slug))->title()->toString();

            Page::updateOrCreate(
                ['slug' => $slug],
                [
                    'section' => 'blog',
                    'title' => $title,
                    'hero_title' => $title,
                    'hero_subtitle' => 'Editorial draft for Canadian gemstone buyers.',
                    'excerpt' => 'Draft article scaffold covering practical buying, documentation, and disclosure topics.',
                    'content' => <<<HTML
<h2>Overview</h2>
<p>This placeholder draft introduces the topic and highlights why documentation-first buying matters for Canadian gemstone clients.</p>
<h2>Key checklist</h2>
<p>Future version will include a practical step-by-step checklist, common errors to avoid, and references to certification resources.</p>
<h2>Next steps</h2>
<p>For now, compare this article with the education hub and product detail pages for current guidance.</p>
HTML,
                    'meta_title' => "{$title} | Natural Gem Store Blog",
                    'meta_description' => "Read {$title} on Natural Gem Store's Canada-focused gemstone education blog.",
                    'status' => 'published',
                    'is_indexable' => true,
                    'related_links' => [
                        ['label' => 'Gemstone Education Hub', 'url' => '/education'],
                        ['label' => 'Certification Library', 'url' => '/certification'],
                        ['label' => 'Browse Gemstone Inventory', 'url' => '/gemstones'],
                    ],
                ]
            );
        }
    }

    private function astrologyFaq(string $stoneLabel): array
    {
        $stoneLower = Str::lower($stoneLabel);

        return [
            [
                'question' => "Who traditionally wears {$stoneLower}?",
                'answer' => 'In traditional systems, this is usually decided after reviewing birth details with an experienced practitioner. It is a belief-based choice.',
            ],
            [
                'question' => "Who may avoid {$stoneLower} initially?",
                'answer' => 'Some clients postpone selection until certification, treatment disclosure, and budget fit are fully clear.',
            ],
            [
                'question' => "Are benefits of {$stoneLower} guaranteed?",
                'answer' => 'No. Symbolic associations are cultural and educational only. No outcomes are promised.',
            ],
            [
                'question' => 'How can I verify certification in Canada?',
                'answer' => 'Check certificate number, issuing lab, and matching stone details before purchase.',
            ],
            [
                'question' => 'Do you disclose treatments?',
                'answer' => 'Yes. Any known treatment information is disclosed in listing or documentation notes.',
            ],
            [
                'question' => 'Can I book consultation before purchase?',
                'answer' => 'Yes. Consultation and purchase request are separate workflows so you can decide at your own pace.',
            ],
        ];
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
