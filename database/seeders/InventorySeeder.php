<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\GemstoneLot;
use App\Models\GemstonePiece;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/gemstone_inventory.csv');
        if (! file_exists($path)) {
            $this->command?->warn("Inventory CSV not found at {$path}.");
            return;
        }

        $rows = $this->readCsv($path);
        if (empty($rows)) {
            $this->command?->warn('Inventory CSV is empty.');
            return;
        }

        // Keep existing products; update or create inventory products and replace their pieces/lots.

        $overrides = [
            // SKU => [rate_per_carat, weight_per_piece, total_quantity]
            '1108' => ['rate_per_carat' => 150.0, 'weight_per_piece' => 1.0, 'total_quantity' => 17],
            '1111' => ['rate_per_carat' => 85.0, 'weight_per_piece' => 3.4, 'total_quantity' => 17],
        ];

        foreach ($rows as $row) {
            $sku = trim($row['SKU No'] ?? '');
            $name = trim($row['Name'] ?? '');
            if ($name === '' && $sku === '') {
                continue;
            }

            $rate = $this->toNumber($row['Rate/crt'] ?? null);
            $totalWeight = $this->toNumber($row['Total Weight'] ?? null);
            $totalQty = $this->toInt($row['Total Quantity'] ?? null);
            $weightPerPiece = $this->toNumber($row['Weight (crt)/pc'] ?? null);

            if ($sku !== '' && isset($overrides[$sku])) {
                $override = $overrides[$sku];
                $rate = $override['rate_per_carat'] ?? $rate;
                $totalQty = $override['total_quantity'] ?? $totalQty;
                $weightPerPiece = $override['weight_per_piece'] ?? $weightPerPiece;
                if ($weightPerPiece !== null && $totalQty) {
                    $totalWeight = round($weightPerPiece * $totalQty, 2);
                }
            }

            if ($weightPerPiece === null && $totalWeight !== null && $totalQty) {
                $weightPerPiece = round($totalWeight / $totalQty, 2);
            }

            if ($totalWeight === null && $weightPerPiece !== null && $totalQty) {
                $totalWeight = round($weightPerPiece * $totalQty, 2);
            }

            $productType = $this->guessProductType($name);
            $gemType = $this->guessGemType($name);
            $origin = $this->guessOrigin($name, $gemType);
            $color = $this->guessColor($name);
            $clarity = $this->guessGrade($name);

            $priceCad = $this->calculatePrice($rate, $weightPerPiece, $totalWeight, $totalQty);

            $shortDescription = $productType === 'jewelry'
                ? 'Fine gemstone jewelry from curated inventory.'
                : $this->buildShortDescription($gemType, $weightPerPiece, $totalQty);

            $description = $productType === 'jewelry'
                ? 'A curated jewelry item selected for quality materials and craftsmanship. Documentation and disclosure available upon request.'
                : $this->buildDescription($gemType, $rate, $weightPerPiece, $totalQty);

            $slugBase = $name !== '' ? $name : ($sku !== '' ? $sku : 'inventory-item');
            $slug = Str::slug($slugBase . ($sku ? "-{$sku}" : ''));

            $product = Product::withTrashed()->updateOrCreate(
                ['sku' => $sku ?: null, 'slug' => $slug],
                [
                    'title' => $name !== '' ? $name : ($sku ?: 'Inventory Item'),
                    'slug' => $slug,
                    'sku' => $sku ?: null,
                    'product_type' => $productType,
                    'status' => 'active',
                    'short_description' => $shortDescription,
                    'description' => $description,
                    'image' => $this->imageForName($name, $gemType),
                    'price_cad' => $priceCad,
                    'currency' => 'CAD',
                    'rate_per_carat' => $rate,
                    'total_weight' => $totalWeight,
                    'total_quantity' => $totalQty,
                    'weight_per_piece' => $weightPerPiece,
                    'serial_quantity' => $row['S.No/Quantity'] ?? null,
                    'notes' => $row['Notes'] ?? null,
                    'gem_type' => $gemType,
                    'carat' => $weightPerPiece,
                    'weight' => $weightPerPiece,
                    'origin' => $origin,
                    'color' => $color,
                    'clarity' => $clarity,
                    'meta_title' => $name ? "{$name} | Natural Gem" : 'Natural Gem Inventory',
                    'meta_description' => $shortDescription,
                    'is_featured' => false,
                    'deleted_at' => null,
                ]
            );

            GemstonePiece::where('product_id', $product->id)->delete();
            GemstoneLot::where('product_id', $product->id)->delete();

            $lot = null;
            if ($sku) {
                $lot = GemstoneLot::updateOrCreate(
                    ['lot_code' => 'LOT-' . $sku],
                    [
                        'product_id' => $product->id,
                        'origin' => $origin,
                        'treatment' => $product->treatment,
                        'disclosure' => $product->treatment_disclosure,
                        'certificate_type' => $product->certificate_lab,
                        'certificate_number' => $product->certificate_number,
                        'certificate_url' => $product->certificate_url,
                        'notes' => $product->notes,
                        'received_at' => now()->toDateString(),
                    ]
                );
            }

            if ($totalQty && $totalQty > 0) {
                $weightPerPiece = $weightPerPiece ?? 0.0;
                for ($i = 1; $i <= $totalQty; $i++) {
                    $pieceCode = $sku ? sprintf('%s-%03d', $sku, $i) : Str::uuid()->toString();
                    GemstonePiece::create([
                        'product_id' => $product->id,
                        'lot_id' => $lot?->id,
                        'piece_code' => $pieceCode,
                        'weight_ct' => $weightPerPiece,
                        'price_total_cad' => $rate !== null ? round($rate * $weightPerPiece, 2) : null,
                        'rate_per_carat_cad' => $rate,
                        'status' => 'available',
                        'metadata' => null,
                    ]);
                }
            }
        }

        $this->command?->call('inventory:sync-product-summaries');
    }

    private function readCsv(string $path): array
    {
        $rows = [];
        if (($handle = fopen($path, 'r')) === false) {
            return $rows;
        }

        $headers = fgetcsv($handle);
        if (! $headers) {
            fclose($handle);
            return $rows;
        }

        while (($data = fgetcsv($handle)) !== false) {
            $row = [];
            foreach ($headers as $i => $header) {
                $row[$header] = $data[$i] ?? null;
            }
            $rows[] = $row;
        }

        fclose($handle);
        return $rows;
    }

    private function toNumber($value): ?float
    {
        if ($value === null) {
            return null;
        }
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }
        $value = preg_replace('/[^0-9.]/', '', $value);
        return $value === '' ? null : (float) $value;
    }

    private function toInt($value): ?int
    {
        if ($value === null) {
            return null;
        }
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }
        // Handle decimal strings like "17.0"
        if (is_numeric($value)) {
            return (int) round((float) $value);
        }
        $value = preg_replace('/[^0-9]/', '', $value);
        return $value === '' ? null : (int) $value;
    }

    private function calculatePrice(?float $rate, ?float $weightPerPiece, ?float $totalWeight, ?int $totalQty): ?float
    {
        if ($rate === null) {
            return null;
        }
        if ($weightPerPiece !== null) {
            return round($rate * $weightPerPiece, 2);
        }
        if ($totalWeight !== null && $totalQty) {
            return round($rate * ($totalWeight / $totalQty), 2);
        }
        return round($rate, 2);
    }

    private function guessProductType(string $name): string
    {
        $lower = strtolower($name);
        $jewelryKeywords = ['bracelet', 'ring', 'necklace', 'pendant', 'earring', 'bangle'];
        foreach ($jewelryKeywords as $keyword) {
            if (str_contains($lower, $keyword)) {
                return 'jewelry';
            }
        }
        return 'gemstone';
    }

    private function guessGemType(string $name): ?string
    {
        $map = [
            'sapphire' => 'Sapphire',
            'ruby' => 'Ruby',
            'emerald' => 'Emerald',
            'amethyst' => 'Amethyst',
            'tanzanite' => 'Tanzanite',
            'garnet' => 'Garnet',
            'topaz' => 'Topaz',
            'opal' => 'Opal',
            'aquamarine' => 'Aquamarine',
            'tourmaline' => 'Tourmaline',
            'peridot' => 'Peridot',
            'citrine' => 'Citrine',
            'onyx' => 'Onyx',
            'turquoise' => 'Turquoise',
            'lapis' => 'Lapis Lazuli',
            'moonstone' => 'Moonstone',
            'spinel' => 'Spinel',
            'zircon' => 'Zircon',
            'tiger' => 'Tiger Eye',
        ];

        $lower = strtolower($name);
        foreach ($map as $needle => $label) {
            if (str_contains($lower, $needle)) {
                return $label;
            }
        }

        return null;
    }

    private function guessOrigin(string $name, ?string $gemType): ?string
    {
        $map = [
            'burma' => 'Burma (Myanmar)',
            'myanmar' => 'Myanmar',
            'sri lanka' => 'Sri Lanka (Ceylon)',
            'ceylon' => 'Sri Lanka (Ceylon)',
            'zambian' => 'Zambia',
            'italian' => 'Italy',
            'madagascar' => 'Madagascar',
            'mozambique' => 'Mozambique',
            'colombian' => 'Colombia',
            'canadian' => 'Canada',
            'tanzania' => 'Tanzania',
            'tanzanite' => 'Tanzania',
        ];

        $lower = strtolower($name);
        foreach ($map as $needle => $origin) {
            if (str_contains($lower, $needle)) {
                return $origin;
            }
        }

        return null;
    }

    private function guessColor(string $name): ?string
    {
        $map = [
            'yellow' => 'Yellow',
            'blue' => 'Blue',
            'green' => 'Green',
            'red' => 'Red',
            'pink' => 'Pink',
            'white' => 'White',
            'black' => 'Black',
            'transparent' => 'Transparent',
            'light' => 'Light',
            'dark' => 'Dark',
        ];

        $lower = strtolower($name);
        foreach ($map as $needle => $label) {
            if (str_contains($lower, $needle)) {
                return $label;
            }
        }

        return null;
    }

    private function guessGrade(string $name): ?string
    {
        $upper = strtoupper($name);
        foreach (['AAA', 'AA', 'A'] as $grade) {
            if (str_contains($upper, $grade)) {
                return $grade;
            }
        }
        return null;
    }

    private function buildShortDescription(?string $gemType, ?float $weightPerPiece, ?int $totalQty): string
    {
        $parts = [];
        if ($gemType) {
            $parts[] = "Natural {$gemType}";
        } else {
            $parts[] = 'Natural gemstone';
        }
        $parts[] = 'from curated inventory';
        if ($weightPerPiece) {
            $parts[] = number_format($weightPerPiece, 2) . ' ct/pc';
        }
        if ($totalQty) {
            $parts[] = "{$totalQty} pieces";
        }
        return implode(' · ', $parts) . '.';
    }

    private function buildDescription(?string $gemType, ?float $rate, ?float $weightPerPiece, ?int $totalQty): string
    {
        $lines = [];
        $lines[] = $gemType
            ? "A curated {$gemType} selected for clarity and natural character."
            : 'A curated gemstone selected for clarity and natural character.';

        if ($rate !== null) {
            $lines[] = 'Pricing set at CAD $' . number_format($rate, 2) . ' per carat.';
        }
        if ($weightPerPiece !== null) {
            $lines[] = 'Typical stone weight: ' . number_format($weightPerPiece, 2) . ' ct per piece.';
        }
        if ($totalQty) {
            $lines[] = "Available quantity: {$totalQty} pieces (subject to change).";
        }
        $lines[] = 'Documentation and disclosure are available upon request.';

        return implode(' ', $lines);
    }

    private function imageForName(string $name, ?string $gemType): string
    {
        $curated = [
            'Emerald' => '/images/gemstones/curated/emerald-cut.png',
            'Sapphire' => '/images/gemstones/curated/sapphire-gem.png',
            'Ruby' => '/images/gemstones/curated/ruby-cut.png',
            'Tanzanite' => '/images/gemstones/curated/tanzanite-marquise.png',
            'Amethyst' => '/images/gemstones/curated/amethyst-facet-cut.png',
            'Garnet' => '/images/gemstones/curated/ruby-cut.png',
            'Topaz' => '/images/gemstones/curated/diamond-emerald-cut.png',
            'Opal' => '/images/gemstones/curated/diamond-emerald-cut.png',
            'Aquamarine' => '/images/gemstones/curated/sapphire-gem.png',
            'Tourmaline' => '/images/gemstones/curated/emerald-cut.png',
            'Peridot' => '/images/gemstones/curated/emerald-cut.png',
            'Citrine' => '/images/gemstones/curated/ametrine-cut.png',
            'Onyx' => '/images/gemstones/curated/diamond-emerald-cut.png',
            'Turquoise' => '/images/gemstones/curated/sapphire-gem.png',
            'Lapis Lazuli' => '/images/gemstones/curated/sapphire-gem.png',
            'Moonstone' => '/images/gemstones/curated/diamond-emerald-cut.png',
            'Spinel' => '/images/gemstones/curated/ruby-cut.png',
            'Zircon' => '/images/gemstones/curated/diamond-emerald-cut.png',
            'Tiger Eye' => '/images/gemstones/curated/ametrine-cut.png',
        ];

        if ($gemType && isset($curated[$gemType])) {
            return $curated[$gemType];
        }

        $lower = strtolower($name);
        if (str_contains($lower, 'bracelet')) {
            return '/images/gemstones/curated/diamond-emerald-cut.png';
        }

        return '/images/gemstones/curated/emerald-cut.png';
    }
}
