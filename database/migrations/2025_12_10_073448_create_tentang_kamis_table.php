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
        Schema::create('tentang_kamis', function (Blueprint $table) {
            $table->id();

            // HERO SECTION
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_video_url')->nullable();
            $table->string('hero_image')->nullable();

            // VISI & MISI
            $table->string('visi_title')->nullable();
            $table->text('visi_description')->nullable();
            $table->string('misi_title')->nullable();
            $table->text('misi_description')->nullable();
            $table->string('visimisi_image')->nullable();

            // OPERASIONAL
            $table->string('operasional_title')->nullable();
            $table->text('operasional_description')->nullable();
            $table->string('operasional_jam')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('wa_url')->nullable();

            // GALLERY IMAGES
            $table->string('gallery_img1')->nullable();
            $table->string('gallery_img2')->nullable();
            $table->string('gallery_img3')->nullable();

            // LOKASI
            $table->string('lokasi_title')->nullable();
            $table->text('lokasi_description')->nullable();
            $table->text('lokasi_embed_map')->nullable();

            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kamis');
    }
};
