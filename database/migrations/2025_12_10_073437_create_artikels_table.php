<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();

            // ================= DATA UTAMA
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori')->nullable();

            // ================= AUTHOR (DIKETIK MANUAL)
            $table->string('author')->nullable(); // 🔥 BUKAN foreign key

            // ================= MEDIA
            $table->string('thumbnail')->nullable(); // path storage/public/artikels

            // ================= KONTEN
            $table->text('excerpt')->nullable();
            $table->longText('konten'); // WAJIB

            // ================= META
            $table->string('waktu_baca')->nullable();         // contoh: "5 menit"
            $table->dateTime('tanggal_publish')->nullable(); // tanggal + jam publish

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
