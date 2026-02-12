<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gemstone_lots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('lot_code')->unique();
            $table->string('origin')->nullable();
            $table->string('treatment')->nullable();
            $table->text('disclosure')->nullable();
            $table->string('certificate_type')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('certificate_url')->nullable();
            $table->text('notes')->nullable();
            $table->date('received_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gemstone_lots');
    }
};
