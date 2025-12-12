<?php

namespace App\Http\Controllers;

use App\Models\IsiArtikel;

class IsiArtikelController extends Controller
{
    /**
     * Halaman isi artikel berdasarkan slug
     */
    public function show($slug)
    {
        // Ambil artikel berdasarkan slug
        $artikel = IsiArtikel::where('slug', $slug)->firstOrFail();

        // Gunakan view resources/views/isiartikel.blade.php
        return view('isiartikel', compact('artikel'));
    }
}
