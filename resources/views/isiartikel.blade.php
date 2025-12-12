@extends('layouts.app')

@section('content')

<main class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl p-6 sm:p-12 my-12 border-t-8 border-red-700">

    {{-- Kembali --}}
    <a href="{{ url('artikel') }}" data-aos="fade-right"
       class="inline-flex items-center text-red-700 font-semibold px-4 py-2 rounded-full border-2 border-red-700 hover:bg-red-50 transition duration-300 transform hover:scale-105">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali ke Semua Artikel
    </a>

    {{-- Metadata --}}
    @if(!empty($artikel->kategori) || !empty($artikel->waktu_baca) || !empty($artikel->tanggal_publish))
        <div class="mt-8 mb-4 flex items-center flex-wrap gap-x-3 gap-y-2 text-gray-500 text-sm"
             data-aos="fade-up" data-aos-delay="100">

            @if(!empty($artikel->kategori))
                <span class="font-bold text-red-700">{{ $artikel->kategori }}</span>
            @endif

            @if(!empty($artikel->waktu_baca))
                <span class="hidden sm:inline">|</span>
                <span class="inline-flex items-center">
                    <i class="far fa-clock mr-1"></i> {{ $artikel->waktu_baca }}
                </span>
            @endif

            @if(!empty($artikel->tanggal_publish))
                <span class="hidden sm:inline">|</span>
                <span class="inline-flex items-center">
                    <i class="far fa-calendar-alt mr-1"></i>
                    {{ \Carbon\Carbon::parse($artikel->tanggal_publish)->translatedFormat('d M Y') }}
                </span>
            @endif

        </div>
    @endif

    {{-- Judul (diasumsikan wajib ada) --}}
    <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-8 drop-shadow-sm"
        data-aos="fade-up" data-aos-delay="200">
        {{ $artikel->judul }}
    </h1>

    {{-- Gambar --}}
    @if(!empty($artikel->thumbnail))
        <div class="rounded-2xl overflow-hidden shadow-xl mb-10 border-4 border-gray-100"
             data-aos="zoom-in" data-aos-duration="800">
            <img src="{{ asset('storage/'.$artikel->thumbnail) }}"
                 class="w-full h-auto object-cover transform hover:scale-[1.02] transition duration-500"
                 alt="{{ $artikel->judul }}">
        </div>
    @endif

    {{-- Excerpt / Pengenalan (opsional) --}}
    @if(!empty($artikel->excerpt))
        <p class="text-gray-700 text-center italic mb-12 text-xl border-y-2 border-yellow-400 py-4 font-serif"
           data-aos="fade-up" data-aos-delay="300">
            {{ $artikel->excerpt }}
        </p>
    @endif

    {{-- Isi Artikel --}}
    @if(!empty($artikel->konten))
        <div class="text-gray-800 space-y-10 leading-relaxed prose lg:prose-lg max-w-none"
             data-aos="fade-up" data-aos-delay="350">
            {!! $artikel->konten !!}
        </div>
    @endif

    {{-- Footer/Penutup (opsional – tampil hanya jika ada setidaknya salah satu metadata/konten) --}}
    @if(!empty($artikel->konten) || !empty($artikel->excerpt))
        <div class="mt-16 pt-8 border-t-4 border-yellow-400/50 text-center bg-red-50 p-6 rounded-xl shadow-inner"
             data-aos="fade-up" data-aos-delay="500">
            <p class="font-extrabold text-xl text-red-800">
                Terima kasih sudah membaca 🙏
            </p>
            <p class="font-medium text-gray-700 mt-2">
                Bagikan jika bermanfaat.
            </p>
        </div>
    @endif

</main>

@endsection
