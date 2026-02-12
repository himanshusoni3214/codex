<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class SyncProductSummaries extends Command
{
    protected $signature = 'inventory:sync-product-summaries';

    protected $description = 'Recalculate product total_quantity and total_weight from gemstone pieces.';

    public function handle(): int
    {
        $updated = 0;

        Product::query()
            ->with('gemstonePieces')
            ->chunk(200, function ($products) use (&$updated) {
                foreach ($products as $product) {
                    $pieces = $product->gemstonePieces;
                    if ($pieces->isEmpty()) {
                        continue;
                    }

                    $totalQuantity = $pieces->count();
                    $totalWeight = $pieces->sum('weight_ct');

                    $product->total_quantity = $totalQuantity;
                    $product->total_weight = $totalWeight;
                    $product->save();
                    $updated++;
                }
            });

        $this->info("Updated {$updated} product summaries.");

        return Command::SUCCESS;
    }
}
