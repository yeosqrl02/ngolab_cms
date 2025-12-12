<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('berandas', function (Blueprint $table) {

            if (!Schema::hasColumn('berandas', 'promos')) {
                $table->json('promos')->nullable()->after('hero_image');
            }

            if (!Schema::hasColumn('berandas', 'popular_menus')) {
                $table->json('popular_menus')->nullable()->after('promos');
            }

            if (!Schema::hasColumn('berandas', 'testimonials')) {
                $table->json('testimonials')->nullable()->after('popular_menus');
            }
        });
    }

    public function down(): void
    {
        Schema::table('berandas', function (Blueprint $table) {
            $table->dropColumn(['promos', 'popular_menus', 'testimonials']);
        });
    }
};
