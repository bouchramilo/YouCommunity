<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registration of participants in an event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <!-- Main Content -->
                    <main class="flex-grow container mx-auto px-4 py-8">
                        <div class="max-w-4xl mx-auto">
                            <!-- Event Info -->
                            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                                <div class="flex items-center gap-6">
                                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30"
                                        alt="Festival de Jazz" class="w-24 h-24 rounded-lg object-cover">
                                    <div>
                                        <h1 class="text-2xl font-bold mb-2">Festival de Jazz</h1>
                                        <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                            <span class="flex items-center">
                                                <i class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                25 Mars 2024
                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                Paris, France
                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-users mr-2 text-[var(--primary)]"></i>
                                                45/150 participants
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Search and Filter -->
                            <div class="mb-8">
                                <div class="flex gap-4">
                                    <div class="flex-grow relative">
                                        <input type="text" placeholder="Rechercher un participant..."
                                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                        <i
                                            class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    </div>
                                    <select
                                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none">
                                        <option value="all">Tous</option>
                                        <option value="confirmed">Confirmés</option>
                                        <option value="pending">En attente</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Participants List -->
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <div class="p-4 bg-gray-50 border-b flex justify-between items-center">
                                    <h2 class="font-semibold">Participants (45)</h2>
                                    <button class="text-sm text-[var(--accent)] hover:text-[var(--primary)]">
                                        <i class="fas fa-download mr-1"></i>Exporter
                                    </button>
                                </div>

                                <div class="divide-y">
                                    <!-- Participant 1 -->
                                    <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                                        <div class="flex items-center gap-4">
                                            <img src="https://randomuser.me/api/portraits/women/1.jpg"
                                                alt="Marie Dupont" class="w-12 h-12 rounded-full">
                                            <div>
                                                <h3 class="font-medium">Marie Dupont</h3>
                                                <p class="text-sm text-gray-600">marie.dupont@email.com</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Confirmé</span>
                                            <button class="text-gray-400 hover:text-[var(--primary)]">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Participant 2 -->
                                    <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                                        <div class="flex items-center gap-4">
                                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Jean Martin"
                                                class="w-12 h-12 rounded-full">
                                            <div>
                                                <h3 class="font-medium">Jean Martin</h3>
                                                <p class="text-sm text-gray-600">jean.martin@email.com</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <span
                                                class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">En
                                                attente</span>
                                            <button class="text-gray-400 hover:text-[var(--primary)]">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Add more participants here... -->
                                </div>

                                <!-- Pagination -->
                                <div class="p-4 border-t">
                                    <div class="flex items-center justify-between">
                                        <button class="text-sm text-gray-600 hover:text-[var(--primary)]">
                                            <i class="fas fa-chevron-left mr-1"></i>Précédent
                                        </button>
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 bg-[var(--primary)] text-white rounded">1</span>
                                            <span class="px-3 py-1 hover:bg-gray-100 rounded cursor-pointer">2</span>
                                            <span class="px-3 py-1 hover:bg-gray-100 rounded cursor-pointer">3</span>
                                            <span>...</span>
                                            <span class="px-3 py-1 hover:bg-gray-100 rounded cursor-pointer">8</span>
                                        </div>
                                        <button class="text-sm text-gray-600 hover:text-[var(--primary)]">
                                            Suivant<i class="fas fa-chevron-right ml-1"></i>
                                        </button>
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
