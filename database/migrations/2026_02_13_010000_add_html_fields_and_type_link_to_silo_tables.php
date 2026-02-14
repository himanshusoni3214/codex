<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('gemstone_types')) {
            Schema::table('gemstone_types', function (Blueprint $table) {
                if (! Schema::hasColumn('gemstone_types', 'intro_html')) {
                    $table->longText('intro_html')->nullable()->after('intro');
                }
                if (! Schema::hasColumn('gemstone_types', 'history_html')) {
                    $table->longText('history_html')->nullable()->after('history');
                }
                if (! Schema::hasColumn('gemstone_types', 'buying_guide_html')) {
                    $table->longText('buying_guide_html')->nullable()->after('buying_guide');
                }
                if (! Schema::hasColumn('gemstone_types', 'certification_html')) {
                    $table->longText('certification_html')->nullable()->after('certification');
                }
                if (! Schema::hasColumn('gemstone_types', 'treatment_html')) {
                    $table->longText('treatment_html')->nullable()->after('treatment');
                }
            });
        }

        if (Schema::hasTable('origins')) {
            Schema::table('origins', function (Blueprint $table) {
                if (! Schema::hasColumn('origins', 'gemstone_type_id')) {
                    $table->foreignId('gemstone_type_id')
                        ->nullable()
                        ->after('id')
                        ->constrained('gemstone_types')
                        ->nullOnDelete();
                }
                if (! Schema::hasColumn('origins', 'intro_html')) {
                    $table->longText('intro_html')->nullable()->after('intro');
                }
                if (! Schema::hasColumn('origins', 'history_html')) {
                    $table->longText('history_html')->nullable()->after('history');
                }
                if (! Schema::hasColumn('origins', 'buying_guide_html')) {
                    $table->longText('buying_guide_html')->nullable()->after('buying_guide');
                }
                if (! Schema::hasColumn('origins', 'certification_html')) {
                    $table->longText('certification_html')->nullable()->after('certification');
                }
                if (! Schema::hasColumn('origins', 'treatment_html')) {
                    $table->longText('treatment_html')->nullable()->after('treatment');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('origins')) {
            Schema::table('origins', function (Blueprint $table) {
                if (Schema::hasColumn('origins', 'gemstone_type_id')) {
                    $table->dropConstrainedForeignId('gemstone_type_id');
                }

                $dropColumns = array_filter([
                    Schema::hasColumn('origins', 'intro_html') ? 'intro_html' : null,
                    Schema::hasColumn('origins', 'history_html') ? 'history_html' : null,
                    Schema::hasColumn('origins', 'buying_guide_html') ? 'buying_guide_html' : null,
                    Schema::hasColumn('origins', 'certification_html') ? 'certification_html' : null,
                    Schema::hasColumn('origins', 'treatment_html') ? 'treatment_html' : null,
                ]);

                if ($dropColumns !== []) {
                    $table->dropColumn($dropColumns);
                }
            });
        }

        if (Schema::hasTable('gemstone_types')) {
            Schema::table('gemstone_types', function (Blueprint $table) {
                $dropColumns = array_filter([
                    Schema::hasColumn('gemstone_types', 'intro_html') ? 'intro_html' : null,
                    Schema::hasColumn('gemstone_types', 'history_html') ? 'history_html' : null,
                    Schema::hasColumn('gemstone_types', 'buying_guide_html') ? 'buying_guide_html' : null,
                    Schema::hasColumn('gemstone_types', 'certification_html') ? 'certification_html' : null,
                    Schema::hasColumn('gemstone_types', 'treatment_html') ? 'treatment_html' : null,
                ]);

                if ($dropColumns !== []) {
                    $table->dropColumn($dropColumns);
                }
            });
        }
    }
};

