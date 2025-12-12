@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-6 py-16 bg-white min-h-screen">

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

        {{-- ================= KATEGORI ================= --}}
        <div class="col-span-1 space-y-4">
            @foreach ($categories as $cat)
                <a href="{{ route('menu', ['category' => $cat->id]) }}"
                   class="block text-lg font-bold px-4 py-3 rounded-lg transition
                   {{ $selected && $selected->id === $cat->id
                        ? 'bg-teal-700 text-white'
                        : 'text-teal-700 bg-teal-100/30 hover:bg-teal-200' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        {{-- ================= DAFTAR MENU ================= --}}
        <div class="col-span-4 grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($menus as $m)
                <div class="bg-white rounded-xl shadow-lg border transition
                            hover:-translate-y-1 hover:shadow-2xl">

                    {{-- Gambar --}}
                    @if ($m->gambar)
                        <img src="{{ asset('storage/'.$m->gambar) }}"
                             class="w-full h-48 object-cover rounded-t-xl">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                            Belum ada gambar
                        </div>
                    @endif

                    {{-- Info --}}
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-teal-800 mb-2">
                            {{ $m->nama_menu }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-3">
                            {{ $m->deskripsi }}
                        </p>

                        <div class="text-lg font-extrabold text-red-600">
                            {{ $m->harga }}
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center text-gray-400 py-12">
                    Belum ada menu di kategori
                    <span class="font-semibold">
                        {{ $selected?->name }}
                    </span>.
                </div>
            @endforelse

        </div>
    </div>

</main>
@endsection
