<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->nullable()->after('slug');
            $table->decimal('price_cad', 10, 2)->nullable()->after('short_description');
            $table->string('certificate_lab')->nullable()->after('price_cad');
            $table->string('certificate_number')->nullable()->after('certificate_lab');
            $table->string('certificate_url')->nullable()->after('certificate_number');
            $table->string('treatment')->nullable()->after('certificate_url');
            $table->string('origin')->nullable()->after('treatment');
            $table->decimal('carat', 8, 2)->nullable()->after('origin');
            $table->string('color')->nullable()->after('carat');
            $table->string('clarity')->nullable()->after('color');
            $table->string('cut')->nullable()->after('clarity');
            $table->string('shape')->nullable()->after('cut');
            $table->text('symbolic_meaning')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'price_cad',
                'certificate_lab',
                'certificate_number',
                'certificate_url',
                'treatment',
                'origin',
                'carat',
                'color',
                'clarity',
                'cut',
                'shape',
                'symbolic_meaning',
            ]);
        });
    }
};
