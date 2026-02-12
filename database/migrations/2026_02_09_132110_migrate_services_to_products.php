<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('services') || ! Schema::hasTable('products')) {
            return;
        }

        $services = DB::table('services')->get();

        foreach ($services as $service) {
            DB::table('products')->updateOrInsert(
                ['slug' => $service->slug],
                [
                    'title' => $service->title,
                    'product_type' => 'gemstone',
                    'status' => 'active',
                    'short_description' => $service->short_description,
                    'description' => $service->description,
                    'image' => $service->image,
                    'price_cad' => $service->price_cad,
                    'currency' => 'CAD',
                    'gem_type' => $service->category,
                    'treatment' => $service->treatment,
                    'certificate_lab' => $service->certificate_lab,
                    'certificate_number' => $service->certificate_number,
                    'certificate_url' => $service->certificate_url,
                    'origin' => $service->origin,
                    'carat' => $service->carat,
                    'color' => $service->color,
                    'clarity' => $service->clarity,
                    'cut' => $service->cut,
                    'shape' => $service->shape,
                    'symbolic_meaning' => $service->symbolic_meaning,
                    'meta_title' => $service->meta_title,
                    'meta_description' => $service->meta_description,
                    'is_featured' => (bool) ($service->is_featured ?? false),
                    'created_at' => $service->created_at,
                    'updated_at' => $service->updated_at,
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('products')) {
            return;
        }

        DB::table('products')->where('product_type', 'gemstone')->delete();
    }
};
