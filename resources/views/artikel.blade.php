@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-16 bg-gray-50 min-h-screen">

    {{-- ================= HEADER ================= --}}
    <div class="text-center mb-16 relative" data-aos="fade-down">
        <h1 class="text-5xl font-extrabold text-teal-700 mb-3 tracking-wide drop-shadow-md">
            📰 Galeri Wawasan Terbaru
        </h1>

        <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
            Temukan berbagai tips dan resep inspiratif untuk menambah pengetahuan dan menemani harimu.
        </p>

        <div class="w-20 h-1 bg-yellow-400 mx-auto mt-4 rounded-full"></div>
    </div>

    {{-- ================= GRID ARTIKEL ================= --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

        @forelse ($artikels as $a)
            <div
                data-aos="fade-up"
                data-aos-duration="700"
                class="group bg-white rounded-xl overflow-hidden shadow-xl border-2 border-gray-100
                       transition-all duration-500 ease-in-out
                       hover:-translate-y-2 hover:shadow-2xl hover:shadow-teal-300/50 hover:border-teal-400"
            >

                {{-- ================= THUMBNAIL ================= --}}
                @if (!empty($a->thumbnail))
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $a->thumbnail) }}"
                            alt="Thumbnail {{ $a->judul }}"
                            class="w-full h-48 object-cover transition-transform duration-700
                                   group-hover:scale-105 group-hover:brightness-110"
                        >

                        @if (!empty($a->kategori))
                            <span
                                class="absolute top-4 right-4 bg-yellow-400 text-teal-800
                                       font-bold px-3 py-1.5 rounded-lg text-xs shadow-md"
                            >
                                {{ $a->kategori }}
                            </span>
                        @endif
                    </div>
                @else
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>
                @endif

                {{-- ================= KONTEN ================= --}}
                <div class="p-5 flex flex-col h-full">

                    {{-- Judul --}}
                    <h3
                        class="text-xl font-bold text-gray-800 mb-1
                               transition duration-300 group-hover:text-teal-600"
                    >
                        {{ $a->judul }}
                    </h3>

                    {{-- ================= METADATA ================= --}}
                    <div class="text-xs text-gray-500 mb-3 flex flex-wrap gap-x-2 items-center">

                        {{-- Author (STRING / RELATION AMAN) --}}
                        @php
                            $authorName =
                                $a->author->name
                                ?? $a->author
                                ?? null;
                        @endphp

                        @if ($authorName)
                            <span class="inline-flex items-center">
                                <i class="far fa-user mr-1"></i>
                                {{ $authorName }}
                            </span>
                        @endif

                        {{-- Publish Date --}}
                        @if (!empty($a->tanggal_publish))
                            <span class="mx-1">•</span>
                            <span class="inline-flex items-center">
                                <i class="far fa-calendar-alt mr-1"></i>
                                {{ $a->tanggal_publish->translatedFormat('d M Y') }}
                            </span>
                        @endif

                    </div>

                    {{-- Excerpt --}}
                    @if (!empty($a->excerpt))
                        <p class="text-gray-500 text-sm mb-4 flex-grow">
                            {{ \Illuminate\Support\Str::limit(strip_tags($a->excerpt), 100) }}
                        </p>
                    @endif

                    {{-- Button --}}
                    @if (!empty($a->slug))
                        <a
                            href="{{ route('artikel.isi', $a->slug) }}"
                            class="mt-auto inline-flex items-center justify-center
                                   bg-teal-600 text-white px-5 py-2 rounded-lg font-semibold
                                   transition duration-300 transform
                                   group-hover:bg-yellow-400 group-hover:text-teal-800 group-hover:shadow-md"
                        >
                            Baca Selengkapnya
                            <i class="fas fa-chevron-right ml-2 text-sm"></i>
                        </a>
                    @endif

                </div>
            </div>

        @empty
            <div class="col-span-full text-center py-20 text-gray-400">
                Belum ada artikel yang tersedia.
            </div>
        @endforelse

    </div>

</main>

@endsection
