<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <main class="flex-grow container mx-auto px-4 py-8">
                        <!-- Search and Filter Section -->
                        {{-- <div class="mb-8">
                            <h1 class="text-3xl font-bold mb-6">Découvrez tous les événements</h1>

                            <!-- Search Bar -->
                            <div class="flex gap-4 mb-6">
                                <div class="flex-grow relative">
                                    <input type="text" placeholder="Rechercher un événement..."
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    <i
                                        class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <button
                                    class="bg-[var(--primary)] text-white px-6 py-2 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                                    Rechercher
                                </button>
                            </div>

                            <!-- Filters -->
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <!-- Status Filter -->
                                <select
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    <option value="">Status</option>
                                    <option value="upcoming">À venir</option>
                                    <option value="past">Passés</option>
                                </select>

                                <!-- Category Filter -->
                                <select
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    <option value="">Catégorie</option>
                                    <option value="music">Musique</option>
                                    <option value="sport">Sport</option>
                                    <option value="culture">Culture</option>
                                    <option value="food">Gastronomie</option>
                                </select>

                                <!-- Date Filter -->
                                <input type="date"
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">

                                <!-- Location Filter -->
                                <select
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    <option value="">Lieu</option>
                                    <option value="paris">Paris</option>
                                    <option value="lyon">Lyon</option>
                                    <option value="marseille">Marseille</option>
                                </select>
                            </div>
                        </div> --}}

                        <!-- Events Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($events as $event)
                                @if ($event->status === 'A venir')
                                    <!-- Event Card 1 - Upcoming -->
                                    <a href="/detailsEvent/{{ $event->id }}" class="group">
                                        <div
                                            class="bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105">
                                            <div class="relative">
                                                <img src="{{ asset('storage/' . $event->photo) }}" alt="Concert"
                                                    class="w-full h-48 object-cover">
                                                <div
                                                    class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm">
                                                    À venir
                                                </div>
                                            </div>
                                            <div class="p-4">
                                                <h3
                                                    class="text-lg font-semibold mb-2 group-hover:text-[var(--primary)]">
                                                    {{ $event->title }}</h3>
                                                <div class="flex items-center text-gray-600 text-sm mb-2">
                                                    <i class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                    {{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('d F Y  H:i') }}
                                                </div>
                                                <div class="flex items-center text-gray-600 text-sm">
                                                    <i class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                    {{ $event->lieu }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif($event->status === 'Passé')
                                    <!-- Event Card 2 - Past -->
                                    <a href="/detailsEvent/{{ $event->id }}" class="group">
                                        <div
                                            class="bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105">
                                            <div class="relative">
                                                <img src="{{ asset('storage/' . $event->photo) }}" alt="Exposition"
                                                    class="w-full h-48 object-cover filter grayscale">
                                                <div
                                                    class="absolute top-4 right-4 bg-gray-500 text-white px-3 py-1 rounded-full text-sm">
                                                    Passé
                                                </div>
                                            </div>
                                            <div class="p-4">
                                                <h3
                                                    class="text-lg font-semibold mb-2 group-hover:text-[var(--primary)]">
                                                    {{ $event->title }}</h3>
                                                <div class="flex items-center text-gray-600 text-sm mb-2">
                                                    <i class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                    {{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('d F Y  H:i') }}
                                                </div>
                                                <div class="flex items-center text-gray-600 text-sm">
                                                    <i class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                    {{ $event->lieu }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach

                            <!-- Add more event cards here... -->
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8 flex justify-center">
                            {{ $events->links() }}
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
