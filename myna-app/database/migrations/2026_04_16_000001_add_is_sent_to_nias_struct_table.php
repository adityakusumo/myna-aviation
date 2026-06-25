<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // is_sent and sent_at columns are already included
        // in 2026_04_15_000001_recreate_nias_struct_table.php
        // This migration is kept for historical tracking but is a no-op.
        if (!Schema::hasColumn('NIAS_STRUCT', 'is_sent')) {
            Schema::table('NIAS_STRUCT', function (Blueprint $table) {
                $table->boolean('is_sent')->default(false)->after('is_update');
                $table->timestamp('sent_at')->nullable()->after('is_sent');
            });
        }
    }

    public function down(): void
    {
        // Don't drop — columns are needed by the system
    }
};
