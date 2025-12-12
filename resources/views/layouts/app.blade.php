<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ngolab' }} - Rasa Oriental Autentik</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-primary': '#FFB703',
                        'brand-secondary': '#FF5733',
                        'brand-bg': '#F8F8F8',
                        'brand-dark': '#1A1A1A',
                        'navbar-light': '#FFFBEB',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-brand-bg font-sans">

<header class="bg-navbar-light/95 backdrop-blur-sm shadow sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">

            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <span class="text-3xl">🍜</span>
                <span class="text-2xl font-extrabold text-brand-dark">Ngolab</span>
            </a>

            {{-- MENU DESKTOP --}}
            <div class="hidden md:flex gap-8 text-lg font-medium">
                <a href="{{ url('/') }}"
                   class="{{ request()->is('/') ? 'text-brand-primary font-bold' : 'text-gray-700' }}">
                    Beranda
                </a>

                <a href="{{ url('/menu') }}"
                   class="{{ request()->is('menu*') ? 'text-brand-primary font-bold' : 'text-gray-700' }}">
                    Menu
                </a>

                <a href="{{ url('/artikel') }}"
                   class="{{ request()->is('artikel*') ? 'text-brand-primary font-bold' : 'text-gray-700' }}">
                    Artikel
                </a>

                <a href="{{ url('/tentang-kami') }}"
                   class="{{ request()->is('tentang-kami') ? 'text-brand-primary font-bold' : 'text-gray-700' }}">
                    Tentang Kami
                </a>
            </div>

            {{-- CTA --}}
            <a href="https://wa.me/6285895294530"
               class="hidden md:inline-block bg-brand-primary px-5 py-2 rounded-full font-bold">
                Pesan
            </a>

        </div>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer class="bg-brand-dark text-white py-10 mt-20 text-center">
    <p class="text-sm text-gray-400">
        © 2025 <span class="text-brand-primary font-bold">Ngolab</span>
    </p>
</footer>

</body>
</html>
