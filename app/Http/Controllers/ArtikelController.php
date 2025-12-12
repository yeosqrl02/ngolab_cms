<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Halaman daftar artikel
     * View: resources/views/artikel.blade.php
     */
    public function index()
    {
        // Kamu bisa ganti ->latest() ke orderBy lain jika perlu.
        // Tambahkan paginate() jika mau pagination.
        $artikels = Artikel::latest('tanggal_publish')
            ->latest() // fallback created_at
            ->get();

        return view('artikel', compact('artikels'));
    }

    /**
     * Halaman detail artikel berdasarkan slug
     * View: resources/views/isiartikel.blade.php
     */
    public function show(string $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        return view('isiartikel', compact('artikel'));
    }
}
