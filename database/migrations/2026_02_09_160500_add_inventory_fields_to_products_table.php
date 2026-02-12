<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->nullable()->unique()->after('slug');
            $table->decimal('rate_per_carat', 10, 2)->nullable()->after('currency');
            $table->decimal('total_weight', 10, 2)->nullable()->after('rate_per_carat');
            $table->unsignedInteger('total_quantity')->nullable()->after('total_weight');
            $table->decimal('weight_per_piece', 10, 2)->nullable()->after('total_quantity');
            $table->string('serial_quantity')->nullable()->after('weight_per_piece');
            $table->text('notes')->nullable()->after('serial_quantity');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['sku']);
            $table->dropColumn([
                'sku',
                'rate_per_carat',
                'total_weight',
                'total_quantity',
                'weight_per_piece',
                'serial_quantity',
                'notes',
            ]);
        });
    }
};
