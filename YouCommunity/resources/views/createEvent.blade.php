<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer un événement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Main Content -->
                    <main class="flex-grow flex items-center justify-center px-4 py-4">
                        <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full">
                            <div class="text-center mb-8">
                                <p class="text-sm text-gray-600 mt-2">Partagez votre événement avec la communauté</p>
                            </div>

                            <form action="{{ route('event.create') }}" method="POST" class="space-y-6"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Titre -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Titre de l'événement
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-heading text-gray-400"></i>
                                        </div>
                                        <input type="text" id="title" name="title"
                                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                                            placeholder="Ex: Concert de Jazz au Parc">
                                    </div>
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
                                        class="block w-full p-3 border resize-none border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                                        placeholder="Décrivez votre événement..."></textarea>
                                </div>

                                @error('description')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Date et Heure -->
                                <div>
                                    <label for="event_date" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Date et heure de l'événement
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-calendar text-gray-400"></i>
                                        </div>
                                        <input type="datetime-local" id="event_date" name="dateHeure"
                                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                    </div>
                                </div>

                                @error('dateHeure')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Max Participants -->
                                <div>
                                    <label for="max_participants"
                                        class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Nombre maximum de participants
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-users text-gray-400"></i>
                                        </div>
                                        <input type="number" id="max_participants" name="maxParticipants"
                                            min="1"
                                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                                            placeholder="Ex: 50">
                                    </div>
                                </div>

                                @error('maxParticipants')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Lieu -->
                                <div>
                                    <label for="location" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Lieu
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                                        </div>
                                        <input type="text" id="location" name="lieu"
                                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                                            placeholder="Ex: 123 rue de Paris, 75001 Paris">
                                    </div>
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
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-tag text-gray-400"></i>
                                        </div>
                                        <select id="category" name="categorie"
                                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
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
                                </div>

                                @error('categorie')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <!-- Photo Upload -->
                                <div>
                                    <label for="event_photo" class="block text-sm font-medium text-[var(--text)] mb-2">
                                        Photo de l'événement
                                    </label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                        <div class="space-y-1 text-center">
                                            <div id="preview" class="mb-4 hidden">
                                                <img src="" alt="Preview" class="mx-auto h-32 w-auto">
                                            </div>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-[var(--accent)] hover:text-[var(--primary)]">
                                                    <span>Télécharger un fichier</span>
                                                    <input id="file-upload" name="photo" type="file"
                                                        class="sr-only" accept="image/*">
                                                </label>
                                                <p class="pl-1">ou glisser-déposer</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                                        </div>
                                    </div>
                                </div>

                                @error('photo')
                                    <div>
                                        <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                                    </div>
                                @enderror

                                <button type="submit"
                                    class="w-full bg-[var(--primary)] text-white py-2 px-4 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                                    Créer l'événement
                                </button>
                            </form>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
    <script>
        const fileUpload = document.getElementById('file-upload');
        const preview = document.getElementById('preview');
        const previewImg = preview.querySelector('img');

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
