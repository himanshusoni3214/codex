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
        Schema::table('consultations', function (Blueprint $table) {
            $table->foreignId('consultation_tier_id')->nullable()->after('consultation_tier')->constrained('consultation_tiers')->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->after('consultation_tier_id')->constrained()->nullOnDelete();
            $table->foreignId('assigned_to_user_id')->nullable()->after('customer_id')->constrained('users')->nullOnDelete();
            $table->string('status')->default('pending')->after('assigned_to_user_id');
            $table->timestamp('appointment_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('consultation_tier_id');
            $table->dropConstrainedForeignId('customer_id');
            $table->dropConstrainedForeignId('assigned_to_user_id');
            $table->dropColumn(['status', 'appointment_at']);
        });
    }
};
