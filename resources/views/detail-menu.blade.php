@extends('layouts.app')

@section('content')

<section id="deskripsiSection" class="py-12 px-6">

    <div data-aos="fade-up"
        class="max-w-2xl mx-auto bg-white p-8 sm:p-10 rounded-2xl shadow-lg transition-all duration-300">

        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 tracking-wide">
            Detail Menu
        </h2>

        <div class="flex flex-col items-center space-y-6">

            {{-- GAMBAR MENU --}}
            <div class="overflow-hidden rounded-full shadow-lg border-4 border-white">
                <img id="deskripsiImg"
                     src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : 'https://placehold.co/192x192/f97316/white?text=' . urlencode($menu->nama_menu) }}"
                     class="w-48 h-48 object-cover transition-transform duration-500 hover:scale-110"
                     onerror="this.src='https://placehold.co/192x192/f97316/white?text=Menu'">
            </div>

            {{-- NAMA MENU --}}
            <p class="text-2xl font-semibold text-gray-900">
                <i class="fa-solid fa-utensils text-orange-500 mr-2"></i>
                <strong>{{ $menu->nama_menu }}</strong>
            </p>

            {{-- HARGA --}}
            <p class="text-3xl font-bold text-orange-600">
                <i class="fa-solid fa-tag mr-2 text-xl"></i>
                Rp. {{ number_format($menu->harga, 0, ',', '.') }}
            </p>

            {{-- DESKRIPSI --}}
            <p class="text-gray-600 text-center leading-relaxed max-w-lg text-lg">
                {{ $menu->deskripsi }}
            </p>

        </div>

        {{-- BUTTON --}}
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">

            {{-- KEMBALI --}}
            <a href="{{ url('menu') }}"
                class="inline-block bg-gray-100 text-gray-800 hover:bg-gray-200 px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:scale-105 text-center">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Kembali ke Menu
            </a>

            {{-- PESAN --}}
            <a href="https://wa.me/6285895294530?text=Halo%20Ngolab,%20saya%20mau%20pesan%20{{ urlencode($menu->nama_menu) }}"
                target="_blank"
                class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full shadow-lg font-semibold transition-all duration-300 hover:scale-105 text-center">
                <i class="fa-brands fa-whatsapp mr-2"></i>
                Pesan Sekarang
            </a>

        </div>

    </div>

</section>

@endsection
