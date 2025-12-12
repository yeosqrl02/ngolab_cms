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
        Schema::create('detail_menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');      // nama menu
            $table->string('slug')->unique(); // untuk URL detail menu
            $table->string('gambar')->nullable(); // foto menu
            $table->integer('harga');         // harga menu
            $table->text('deskripsi')->nullable(); // deskripsi menu
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_menus');
    }
};
