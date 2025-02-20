<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Inscriptions') }}
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
                            <div class="flex justify-end items-center mb-8">
                                {{-- <h1 class="text-3xl font-bold">Mes Inscriptions</h1> --}}
                                <div class="flex gap-4">
                                    <select
                                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                        <option value="all">Tous</option>
                                        <option value="upcoming">À venir</option>
                                        <option value="past">Passés</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Events List -->
                            <div class="space-y-6">
                                <!-- Upcoming Event -->
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                    <div class="flex flex-col md:flex-row">
                                        <div class="md:w-1/4">
                                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30"
                                                alt="Concert" class="w-full h-48 md:h-full object-cover">
                                        </div>
                                        <div class="flex-grow p-6">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h3 class="text-xl font-semibold mb-2">Festival de Jazz</h3>
                                                    <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                                        <span class="flex items-center">
                                                            <i
                                                                class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                            25 Mars 2024 - 19:00
                                                        </span>
                                                        <span class="flex items-center">
                                                            <i
                                                                class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                            Paris, France
                                                        </span>
                                                        <span class="flex items-center">
                                                            <i
                                                                class="fas fa-user-friends mr-2 text-[var(--primary)]"></i>
                                                            45/150 participants
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-end gap-2">
                                                    <span
                                                        class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">À
                                                        venir</span>
                                                    <button class="text-red-500 hover:text-red-700 text-sm">
                                                        <i class="fas fa-times mr-1"></i>Annuler l'inscription
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#"
                                                    class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                    Voir les détails <i class="fas fa-arrow-right ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Past Event -->
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden opacity-75">
                                    <div class="flex flex-col md:flex-row">
                                        <div class="md:w-1/4">
                                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87"
                                                alt="Exposition"
                                                class="w-full h-48 md:h-full object-cover filter grayscale">
                                        </div>
                                        <div class="flex-grow p-6">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h3 class="text-xl font-semibold mb-2">Exposition d'Art Moderne</h3>
                                                    <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                                        <span class="flex items-center">
                                                            <i
                                                                class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                            15 Février 2024 - 14:00
                                                        </span>
                                                        <span class="flex items-center">
                                                            <i
                                                                class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                            Lyon, France
                                                        </span>
                                                        <span class="flex items-center">
                                                            <i
                                                                class="fas fa-user-friends mr-2 text-[var(--primary)]"></i>
                                                            120/150 participants
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-end gap-2">
                                                    <span
                                                        class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm">Passé</span>
                                                    <button
                                                        class="text-[var(--primary)] hover:text-[var(--accent)] text-sm">
                                                        <i class="fas fa-star mr-1"></i>Donner un avis
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#"
                                                    class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                    Voir les détails <i class="fas fa-arrow-right ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add more events here... -->
                            </div>

                            <!-- Empty State -->
                            <div class="hidden text-center py-12">
                                <i class="fas fa-calendar-times text-4xl text-gray-400 mb-4"></i>
                                <h3 class="text-xl font-semibold mb-2">Aucune inscription</h3>
                                <p class="text-gray-600 mb-4">Vous n'êtes inscrit à aucun événement pour le moment.</p>
                                <a href="#"
                                    class="bg-[var(--primary)] text-white px-6 py-2 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                                    Découvrir les événements
                                </a>
                            </div>
                        </div>
                    </main>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
