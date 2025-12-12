<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentang = TentangKami::first();

        return view('tentang-kami', compact('tentang'));
    }
}
