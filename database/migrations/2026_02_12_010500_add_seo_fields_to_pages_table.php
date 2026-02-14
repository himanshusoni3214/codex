<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('section')->default('general')->after('slug');
            $table->string('canonical_url')->nullable()->after('meta_description');
            $table->longText('schema_json')->nullable()->after('canonical_url');
            $table->json('faq_items')->nullable()->after('schema_json');
            $table->json('related_links')->nullable()->after('faq_items');
            $table->string('hero_title')->nullable()->after('title');
            $table->text('hero_subtitle')->nullable()->after('hero_title');
            $table->boolean('is_indexable')->default(true)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'section',
                'canonical_url',
                'schema_json',
                'faq_items',
                'related_links',
                'hero_title',
                'hero_subtitle',
                'is_indexable',
            ]);
        });
    }
};

