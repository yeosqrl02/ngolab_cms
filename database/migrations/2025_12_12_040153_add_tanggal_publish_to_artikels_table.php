<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            // Pastikan kolom belum ada, dan letakkan di akhir agar aman
            if (!Schema::hasColumn('artikels', 'tanggal_publish')) {
                $table->timestamp('tanggal_publish')->nullable()->after('konten');
            }
        });
    }

    public function down(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            if (Schema::hasColumn('artikels', 'tanggal_publish')) {
                $table->dropColumn('tanggal_publish');
            }
        });
    }
};
