<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berandas', function (Blueprint $table) {
            $table->id();

            // HERO
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable(); // path ke storage (public)

            // PROMO
            $table->string('promo_title')->nullable();
            $table->text('promo_subtitle')->nullable();
            $table->string('promo_button_text')->nullable();
            $table->string('promo_image')->nullable(); // path ke storage (public)

            // MENU POPULER (Repeater JSON di Filament)
            $table->json('popular_menus')->nullable();

            // TESTIMONI (Repeater JSON di Filament)
            $table->json('testimonials')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berandas');
    }
};
