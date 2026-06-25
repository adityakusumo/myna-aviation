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
        Schema::table('users', function (Blueprint $table) {
            // Rename finswimming-specific 'namaclub' to aviation-relevant 'nationality'
            $table->renameColumn('namaclub', 'nationality');

            // Add aviation-relevant contact & identity fields
            $table->string('phone', 30)->nullable()->after('nationality')
                  ->comment('Contact phone number');
            $table->string('employee_id', 50)->nullable()->after('phone')
                  ->comment('Employee / Staff ID number');
            $table->string('position', 100)->nullable()->after('employee_id')
                  ->comment('Job title / Position in company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['position', 'employee_id', 'phone']);
            $table->renameColumn('nationality', 'namaclub');
        });
    }
};
