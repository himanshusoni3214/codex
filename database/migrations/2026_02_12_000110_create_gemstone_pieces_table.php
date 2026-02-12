<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gemstone_pieces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('lot_id')->nullable()->constrained('gemstone_lots')->nullOnDelete();
            $table->string('piece_code')->unique();
            $table->decimal('weight_ct', 8, 2);
            $table->decimal('price_total_cad', 10, 2)->nullable();
            $table->decimal('rate_per_carat_cad', 10, 2)->nullable();
            $table->string('status')->default('available');
            $table->dateTime('reserved_until')->nullable();
            $table->string('reserved_by')->nullable();
            $table->dateTime('sold_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['product_id', 'status']);
            $table->index(['status', 'reserved_until']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gemstone_pieces');
    }
};
