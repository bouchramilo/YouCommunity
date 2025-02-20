<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Événements Créés') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Main Content -->
                    <main class="flex-grow container mx-auto px-4 py-4">
                        <div class="max-w-5xl mx-auto">
                            <!-- Header Section -->
                            {{-- <div class="flex justify-between items-center mb-8"> --}}
                                <a href="/create-event"
                                    class="bg-[var(--primary)] text-white px-6 py-2 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                                    <i class="fas fa-plus mr-2"></i>Créer un événement
                                </a>
                            {{-- </div> --}}

                            <!-- Stats Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                <div class="bg-white p-6 rounded-lg shadow-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600">Total Événements</p>
                                            <h3 class="text-2xl font-bold">12</h3>
                                        </div>
                                        <div class="text-[var(--primary)] text-2xl">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-lg shadow-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600">Total Participants</p>
                                            <h3 class="text-2xl font-bold">487</h3>
                                        </div>
                                        <div class="text-[var(--primary)] text-2xl">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-lg shadow-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600">Événements à venir</p>
                                            <h3 class="text-2xl font-bold">3</h3>
                                        </div>
                                        <div class="text-[var(--primary)] text-2xl">
                                            <i class="fas fa-hourglass-half"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Filter Section -->
                            <div class="flex gap-4 mb-6">
                                <select
                                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    <option value="all">Tous les événements</option>
                                    <option value="upcoming">À venir</option>
                                    <option value="past">Passés</option>
                                    <option value="draft">Brouillons</option>
                                </select>
                                <input type="text" placeholder="Rechercher un événement..."
                                    class="flex-grow px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                            </div>

                            <!-- Events List -->
                            <div class="space-y-6">
                                <!-- Event Card - Active -->
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                    <div class="p-6">
                                        <div class="flex flex-col md:flex-row gap-6">
                                            <div class="md:w-1/4">
                                                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30"
                                                    alt="Festival de Jazz" class="w-full h-48 object-cover rounded-lg">
                                            </div>
                                            <div class="flex-grow">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div>
                                                        <h3 class="text-xl font-semibold">Festival de Jazz</h3>
                                                        <div class="flex flex-wrap gap-4 text-sm text-gray-600 mt-2">
                                                            <span class="flex items-center">
                                                                <i
                                                                    class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                                25 Mars 2024
                                                            </span>
                                                            <span class="flex items-center">
                                                                <i
                                                                    class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                                Paris, France
                                                            </span>
                                                            <span class="flex items-center">
                                                                <i class="fas fa-users mr-2 text-[var(--primary)]"></i>
                                                                45/150 inscrits
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Actif</span>
                                                </div>
                                                <div class="flex flex-wrap gap-3">
                                                    <a href="#"
                                                        class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                        <i class="fas fa-edit mr-1"></i>Modifier
                                                    </a>
                                                    <a href="#"
                                                        class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                        <i class="fas fa-users mr-1"></i>Voir les participants
                                                    </a>
                                                    <a href="#"
                                                        class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                        <i class="fas fa-chart-bar mr-1"></i>Statistiques
                                                    </a>
                                                    <button class="text-red-500 hover:text-red-700 text-sm">
                                                        <i class="fas fa-trash-alt mr-1"></i>Supprimer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Event Card - Draft -->
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden opacity-75">
                                    <div class="p-6">
                                        <div class="flex flex-col md:flex-row gap-6">
                                            <div class="md:w-1/4">
                                                <div
                                                    class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-image text-4xl text-gray-400"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div>
                                                        <h3 class="text-xl font-semibold">Concert Rock - Brouillon</h3>
                                                        <div class="flex flex-wrap gap-4 text-sm text-gray-600 mt-2">
                                                            <span class="flex items-center">
                                                                <i
                                                                    class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                                Non défini
                                                            </span>
                                                            <span class="flex items-center">
                                                                <i
                                                                    class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                                À définir
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm">Brouillon</span>
                                                </div>
                                                <div class="flex flex-wrap gap-3">
                                                    <a href="#"
                                                        class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                        <i class="fas fa-edit mr-1"></i>Continuer l'édition
                                                    </a>
                                                    <button class="text-red-500 hover:text-red-700 text-sm">
                                                        <i class="fas fa-trash-alt mr-1"></i>Supprimer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Event Card - Past -->
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden opacity-75">
                                    <div class="p-6">
                                        <div class="flex flex-col md:flex-row gap-6">
                                            <div class="md:w-1/4">
                                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87"
                                                    alt="Exposition d'Art"
                                                    class="w-full h-48 object-cover rounded-lg filter grayscale">
                                            </div>
                                            <div class="flex-grow">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div>
                                                        <h3 class="text-xl font-semibold">Exposition d'Art</h3>
                                                        <div class="flex flex-wrap gap-4 text-sm text-gray-600 mt-2">
                                                            <span class="flex items-center">
                                                                <i
                                                                    class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                                15 Février 2024
                                                            </span>
                                                            <span class="flex items-center">
                                                                <i
                                                                    class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                                Lyon, France
                                                            </span>
                                                            <span class="flex items-center">
                                                                <i class="fas fa-users mr-2 text-[var(--primary)]"></i>
                                                                120 participants
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm">Terminé</span>
                                                </div>
                                                <div class="flex flex-wrap gap-3">
                                                    <a href="#"
                                                        class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                        <i class="fas fa-chart-bar mr-1"></i>Voir les statistiques
                                                    </a>
                                                    <a href="#"
                                                        class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                        <i class="fas fa-comments mr-1"></i>Voir les avis
                                                    </a>
                                                    <a href="#"
                                                        class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                        <i class="fas fa-copy mr-1"></i>Dupliquer
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-8 flex justify-center">
                                <nav class="flex space-x-2">
                                    <a href="#"
                                        class="px-4 py-2 border rounded-lg hover:bg-[var(--primary)] hover:text-white transition">1</a>
                                    <a href="#"
                                        class="px-4 py-2 border rounded-lg hover:bg-[var(--primary)] hover:text-white transition">2</a>
                                    <span class="px-4 py-2">...</span>
                                    <a href="#"
                                        class="px-4 py-2 border rounded-lg hover:bg-[var(--primary)] hover:text-white transition">5</a>
                                </nav>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
