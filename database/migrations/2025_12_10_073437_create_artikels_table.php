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

            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori')->nullable();

            // file path di storage (public)
            $table->string('thumbnail')->nullable();

            // ringkasan & isi
            $table->text('excerpt')->nullable();
            $table->longText('konten')->nullable();

            // meta optional
            $table->string('waktu_baca')->nullable();     // contoh "5 menit"
            $table->timestamp('tanggal_publish')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
