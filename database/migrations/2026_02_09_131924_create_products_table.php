<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('product_type')->default('gemstone'); // gemstone | jewelry
            $table->string('status')->default('active'); // active | draft | archived
            $table->string('short_description', 500)->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price_cad', 10, 2)->nullable();
            $table->string('currency', 10)->default('CAD');
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('gem_type')->nullable();
            $table->string('treatment')->nullable();
            $table->text('treatment_disclosure')->nullable();
            $table->string('certificate_lab')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('certificate_url')->nullable();
            $table->string('origin')->nullable();
            $table->decimal('carat', 8, 2)->nullable();
            $table->string('color')->nullable();
            $table->string('clarity')->nullable();
            $table->string('cut')->nullable();
            $table->string('shape')->nullable();
            $table->text('symbolic_meaning')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('is_featured')->default(false);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
