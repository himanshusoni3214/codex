<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('origin_text')->nullable()->after('origin');
            $table->text('treatment_text')->nullable()->after('treatment_disclosure');
            $table->text('certification_text')->nullable()->after('certificate_url');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['origin_text', 'treatment_text', 'certification_text']);
        });
    }
};

