<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori
        $categories = Category::orderBy('name')->get();

        // Tentukan kategori terpilih
        $selectedCategory = null;

        if ($request->has('category')) {
            $selectedCategory = Category::where('id', $request->category)->first();
        }

        // Jika belum ada query, pakai kategori pertama
        if (!$selectedCategory && $categories->count() > 0) {
            $selectedCategory = $categories->first();
        }

        // Ambil menu berdasarkan kategori
        $menus = $selectedCategory
            ? Menu::where('category_id', $selectedCategory->id)->get()
            : collect();

        return view('menu', [
            'categories' => $categories,
            'selected'   => $selectedCategory,
            'menus'      => $menus,
        ]);
    }
}
