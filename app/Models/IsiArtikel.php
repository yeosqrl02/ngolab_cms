<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class IsiArtikel extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'thumbnail',
        'waktu_baca',
        'tanggal_publish',
        'konten'
    ];

    // Generate slug otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul);
            }
        });
    }
}
