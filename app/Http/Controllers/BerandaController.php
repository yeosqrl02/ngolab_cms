<?php

namespace App\Http\Controllers;

use App\Models\Beranda;

class BerandaController extends Controller
{
    /**
     * Tampilkan halaman beranda.
     * Akan mengambil record pertama; jika belum ada, dibuat kosong (supaya Blade tidak error).
     */
    public function index()
    {
        $beranda = Beranda::firstOrCreate([]);

        // View kamu: resources/views/beranda.blade.php
        return view('beranda', compact('beranda'));
    }
}
