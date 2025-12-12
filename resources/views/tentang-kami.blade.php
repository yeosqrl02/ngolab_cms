@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="py-16 px-6 max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        <!-- Text -->
        <div data-aos="fade-right">
            <h2 class="text-4xl font-bold mb-4 leading-tight">
                Ngolab<br>
                <span class="text-orange-500">About Wellnesssty</span>
            </h2>

            <p class="text-lg text-gray-700 mb-6">
                Ngolab adalah startup kuliner yang menggabungkan cita rasa autentik dengan semangat kolaborasi.
                Kami menghadirkan menu bakso, mie yamin, dan minuman segar yang terjangkau namun tetap berkualitas,
                serta mendukung UMKM kuliner untuk bertumbuh bersama.
            </p>

            <a href="https://www.youtube.com/watch?v=xfM4X6inBUk" target="_blank"
               class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full shadow-lg font-semibold transition">
                <i class="fas fa-play mr-2"></i> Watch the Video
            </a>
        </div>

        <!-- Image -->
        <div data-aos="fade-left" class="overflow-hidden rounded-2xl shadow-lg">
            <img src="{{ asset('img/kolablama.jpeg') }}"
                 class="w-full h-80 object-cover"
                 onerror="this.src='https://placehold.co/600x320/f97316/white?text=Outlet+Image'">
        </div>

    </div>
</section>


<!-- VISI & MISI -->
<section class="py-16 px-6 bg-gray-50">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">

        <!-- Image -->
        <div data-aos="fade-right" class="overflow-hidden rounded-2xl shadow-lg">
            <img src="{{ asset('img/mieyamin.jpg') }}"
                 class="w-full h-96 object-cover"
                 onerror="this.src='https://placehold.co/600x384/f97316/white?text=Visi+Misi'">
        </div>

        <!-- Content -->
        <div data-aos="fade-left" class="bg-white p-8 rounded-2xl shadow-lg">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">Visi</h3>
            <p class="text-gray-700 mb-6">
                Menjadi pusat kuliner kolaboratif yang menghadirkan inovasi rasa dan mendukung pertumbuhan UMKM
                lokal di Indonesia.
            </p>

            <h3 class="text-3xl font-bold text-gray-800 mb-4">Misi</h3>
            <p class="text-gray-700">
                Membuka ruang kolaborasi, menyediakan menu terbaik dengan harga terjangkau, serta menghadirkan
                pengalaman kuliner yang nyaman, modern, dan berkualitas bagi pelanggan.
            </p>
        </div>

    </div>
</section>


<!-- OPERASIONAL -->
<section class="py-16 px-6 bg-gray-50">

    <div class="max-w-4xl mx-auto text-center bg-white p-10 rounded-2xl shadow-lg" data-aos="zoom-in">

        <h3 class="text-3xl font-bold mb-4">Operasional</h3>

        <p class="text-gray-700 mb-4">
            Ngolab Express Cafe siap melayani Anda setiap hari sebagai ruang kuliner kolaboratif yang nyaman dan inspiratif.
        </p>

        <p class="text-xl font-semibold text-orange-600">Setiap Hari: 10.00 - 22.00</p>

        <div class="flex flex-wrap justify-center gap-4 mt-8">

            <a href="https://www.instagram.com/ngolabcafe" target="_blank"
               class="inline-block bg-orange-100 text-orange-600 hover:bg-orange-200 px-6 py-3 rounded-full font-semibold transition">
                <i class="fab fa-instagram mr-2"></i>
                Lihat Instagram
            </a>

            <a href="https://wa.me/6285895294530?text=Halo%2C%20saya%20mau%20pesan%20Paket%20Rapat"
               class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full shadow-lg font-semibold transition">
                <i class="fab fa-whatsapp mr-2"></i>
                Pesan Paket Rapat
            </a>

        </div>
    </div>

    <!-- Gallery -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-6xl mx-auto px-6">

        <div data-aos="fade-up" class="overflow-hidden rounded-2xl shadow-lg">
            <img src="{{ asset('img/logo.png') }}" class="w-full h-64 object-cover"
                 onerror="this.src='https://placehold.co/400x256/f97316/white?text=Tim+Ngolab'">
        </div>

        <div data-aos="fade-up" data-aos-delay="100" class="overflow-hidden rounded-2xl shadow-lg">
            <img src="{{ asset('img/kolablama.jpeg') }}" class="w-full h-64 object-cover"
                 onerror="this.src='https://placehold.co/400x256/f97316/white?text=Kolaborasi'">
        </div>

        <div data-aos="fade-up" data-aos-delay="200" class="overflow-hidden rounded-2xl shadow-lg">
            <img src="{{ asset('img/fototeam.jpg') }}" class="w-full h-64 object-cover"
                 onerror="this.src='https://placehold.co/400x256/f97316/white?text=Komunitas'">
        </div>

    </div>

</section>


<!-- LOKASI -->
<section class="py-10 max-w-4xl mx-auto px-6">

    <h2 class="text-center text-3xl font-bold mb-6">Lokasi Kami</h2>

    <p class="text-center text-gray-700 mb-6">
        Gedung Selaru, Telkom University  
        Jl. Telekomunikasi No.1, Sukapura, Bandung, Jawa Barat 40257
    </p>

    <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-lg border-4 border-white">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7920.6183441818785!2d107.6315265!3d-6.9728038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e91a93784ddd%3A0x624acd474a796743!2sNgolab%20Express%20Cafe!5e0!3m2!1sid!2sid!4v1754381506341!5m2!1sid!2sid"
            class="w-full h-full"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

</section>

@endsection
