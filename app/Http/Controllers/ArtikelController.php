<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * ===============================
     * HALAMAN DAFTAR ARTIKEL
     * View: resources/views/artikel.blade.php
     * ===============================
     */
    public function index()
    {
        $artikels = Artikel::query()
            // Urutkan artikel terbaru berdasarkan tanggal publish
            ->orderByDesc('tanggal_publish')
            // Fallback jika tanggal_publish NULL
            ->orderByDesc('created_at')
            ->get();

        return view('artikel', [
            'artikels' => $artikels,
        ]);
    }

    /**
     * ===============================
     * HALAMAN DETAIL ARTIKEL
     * View: resources/views/isiartikel.blade.php
     * ===============================
     */
    public function show(string $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        return view('isiartikel', [
            'artikel' => $artikel,
        ]);
    }
}
