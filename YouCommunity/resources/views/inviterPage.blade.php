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
                                    <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->title }}"
                                        class="w-24 h-24 rounded-lg object-cover">
                                    <div>
                                        <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
                                        <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                            <span class="flex items-center">
                                                <i class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                {{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('d F Y') }}

                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                {{ $event->lieu }}
                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-users mr-2 text-[var(--primary)]"></i>
                                                {{ $users->count() }}/{{ $event->maxParticipants }} participants
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
                                    <h2 class="font-semibold">Participants ({{ $users->count() }})</h2>
                                </div>

                                <div class="divide-y">
                                    @foreach ($users as $user)
                                        <!-- Participant 1 -->
                                        <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                                            <div class="flex items-center gap-4">
                                                <img src="{{ asset('storage/' . $user->photo) }}"
                                                    alt="{{ $user->name }}" class="w-12 h-12 rounded-full">
                                                <div>
                                                    <h3 class="font-medium">{{ $user->name }}</h3>
                                                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                            @if ($event->user_id === Auth::id())
                                                <div class="flex items-center gap-4">
                                                    <form action="{{ route('event.inviter', $event->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $user->id }}">
                                                        <button
                                                            class="hover:text-[var(--primary)] px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                                            inviter
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                    <!-- Add more participants here... -->
                                </div>

                                <!-- Pagination -->
                                <div class="p-4 border-t">
                                    {{-- {{ $users->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
