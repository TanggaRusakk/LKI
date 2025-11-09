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
        Schema::table('reviews', function (Blueprint $table) {
            // Add nullable service_id and constrain to services table. Nullable so existing reviews are allowed.
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Only drop if the column exists. Some DB drivers (sqlite) will error if foreign key doesn't exist,
            // but the migration rollback should work when the column is present.
            if (Schema::hasColumn('reviews', 'service_id')) {
                $table->dropForeign(['service_id']);
                $table->dropColumn('service_id');
            }
        });
    }
};
