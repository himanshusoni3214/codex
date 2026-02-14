<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->addTaxonomyColumns('gemstone_types');
        $this->addTaxonomyColumns('origins');

        if (Schema::hasTable('site_seo_settings') && ! Schema::hasColumn('site_seo_settings', 'default_og_image')) {
            Schema::table('site_seo_settings', function (Blueprint $table) {
                $table->string('default_og_image')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('site_seo_settings') && Schema::hasColumn('site_seo_settings', 'default_og_image')) {
            Schema::table('site_seo_settings', function (Blueprint $table) {
                $table->dropColumn('default_og_image');
            });
        }

        $this->dropTaxonomyColumns('gemstone_types');
        $this->dropTaxonomyColumns('origins');
    }

    private function addTaxonomyColumns(string $tableName): void
    {
        if (! Schema::hasTable($tableName)) {
            return;
        }

        Schema::table($tableName, function (Blueprint $table) use ($tableName) {
            if (! Schema::hasColumn($tableName, 'intro')) {
                $table->text('intro')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'history')) {
                $table->longText('history')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'buying_guide')) {
                $table->longText('buying_guide')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'certification')) {
                $table->longText('certification')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'treatment')) {
                $table->longText('treatment')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'faq_json')) {
                $table->json('faq_json')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'seo_title')) {
                $table->string('seo_title')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'seo_description')) {
                $table->string('seo_description')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'og_image_id')) {
                $table->unsignedBigInteger('og_image_id')->nullable()->index();
            }
            if (! Schema::hasColumn($tableName, 'schema_overrides_json')) {
                $table->longText('schema_overrides_json')->nullable();
            }
            if (! Schema::hasColumn($tableName, 'is_indexable')) {
                $table->boolean('is_indexable')->default(true);
            }
        });
    }

    private function dropTaxonomyColumns(string $tableName): void
    {
        if (! Schema::hasTable($tableName)) {
            return;
        }

        $dropColumns = [
            'intro',
            'history',
            'buying_guide',
            'certification',
            'treatment',
            'faq_json',
            'seo_title',
            'seo_description',
            'og_image_id',
            'schema_overrides_json',
            'is_indexable',
        ];

        $existing = array_filter($dropColumns, fn ($column) => Schema::hasColumn($tableName, $column));
        if ($existing === []) {
            return;
        }

        Schema::table($tableName, function (Blueprint $table) use ($existing) {
            $table->dropColumn($existing);
        });
    }
};
