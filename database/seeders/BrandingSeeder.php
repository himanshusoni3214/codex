<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BrandingSeeder extends Seeder
{
    private const BRAND_PATTERN = '/Natural Gem(?!stones| Store)/u';
    private const BRAND_DUPLICATE_PATTERN = '/Natural Gem(?: Store)+/u';
    private const BRAND_REPLACEMENT = 'Natural Gem Store';

    public function run(): void
    {
        $this->syncSettings();

        $this->replaceInTable('settings', ['value']);
        $this->replaceInTable('site_seo_settings', [
            'organization_name',
            'default_meta_title',
            'default_meta_description',
        ]);
        $this->replaceInTable('pages', [
            'title',
            'hero_title',
            'hero_subtitle',
            'meta_title',
            'meta_description',
            'content',
            'excerpt',
        ]);
        $this->replaceInTable('products', [
            'title',
            'short_description',
            'description',
            'notes',
            'symbolic_meaning',
            'meta_title',
            'meta_description',
        ]);
        $this->replaceInTable('gemstone_types', [
            'name',
            'description',
            'intro',
            'intro_html',
            'history',
            'history_html',
            'buying_guide',
            'buying_guide_html',
            'certification',
            'certification_html',
            'treatment',
            'treatment_html',
            'seo_title',
            'seo_description',
            'hero_title',
            'hero_subtitle',
            'meta_title',
            'meta_description',
        ]);
        $this->replaceInTable('origins', [
            'name',
            'description',
            'intro',
            'intro_html',
            'history',
            'history_html',
            'buying_guide',
            'buying_guide_html',
            'certification',
            'certification_html',
            'treatment',
            'treatment_html',
            'seo_title',
            'seo_description',
            'hero_title',
            'hero_subtitle',
            'meta_title',
            'meta_description',
        ]);
        $this->replaceInTable('users', ['name']);
    }

    private function syncSettings(): void
    {
        if (!Schema::hasTable('settings')) {
            return;
        }

        $existing = DB::table('settings')->where('key', 'site_name')->first();
        if ($existing) {
            DB::table('settings')
                ->where('id', $existing->id)
                ->update(['value' => self::BRAND_REPLACEMENT]);
            return;
        }

        DB::table('settings')->insert([
            'key' => 'site_name',
            'value' => self::BRAND_REPLACEMENT,
        ]);
    }

    /**
     * @param list<string> $columns
     */
    private function replaceInTable(string $table, array $columns): void
    {
        if (!Schema::hasTable($table) || !Schema::hasColumn($table, 'id')) {
            return;
        }

        $columns = array_values(array_filter(
            $columns,
            static fn (string $column): bool => Schema::hasColumn($table, $column)
        ));

        if ($columns === []) {
            return;
        }

        DB::table($table)->orderBy('id')->chunkById(200, function ($rows) use ($table, $columns) {
            foreach ($rows as $row) {
                $updates = [];

                foreach ($columns as $column) {
                    $value = $row->{$column} ?? null;
                    if (!is_string($value) || $value === '') {
                        continue;
                    }

                    $replaced = $this->replaceBrandText($value);
                    if ($replaced !== $value) {
                        $updates[$column] = $replaced;
                    }
                }

                if ($updates !== []) {
                    DB::table($table)->where('id', $row->id)->update($updates);
                }
            }
        }, 'id');
    }

    private function replaceBrandText(string $value): string
    {
        $normalized = preg_replace(self::BRAND_DUPLICATE_PATTERN, self::BRAND_REPLACEMENT, $value) ?? $value;

        return preg_replace(self::BRAND_PATTERN, self::BRAND_REPLACEMENT, $normalized) ?? $normalized;
    }
}
