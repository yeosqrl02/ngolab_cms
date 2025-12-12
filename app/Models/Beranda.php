<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;

    protected $table = 'berandas';

    /**
     * Field yang boleh diisi dari Filament
     * (hanya yang benar-benar dipakai)
     */
    protected $fillable = [
        'hero_image',
        'promos',
        'popular_menus',
        'testimonials',
    ];

    /**
     * Casting JSON → array
     * WAJIB untuk Repeater Filament
     */
    protected $casts = [
        'promos'         => 'array',
        'popular_menus' => 'array',
        'testimonials'  => 'array',
    ];

    /**
     * Default value
     * Supaya tidak null & tidak error di Repeater
     */
    protected $attributes = [
        'promos'         => '[]',
        'popular_menus' => '[]',
        'testimonials'  => '[]',
    ];
}
