<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\SEO\Schema\JsonLd;
use App\SEO\Schema\ProductSchema;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DumpProductSchema extends Command
{
    protected $signature = 'seo:schema:product {slug : Product slug or SKU} {--type= : Optional gemstone type slug for canonical URL generation}';

    protected $description = 'Dump Product JSON-LD schema (for verification/debug).';

    public function handle(ProductSchema $schemaBuilder): int
    {
        $slugOrSku = (string) $this->argument('slug');

        $product = Product::query()
            ->with(['gemstoneTypes', 'origins'])
            ->where('slug', $slugOrSku)
            ->orWhere('sku', $slugOrSku)
            ->first();

        if (! $product) {
            $this->error('Product not found for: ' . $slugOrSku);
            return Command::FAILURE;
        }

        $typeSlug = $this->option('type')
            ? (string) $this->option('type')
            : ($product->primary_type_slug ?: null);

        $description = $product->description ?: $product->short_description ?: $product->title;
        $description = (string) Str::of(strip_tags((string) $description))->squish();

        $schema = $schemaBuilder->build($product, [
            'typeSlug' => $typeSlug,
            'category' => $product->gem_type ?: optional($product->primary_gemstone_type)->name,
            'description' => $description,
        ]);

        $this->line(JsonLd::encode($schema));

        return Command::SUCCESS;
    }
}

