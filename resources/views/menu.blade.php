@extends('layouts.app')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="max-w-7xl mx-auto px-6 pt-10 pb-10" x-data="{ activeSlide: 0, totalSlides: {{ $menus->count() }} }">
    <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">

        {{-- SIDEBAR --}}
        <aside class="w-full lg:w-56 flex-shrink-0 lg:pt-10">
            <p class="text-[10px] font-bold tracking-[0.2em] text-gray-400 uppercase mb-4">CATEGORIES</p>
            <div class="space-y-2">
                @foreach ($categories as $cat)
                    <a href="{{ route('menu', ['category' => $cat->id]) }}"
                       class="flex items-center justify-between px-5 py-3 rounded-xl transition-all duration-300
                       {{ $selected && $selected->id === $cat->id ? 'bg-[#007542] text-white shadow-lg' : 'text-gray-400 hover:bg-gray-50' }}">
                        <span class="text-lg font-bold">{{ $cat->name }}</span>
                    </a>
                @endforeach
            </div>
        </aside>

        {{-- AREA CONTENT --}}
        {{-- PL-20: Ditambah biar panah kiri punya ruang luas dari sidebar --}}
        <div class="flex-1 lg:pl-20"> 
            @forelse ($menus as $index => $m)
                {{-- GAP-40: Jarak gambar ke teks diperlebar biar panah kanan punya ruang bebas --}}
                <div x-show="activeSlide === {{ $index }}" class="flex flex-col lg:flex-row items-center gap-10 lg:gap-40"> 
                    
                    {{-- GAMBAR & NAVIGASI --}}
                    <div class="relative flex-shrink-0">
                        {{-- Tombol Kiri: Diubah ke -left-20 agar jauh dari gambar --}}
                        <button @click="activeSlide = (activeSlide === 0) ? totalSlides - 1 : activeSlide - 1"
                                class="absolute -left-16 lg:-left-20 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white shadow-xl rounded-full flex items-center justify-center text-[#007542] border border-gray-100 hover:bg-[#007542] hover:text-white transition-all">
                            <i class="fas fa-chevron-left text-lg"></i>
                        </button>

                        <div class="w-72 h-96 lg:w-[320px] lg:h-[450px] bg-gray-50 rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white transition-transform duration-500">
                            <img src="{{ $m->gambar ? asset('storage/'.$m->gambar) : 'https://placehold.co/400x600' }}" class="w-full h-full object-cover">
                        </div>

                        {{-- Tombol Kanan: Diubah ke -right-20 agar jauh dari gambar --}}
                        <button @click="activeSlide = (activeSlide === totalSlides - 1) ? 0 : activeSlide + 1"
                                class="absolute -right-16 lg:-right-20 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white shadow-xl rounded-full flex items-center justify-center text-[#007542] border border-gray-100 hover:bg-[#007542] hover:text-white transition-all">
                            <i class="fas fa-chevron-right text-lg"></i>
                        </button>
                    </div>

                    {{-- TEKS --}}
                    <div class="flex-1 text-center lg:text-left">
                        <h4 class="text-[#007542] font-black uppercase tracking-[0.3em] text-xs mb-2">{{ $selected->name ?? 'MENU' }}</h4>
                        <h1 class="text-6xl lg:text-[80px] font-extrabold text-[#007542] leading-[0.85] tracking-tighter mb-4">{{ $m->nama_menu }}</h1>
                        <p class="text-gray-400 text-lg mb-8 max-w-sm mx-auto lg:mx-0">{{ $m->deskripsi }}</p>
                        <div class="flex items-baseline justify-center lg:justify-start gap-1">
                            <span class="text-3xl font-bold">Rp</span>
                            <span class="text-7xl lg:text-9xl font-black tracking-tighter">{{ number_format($m->harga/1000, 0) }}<span class="text-5xl">.000</span></span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center text-gray-300 italic">Menu belum tersedia.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection