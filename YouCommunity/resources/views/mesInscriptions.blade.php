<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Inscriptions') }}
        </h2>
    </x-slot>

    <div class="py-12  min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">




                    <!-- Main Content -->
                    <main class="flex-grow container mx-auto px-4 py-4">
                        <div class="max-w-5xl mx-auto">
                            <!-- Header Section -->
                            {{-- <div class="flex justify-end items-center mb-8">
                                <div class="flex gap-4">
                                    <select
                                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                        <option value="all">Tous</option>
                                        <option value="upcoming">À venir</option>
                                        <option value="past">Passés</option>
                                    </select>
                                </div>
                            </div> --}}
                            <!-- Events List -->
                            <div class="space-y-6">

                                @foreach ($myinscriptions as $inscription)
                                    @if ($inscription->event->status === 'A venir')
                                        <!-- Upcoming Event -->
                                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                            <div class="flex flex-col md:flex-row">
                                                <div class="md:w-1/4">
                                                    <img src="{{ asset('storage/' . $inscription->event->photo) }}"
                                                        alt="{{ $inscription->event->title }}"
                                                        class="w-full h-48 md:h-full object-cover">
                                                </div>
                                                <div class="flex-grow p-6">
                                                    <div class="flex justify-between items-start">
                                                        <div>
                                                            <h3 class="text-xl font-semibold mb-2">
                                                                {{ $inscription->event->title }}</h3>
                                                            <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                                    {{ \Carbon\Carbon::parse($inscription->event->dateHeure)->translatedFormat('d F Y - H:i') }}
                                                                </span>
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                                    {{ $inscription->event->lieu }}
                                                                </span>
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-user-friends mr-2 text-[var(--primary)]"></i>
                                                                    45/{{ $inscription->event->maxParticipants }}
                                                                    participants
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col items-end gap-2">
                                                            <span
                                                                class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">À
                                                                venir</span>
                                                            <form
                                                                action="{{ route('event.delete.inscriptions', $inscription->event->id) }}"
                                                                method="post">
                                                                @method('POST')
                                                                @csrf
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::id() }}">
                                                                <button class="text-red-500 hover:text-red-700 text-sm">
                                                                    <i class="fas fa-times mr-1"></i>
                                                                    Annuler l'inscription
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="{{ route('event.show', $inscription->event->id) }}"
                                                            class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                            Voir les détails <i class="fas fa-arrow-right ml-1"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($inscription->event->status === 'Passé')
                                        <!-- Past Event -->
                                        <div class="bg-white rounded-lg shadow-lg overflow-hidden opacity-75">
                                            <div class="flex flex-col md:flex-row">
                                                <div class="md:w-1/4">
                                                    <img src="{{ asset('storage/' . $inscription->event->photo) }}"
                                                        alt="{{ $inscription->event->title }}"
                                                        class="w-full h-48 md:h-full object-cover filter grayscale">
                                                </div>
                                                <div class="flex-grow p-6">
                                                    <div class="flex justify-between items-start">
                                                        <div>
                                                            <h3 class="text-xl font-semibold mb-2">
                                                                {{ $inscription->event->title }}
                                                            </h3>
                                                            <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                                    {{ \Carbon\Carbon::parse($inscription->event->dateHeure)->translatedFormat('d F Y - H:i') }}
                                                                </span>
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                                    {{ $inscription->event->lieu }}
                                                                </span>
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-user-friends mr-2 text-[var(--primary)]"></i>
                                                                    120/{{ $inscription->event->maxParticipants }}
                                                                    participants
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col items-end gap-2">
                                                            <span
                                                                class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm">Passé</span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="{{ route('event.show', $inscription->event->id) }}"
                                                            class="text-[var(--accent)] hover:text-[var(--primary)] text-sm">
                                                            Voir les détails <i class="fas fa-arrow-right ml-1"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- Add more events here... -->
                            </div>

                        </div>
                        <!-- Pagination -->
                        <div class="mt-8 flex justify-center">
                            {{ $myinscriptions->links() }}
                        </div>
                    </main>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
