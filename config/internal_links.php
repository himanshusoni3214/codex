<?php

return [
    'max_links' => 4,

    'defaults' => [
        'certification_hub' => [
            'label' => 'Gemstone certification library',
            'route' => 'certification.index',
        ],
        'toronto_store' => [
            'label' => 'Gemstone store in Toronto',
            'route' => 'local.toronto',
        ],
        'consultation' => [
            'label' => 'Book a traditional gemstone consultation',
            'route' => 'consultation',
        ],
        'purchase_request' => [
            'label' => 'Submit a gemstone purchase request',
            'route' => 'order.create',
        ],
        'education_hub' => [
            'label' => 'Gemstone education hub',
            'route' => 'education',
        ],
        'engagement_hub' => [
            'label' => 'Colored engagement rings in Toronto',
            'route' => 'engagement.index',
        ],
    ],

    'gemstone_labels' => [
        'sapphire' => 'Certified Sapphire in Canada',
        'ruby' => 'Certified Ruby in Canada',
        'emerald' => 'Certified Emerald in Canada',
        'pearl' => 'Certified Pearl gemstones in Canada',
        'hessonite' => 'Certified Hessonite gemstones in Canada',
        'cats-eye' => 'Certified Cat\'s Eye gemstones in Canada',
    ],

    'gemstone_to_astrology' => [
        'sapphire' => [
            'slug' => 'blue-sapphire-neelam',
            'label' => 'Blue Sapphire (Neelam) guide',
        ],
        'ruby' => [
            'slug' => 'ruby-manik',
            'label' => 'Ruby (Manik) guide',
        ],
        'emerald' => [
            'slug' => 'emerald-panna',
            'label' => 'Emerald (Panna) guide',
        ],
        'pearl' => [
            'slug' => 'pearl-moti',
            'label' => 'Pearl (Moti) guide',
        ],
        'hessonite' => [
            'slug' => 'hessonite-gomed',
            'label' => 'Hessonite (Gomed) guide',
        ],
        'cats-eye' => [
            'slug' => 'cats-eye-lehsunia',
            'label' => 'Cat\'s Eye (Lehsunia) guide',
        ],
    ],

    'astrology_to_gemstone' => [
        'blue-sapphire-neelam' => [
            'type_slug' => 'sapphire',
            'label' => 'Certified Sapphire in Canada',
        ],
        'yellow-sapphire-pukhraj' => [
            'type_slug' => 'sapphire',
            'label' => 'Certified Sapphire in Canada',
        ],
        'ruby-manik' => [
            'type_slug' => 'ruby',
            'label' => 'Certified Ruby in Canada',
        ],
        'emerald-panna' => [
            'type_slug' => 'emerald',
            'label' => 'Certified Emerald in Canada',
        ],
        'pearl-moti' => [
            'type_slug' => 'pearl',
            'label' => 'Certified Pearl gemstones in Canada',
        ],
        'hessonite-gomed' => [
            'type_slug' => 'hessonite',
            'label' => 'Certified Hessonite gemstones in Canada',
        ],
        'cats-eye-lehsunia' => [
            'type_slug' => 'cats-eye',
            'label' => 'Certified Cat\'s Eye gemstones in Canada',
        ],
    ],

    'engagement_types' => ['sapphire', 'ruby', 'emerald'],

    'education_related' => [
        'default' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'hub', 'key' => 'certification_hub'],
            ['type' => 'astrology', 'slug' => 'blue-sapphire-neelam'],
            ['type' => 'hub', 'key' => 'toronto_store'],
        ],
        'certification' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'gemstone', 'slug' => 'ruby'],
            ['type' => 'astrology', 'slug' => 'blue-sapphire-neelam'],
            ['type' => 'hub', 'key' => 'toronto_store'],
        ],
        'gia-vs-igi' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'gemstone', 'slug' => 'emerald'],
            ['type' => 'hub', 'key' => 'certification_hub'],
            ['type' => 'astrology', 'slug' => 'ruby-manik'],
        ],
        'natural-vs-treated' => [
            ['type' => 'gemstone', 'slug' => 'ruby'],
            ['type' => 'gemstone', 'slug' => 'emerald'],
            ['type' => 'hub', 'key' => 'certification_hub'],
            ['type' => 'astrology', 'slug' => 'emerald-panna'],
        ],
        'birthstones-vs-astrology' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'gemstone', 'slug' => 'ruby'],
            ['type' => 'hub', 'key' => 'certification_hub'],
            ['type' => 'astrology', 'slug' => 'yellow-sapphire-pukhraj'],
        ],
        'buying-gemstones-canada' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'gemstone', 'slug' => 'emerald'],
            ['type' => 'hub', 'key' => 'certification_hub'],
            ['type' => 'hub', 'key' => 'toronto_store'],
        ],
        'gemstone-certification-canada' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'gemstone', 'slug' => 'ruby'],
            ['type' => 'hub', 'key' => 'certification_hub'],
            ['type' => 'astrology', 'slug' => 'blue-sapphire-neelam'],
        ],
    ],

    'certification_related' => [
        'default' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'gemstone', 'slug' => 'ruby'],
            ['type' => 'astrology', 'slug' => 'blue-sapphire-neelam'],
            ['type' => 'hub', 'key' => 'consultation'],
        ],
    ],

    'engagement_related' => [
        'default' => [
            ['type' => 'gemstone', 'slug' => 'sapphire'],
            ['type' => 'gemstone', 'slug' => 'ruby'],
            ['type' => 'gemstone', 'slug' => 'emerald'],
            ['type' => 'hub', 'key' => 'consultation'],
        ],
    ],

    'local_related' => [
        ['type' => 'hub', 'key' => 'consultation'],
        ['type' => 'hub', 'key' => 'purchase_request'],
        ['type' => 'gemstone', 'slug' => 'sapphire'],
        ['type' => 'hub', 'key' => 'certification_hub'],
    ],
];
