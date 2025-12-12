<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'thumbnail',      // path di storage/app/public/artikel/...
        'excerpt',
        'konten',         // HTML / teks panjang
        'waktu_baca',     // contoh: "5 menit"
        'tanggal_publish' // datetime
    ];

    protected $casts = [
        'tanggal_publish' => 'datetime',
    ];

    /**
     * Buat slug otomatis dari judul saat create jika slug kosong.
     */
    protected static function booted(): void
    {
        static::creating(function (Artikel $artikel) {
            if (empty($artikel->slug) && !empty($artikel->judul)) {
                $artikel->slug = Str::slug($artikel->judul);

                // Pastikan unik (opsional sederhana)
                $original = $artikel->slug;
                $i = 1;
                while (static::where('slug', $artikel->slug)->exists()) {
                    $artikel->slug = $original.'-'.$i++;
                }
            }
        });
    }
}
