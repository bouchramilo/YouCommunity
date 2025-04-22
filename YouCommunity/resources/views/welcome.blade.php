<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <style>
        :root {
            --text: #001709;
            --background: #f5faf7;
            --primary: #ffae57;
            --secondary: #92b5c8;
            --accent: #3e4bfd;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 min-h-screen">

    <!-- Navigation -->
    <nav class="bg-[var(--background)] shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-[var(--text)]"><span class="text-[var(--primary)]">Y</span>ou<span class="text-[var(--primary)]">C</span>ommunity</a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white bg-[var(--primary)] text-[var(--text)] px-4 py-2 rounded-lg hover:bg-[var(--accent)] mx-1">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white bg-[var(--primary)] text-[var(--text)] px-4 py-2 rounded-lg hover:bg-[var(--accent)] mx-1">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative h-screen bg-cover bg-center bg-no-repeat"
        style="background-image: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=2070&auto=format&fit=crop');">
        <!-- Overlay sombre avec la couleur primaire -->
        <div class="absolute inset-0"></div>

        <div class="relative max-w-7xl mx-auto px-4 py-16 z-10">
            <div class="text-center text-[var(--text)]">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-[var(--background)] ">Découvrez <span
                        class="text-[var(--primary)]">des événements</span> près de chez vous</h1>
                <p class="text-xl mb-8 text-[var(--secondary)]">Rejoignez une communauté dynamique et participez à des
                    événements locaux passionnants</p>
                <div class="max-w-xl mx-auto">
                    <a href="#"
                        class="bg-[var(--primary)] text-[var(--text)] border-2 border-[var(--background)] px-8 py-3 rounded-lg hover:bg-[var(--background)] hover:text-[var(--primary)] transition duration-300 inline-block">
                        Commencer l'aventure
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
                <path fill="var(--background)" fill-opacity="1"
                    d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>

    <!-- About Us Section -->
    <div id="about" class="py-14 bg-[var(--background)]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[var(--text)]">À propos de nous</h2>
                <div class="w-24 h-1 bg-[var(--primary)] mx-auto mb-8"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[var(--background)] border border-[var(--primary)] p-8 rounded-lg shadow-lg">
                    <div class="text-[var(--primary)] text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-[var(--text)]">Communauté Dynamique</h3>
                    <p class="text-[var(--text)] opacity-75">Rejoignez une communauté passionnée et participez à des
                        événements qui vous ressemblent.</p>
                </div>
                <div class="bg-[var(--background)] border border-[var(--primary)] p-8 rounded-lg shadow-lg">
                    <div class="text-[var(--primary)] text-4xl mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-[var(--text)]">Événements Locaux</h3>
                    <p class="text-[var(--text)] opacity-75">Découvrez des événements près de chez vous et rencontrez
                        des personnes partageant vos intérêts.</p>
                </div>
                <div class="bg-[var(--background)] border border-[var(--primary)] p-8 rounded-lg shadow-lg">
                    <div class="text-[var(--primary)] text-4xl mb-4">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-[var(--text)]">Organisation Simplifiée</h3>
                    <p class="text-[var(--text)] opacity-75">Créez et gérez vos événements facilement grâce à notre
                        plateforme intuitive.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow-md mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left mb-4 md:mb-0">
                    <p class="text-sm text-gray-600">
                        © 2024 YouCommunity. Tous droits réservés.
                    </p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-600 hover:text-[var(--primary)]">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-[var(--primary)]">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-[var(--primary)]">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
