<?php

namespace App\Http\Controllers;

use App\Models\IsiArtikel;

class IsiArtikelController extends Controller
{
    /**
     * ===============================
     * HALAMAN ISI / DETAIL ARTIKEL
     * View: resources/views/isiartikel.blade.php
     * ===============================
     */
    public function show(string $slug)
    {
        // Ambil artikel berdasarkan slug
        $artikel = IsiArtikel::where('slug', $slug)->firstOrFail();

        return view('isiartikel', compact('artikel'));
    }
}
