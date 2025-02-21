<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Details of an event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <!-- Main Content -->
                    <main class="flex-grow container mx-auto px-4 py-8">
                        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                            <!-- Image de l'événement -->
                            <div class="relative h-96">
                                <img src="{{ asset('storage/' . $event->photo) }}" alt="Événement"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute top-4 right-4 bg-[var(--primary)] text-white px-4 py-2 rounded-full">
                                    <i
                                        class="fas fa-calendar-alt mr-2"></i>{{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('d F Y') }}

                                </div>
                            </div>

                            <!-- Contenu -->
                            <div class="p-8">
                                <div class="flex justify-between items-start mb-6">
                                    <div>
                                        <h1 class="text-3xl font-bold text-[var(--text)] mb-2">{{ $event->title }}
                                        </h1>
                                        <div class="flex items-center text-gray-600 space-x-4">
                                            <span><i class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                {{ $event->lieu }}</span>
                                            <span><i
                                                    class="fas fa-clock mr-2 text-[var(--primary)]"></i>{{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('H:i') }}
                                            </span>
                                            <span><i
                                                    class="fas fa-users mr-2 text-[var(--primary)]"></i>{{ $event->maxParticipants }}
                                                participants max</span>
                                        </div>
                                    </div>
                                    <button
                                        class="bg-[var(--primary)] text-white px-6 py-3 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                                        S'inscrire
                                    </button>
                                </div>

                                <!-- Description -->
                                <div class="mb-8">
                                    <h2 class="text-xl font-semibold mb-4 text-[var(--text)]">Description</h2>
                                    <p class="text-gray-600 leading-relaxed">
                                        {{ $event->description }}
                                    </p>
                                </div>

                                <!-- Informations complémentaires -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                    <div class="bg-[var(--background)] p-4 rounded-lg">
                                        <h3 class="font-semibold mb-2 text-[var(--text)]">Catégorie</h3>
                                        <p class="text-[var(--primary)]"><i
                                                class="fas fa-tags mr-2"></i>{{ $event->categorie }}</p>
                                    </div>
                                    <div class="bg-[var(--background)] p-4 rounded-lg">
                                        <h3 class="font-semibold mb-2 text-[var(--text)]">Organisateur</h3>
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/' . $event->user->photo) }}" alt="Organisateur"
                                                class="w-10 h-10 rounded-full mr-3">
                                            <span class="text-[var(--text)]">{{ $event->user->name }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Participants -->
                                <div>
                                    <h2 class="text-xl font-semibold mb-4 text-[var(--text)]">Participants (45/150)</h2>
                                    <div class="flex -space-x-2 overflow-hidden">
                                        <img src="https://randomuser.me/api/portraits/women/1.jpg"
                                            class="w-10 h-10 rounded-full border-2 border-white">
                                        <img src="https://randomuser.me/api/portraits/men/1.jpg"
                                            class="w-10 h-10 rounded-full border-2 border-white">
                                        <img src="https://randomuser.me/api/portraits/women/2.jpg"
                                            class="w-10 h-10 rounded-full border-2 border-white">
                                        <img src="https://randomuser.me/api/portraits/men/2.jpg"
                                            class="w-10 h-10 rounded-full border-2 border-white">
                                        <div
                                            class="w-10 h-10 rounded-full border-2 border-white bg-[var(--primary)] flex items-center justify-center text-white text-sm">
                                            +41
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section Commentaires -->
                        <div class="max-w-4xl mx-auto mt-8">
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold mb-6">Commentaires ({{ $comments->count() }})</h2>

                                    <!-- Formulaire d'ajout de commentaire -->
                                    <div class="mb-8">
                                        <div class="flex items-start gap-4">
                                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Votre photo"
                                                class="w-10 h-10 rounded-full">

                                            <div class="flex-grow">
                                                <form action="/detailsEvent/{{ $event->id }}/comment/add"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                    <textarea placeholder="Ajouter un commentaire..." name="contenu"
                                                        class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none resize-none"
                                                        rows="3"></textarea>
                                                    <div class="mt-2 flex justify-end">
                                                        <button
                                                            class="bg-[var(--primary)] text-white px-6 py-2 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                                                            Publier
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Liste des commentaires -->
                                    <div class="space-y-6">
                                        <!-- Commentaire 1 -->
                                        {{-- <div class="flex gap-4">
                                            <img src="https://randomuser.me/api/portraits/women/2.jpg"
                                                alt="Sophie Martin" class="w-10 h-10 rounded-full">
                                            <div class="flex-grow">
                                                <div class="bg-[var(--background)] rounded-lg p-4">
                                                    <div class="flex justify-between items-start mb-2">
                                                        <div>
                                                            <h4 class="font-semibold">Sophie Martin</h4>
                                                            <span class="text-sm text-gray-600">Il y a 2 heures</span>
                                                        </div>
                                                        <button class="text-gray-400 hover:text-[var(--primary)]">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                    </div>
                                                    <p class="text-gray-700">Super événement ! J'ai hâte d'y être.
                                                        Est-ce qu'il y aura un parking à proximité ?</p>
                                                    <div class="mt-3 flex items-center gap-4 text-sm">
                                                        <button
                                                            class="flex items-center gap-1 text-gray-600 hover:text-[var(--primary)]">
                                                            <i class="far fa-heart"></i>
                                                            <span>12</span>
                                                        </button>
                                                        <button class="text-gray-600 hover:text-[var(--primary)]">
                                                            Répondre
                                                        </button>
                                                    </div>

                                                    <!-- Réponses -->
                                                    <div class="mt-4 ml-6 space-y-4">
                                                        <div class="flex gap-4">
                                                            <img src="https://randomuser.me/api/portraits/men/3.jpg"
                                                                alt="Organisateur" class="w-8 h-8 rounded-full">
                                                            <div class="flex-grow">
                                                                <div class="bg-white rounded-lg p-3 shadow-sm">
                                                                    <div class="flex justify-between items-start mb-2">
                                                                        <div>
                                                                            <h4 class="font-semibold">Jean Dupont</h4>
                                                                            <span class="text-sm text-gray-600">Il y a 1
                                                                                heure</span>
                                                                        </div>
                                                                    </div>
                                                                    <p class="text-gray-700">Oui, il y a un grand
                                                                        parking gratuit juste à côté de la salle !</p>
                                                                    <div class="mt-2 flex items-center gap-4 text-sm">
                                                                        <button
                                                                            class="flex items-center gap-1 text-gray-600 hover:text-[var(--primary)]">
                                                                            <i class="far fa-heart"></i>
                                                                            <span>5</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        @foreach ($comments as $comment)
                                            <!-- Commentaire 2 -->
                                            <div class="flex gap-4">
                                                <img src="{{ asset('storage/' . $comment->user->photo) }}"
                                                    alt="Pierre Dubois" class="w-10 h-10 rounded-full">
                                                <div class="flex-grow">
                                                    <div class="bg-[var(--background)] rounded-lg p-4">
                                                        <div class="flex justify-between items-start mb-2">
                                                            <div>
                                                                <h4 class="font-semibold">{{ $comment->user->name }}
                                                                </h4>
                                                                <span
                                                                    class="text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}
                                                                </span>
                                                            </div>
                                                            <button class="text-gray-400 hover:text-[var(--primary)]">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                        </div>
                                                        <p class="text-gray-700">{{ $comment->contenu }}</p>
                                                        <div class="mt-3 flex items-center gap-4 text-sm">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Pagination des commentaires -->
                                    <div class="mt-8 flex justify-center">
                                        {{  $comments->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
