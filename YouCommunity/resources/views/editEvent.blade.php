<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier un événement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Main Content -->
                    <main class="flex-grow flex items-center justify-center px-4 py-12">
                        <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full">
                            <div class="text-center mb-8">
                                <h1 class="text-2xl font-bold text-[var(--text)]">Modifier l'événement</h1>
                                <p class="text-sm text-gray-600 mt-2">{{ $event->title }}</p>
                            </div>

                            <form class="space-y-6" method="POST" action="{{ route('event.update', $event->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!-- Image actuelle et upload -->
                                <div>
                                    <label class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Image de l'événement
                                    </label>
                                    <div class="flex items-center gap-4">
                                        <div class="relative w-32 h-32">
                                            <img src="{{ asset('storage/' . $event->photo) }}" alt="Image actuelle"
                                                class="w-full h-full object-cover rounded-lg">
                                            <button type="button"
                                                class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>

                                        <div class="flex-grow">
                                            <div class="flex justify-center items-center w-full">
                                                <label
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <i
                                                            class="fas fa-cloud-upload-alt text-2xl text-gray-500 mb-2"></i>
                                                        <p class="text-sm">Cliquez ou glissez une nouvelle
                                                            image</p>
                                                    </div>
                                                    <input type="file" name="photo" class="hidden"
                                                        accept="image/*">
                                                </label>
                                            </div>
                                        </div>
                                        @error('photo')
                                            <div>
                                                <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Titre -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Titre de l'événement
                                    </label>
                                    <input type="text" id="title" name="title" value="{{ $event->title }}"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                </div>
                                @error('title')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Description
                                    </label>
                                    <textarea id="description" name="description" rows="4"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none resize-none">{{ $event->description }}</textarea>
                                </div>
                                @error('description')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Date et Heure -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="date" class="block text-sm font-medium text-[var(--text)] mb-2">
                                            Date
                                        </label>
                                        <input type="date" id="date" name="dateHeure"
                                            value="{{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('Y-m-d') }}"
                                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    </div>
                                    {{-- <div>
                                        <label for="time" class="block text-sm font-medium text-[var(--text)] mb-2">
                                            Heure
                                        </label>
                                        <input type="time" id="time" name="time"
                                            value="{{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('H:i') }}"
                                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    </div> --}}
                                </div>
                                @error('dateHeure')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Lieu -->
                                <div>
                                    <label for="location" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Lieu
                                    </label>
                                    <input type="text" id="location" name="lieu" value="{{ $event->lieu }}"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                </div>
                                @error('lieu')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Catégorie -->
                                <div>
                                    <label for="category" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Catégorie
                                    </label>
                                    <select id="category" name="categorie"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                        <option value="">Sélectionnez une catégorie</option>
                                        <option value="music">Musique</option>
                                        <option value="sport">Sport</option>
                                        <option value="culture">Culture</option>
                                        <option value="food">Gastronomie</option>
                                        <option value="tech">Technologie</option>
                                        <option value="business">Business</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>
                                @error('categorie')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Nombre max de participants -->
                                <div>
                                    <label for="maxParticipants"
                                        class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Nombre maximum de participants
                                    </label>
                                    <input type="number" id="maxParticipants" name="maxParticipants"
                                        value="{{ $event->maxParticipants }}"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                </div>
                                @error('maParticipants')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Statut -->
                                {{-- <div>
                                    <label for="status" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Statut de l'événement
                                    </label>
                                    <select id="status" name="status"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                        <option value="A venir">A venir</option>
                                        <option value="Passé">Passé</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror --}}

                                <!-- Boutons d'action -->
                                <div class="flex gap-4 pt-4">
                                    <button type="submit"
                                        class="flex-grow bg-[var(--primary)] text-white py-2 px-4 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                                        Enregistrer les modifications
                                    </button>
                                    <a href="#"
                                        class="py-2 px-4 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                                        Annuler
                                    </a>
                                </div>
                            </form>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
