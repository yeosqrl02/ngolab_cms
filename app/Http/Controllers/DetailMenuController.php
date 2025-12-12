<?php

namespace App\Http\Controllers;

use App\Models\DetailMenu;

class DetailMenuController extends Controller
{
    /**
     * Tampilkan detail menu berdasarkan ID
     */
    public function show($id)
    {
        // Cari menu berdasarkan ID
        $menu = DetailMenu::findOrFail($id);

        // Kirim ke view detail-menu.blade.php
        return view('detail-menu', compact('menu'));
    }
}
