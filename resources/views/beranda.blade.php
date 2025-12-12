@extends('layouts.app')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative min-h-screen flex items-center overflow-hidden w-full bg-orange-50/50">
    <div class="absolute top-10 right-10 w-40 h-40 bg-gradient-to-br from-yellow-300/70 to-orange-300/50 rounded-full blur-2xl animate-spin-slow opacity-60"></div>
    <div class="absolute bottom-20 left-20 w-60 h-60 bg-gradient-to-br from-red-300/60 to-pink-300/40 rounded-full blur-3xl animate-pulse-slow opacity-50"></div>

    <div class="relative w-full max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-2 items-center gap-16 z-10">

        {{-- HERO TEXT --}}
        <div class="space-y-8 text-center lg:text-left">
            <h1 class="text-6xl lg:text-7xl font-extrabold leading-snug tracking-tight">
                <span class="bg-gradient-to-r from-orange-700 via-red-600 to-yellow-700 bg-clip-text text-transparent">
                    Mie Bakso Mas Yanto
                </span>
                <br>
                <span class="text-4xl text-orange-900 block mt-2">
                    Bakso Legendaris Sejak 1998
                </span>
            </h1>

            <p class="text-xl text-gray-800 max-w-lg">
                Bakso dengan kuah gurih, mie kenyal, dan cita rasa khas.
            </p>
        </div>

        {{-- HERO IMAGE (CRUD + GRADIENT BACKGROUND) --}}
        <div class="relative flex justify-center lg:justify-end">
            <div class="relative">

                {{-- GRADIENT BACKGROUND --}}
                <div class="absolute -inset-12 rounded-full
                            bg-gradient-to-br from-orange-200 via-orange-300 to-yellow-200
                            blur-3xl opacity-80"></div>

                {{-- SOFT RING --}}
                <div class="absolute inset-0 rounded-full
                            bg-gradient-to-br from-orange-300 via-yellow-300 to-orange-400
                            opacity-30 scale-110"></div>

                @if(!empty($beranda->hero_image))
                    <img
                        src="{{ asset('storage/'.$beranda->hero_image) }}"
                        class="relative w-96 h-96 lg:w-[500px] lg:h-[500px]
                               object-cover rounded-full
                               border-[12px] border-white
                               shadow-2xl ring-4 ring-orange-300/40"
                        alt="Hero Image">
                @else
                    <div
                        class="relative w-96 h-96 lg:w-[500px] lg:h-[500px]
                               rounded-full border-[12px] border-white
                               bg-gradient-to-br from-orange-100 via-orange-200 to-yellow-100
                               shadow-2xl flex items-center justify-center text-orange-400 font-semibold">
                        Belum ada gambar hero
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


{{-- ================= PROMO SECTION ================= --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center mb-16">
            Promo Spesial 🔥
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($beranda->promos ?? [] as $promo)
                <div class="bg-red-50 rounded-3xl overflow-hidden shadow-2xl border-b-8 border-red-500">
                    @if(!empty($promo['image']))
                        <img src="{{ asset('storage/'.$promo['image']) }}"
                             class="w-full h-56 object-cover">
                    @else
                        <div class="w-full h-56 bg-gray-100 flex items-center justify-center text-gray-400">
                            Tidak ada gambar
                        </div>
                    @endif

                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-extrabold mb-2">
                            {{ $promo['title'] ?? '' }}
                        </h3>
                        <p class="italic text-gray-600 mb-4">
                            {{ $promo['subtitle'] ?? '' }}
                        </p>

                        @if(!empty($promo['button_text']))
                            <a href="{{ url('menu') }}"
                               class="inline-block px-6 py-3 bg-orange-500 text-white rounded-full font-bold">
                                {{ $promo['button_text'] }}
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-400 col-span-full">
                    Belum ada promo.
                </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ================= MENU POPULER ================= --}}
<section class="py-20 bg-gray-50/50 overflow-hidden">
    <h2 class="text-4xl font-extrabold text-center mb-16">
        Menu Populer ✨
    </h2>

    <div class="flex gap-6 w-max animate-marquee px-6">
        @foreach($beranda->popular_menus ?? [] as $menu)
            <div class="min-w-[260px] bg-white rounded-3xl shadow-xl border-b-4 border-orange-500">
                @if(!empty($menu['image']))
                    <img src="{{ asset('storage/'.$menu['image']) }}"
                         class="w-full h-48 object-cover rounded-t-3xl">
                @else
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>
                @endif

                <div class="p-4">
                    <h3 class="font-bold text-xl">{{ $menu['name'] ?? '' }}</h3>
                    <p class="text-sm text-gray-600">{{ $menu['desc'] ?? '' }}</p>
                    <div class="flex justify-between pt-2">
                        <span class="font-bold text-red-600">{{ $menu['price'] ?? '' }}</span>
                        <a href="https://wa.me/6285895294530"
                           class="text-sm text-orange-500 border border-orange-500 rounded-full px-3 py-1">
                            Beli
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


{{-- ================= TESTIMONI ================= --}}
<section class="py-24 bg-white">
    <h2 class="text-4xl font-extrabold text-center mb-16">
        Apa Kata Mereka? ⭐⭐⭐⭐⭐
    </h2>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
        @forelse($beranda->testimonials ?? [] as $rev)
            <div class="bg-orange-50 p-8 rounded-2xl shadow-xl border-t-8 border-orange-500">
                <p class="italic mb-4">"{{ $rev['quote'] ?? '' }}"</p>
                <p class="font-bold">{{ $rev['name'] ?? '' }}</p>
                <p class="text-sm text-red-500">{{ $rev['product'] ?? '' }}</p>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-400">
                Belum ada testimoni.
            </div>
        @endforelse
    </div>
</section>

<style>
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    animation: marquee 40s linear infinite;
}
</style>

@endsection
