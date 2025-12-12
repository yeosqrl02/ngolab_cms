<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DetailMenu extends Model
{
    protected $fillable = [
        'nama_menu',
        'slug',
        'gambar',
        'harga',
        'deskripsi',
    ];

    // Membuat slug otomatis jika kosong
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($menu) {
            if (empty($menu->slug)) {
                $menu->slug = Str::slug($menu->nama_menu);
            }
        });
    }
}
