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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_number')->nullable()->after('id');
            $table->foreignId('product_id')->nullable()->after('service_id')->constrained('products')->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->after('product_id')->constrained()->nullOnDelete();
            $table->decimal('subtotal', 10, 2)->nullable()->after('message');
            $table->decimal('tax', 10, 2)->nullable()->after('subtotal');
            $table->decimal('total', 10, 2)->nullable()->after('tax');
            $table->decimal('tax_rate', 5, 2)->nullable()->after('total');
            $table->string('currency', 10)->default('CAD')->after('tax_rate');
            $table->string('province', 50)->nullable()->after('currency');
            $table->timestamp('paid_at')->nullable()->after('province');
            $table->timestamp('refunded_at')->nullable()->after('paid_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_id');
            $table->dropConstrainedForeignId('customer_id');
            $table->dropColumn([
                'order_number',
                'subtotal',
                'tax',
                'total',
                'tax_rate',
                'currency',
                'province',
                'paid_at',
                'refunded_at',
            ]);
        });
    }
};
