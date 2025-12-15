<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    /**
     * =========================
     * FIELD YANG BOLEH DIISI
     * =========================
     */
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'author',           // ✅ STRING (diketik manual)
        'thumbnail',
        'excerpt',
        'konten',
        'waktu_baca',
        'tanggal_publish',
    ];

    /**
     * =========================
     * CASTING
     * =========================
     */
    protected $casts = [
        'tanggal_publish' => 'datetime',
        'created_at'      => 'datetime',
        'updated_at'      => 'datetime',
    ];

    /**
     * =========================
     * BOOT MODEL
     * - Auto generate slug
     * - Auto set tanggal_publish jika kosong
     * =========================
     */
    protected static function booted(): void
    {
        static::creating(function (Artikel $artikel) {

            // Auto slug dari judul
            if (empty($artikel->slug) && ! empty($artikel->judul)) {
                $slug = Str::slug($artikel->judul);
                $original = $slug;
                $i = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = $original . '-' . $i++;
                }

                $artikel->slug = $slug;
            }

            // Auto set tanggal publish jika belum diisi
            if (empty($artikel->tanggal_publish)) {
                $artikel->tanggal_publish = now();
            }
        });
    }
}
