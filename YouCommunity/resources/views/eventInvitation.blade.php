<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invitations of an event') }}
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
                                    <a href="/detailsEvent/{{ $event->id }}"><img
                                            src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->title }}"
                                            class="w-24 h-24 rounded-lg object-cover"></a>
                                    <div>
                                        <a href="/detailsEvent/{{ $event->id }}">
                                            <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
                                        </a>
                                        <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                            <span class="flex items-center">
                                                <i class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                {{ \Carbon\Carbon::parse($event->dateHeure)->translatedFormat('d F Y') }}

                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                {{ $event->lieu }}
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Participants List -->
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <div class="p-4 bg-gray-50 border-b flex justify-between items-center">
                                    <h2 class="font-semibold">Invitations ({{ $invitations->count() }})</h2>
                                </div>
                                <div class="divide-y">

                                    @foreach ($invitations as $invitation)
                                        <!-- Participant 1 -->
                                        <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                                            <div class="flex items-center gap-4">
                                                <img src="{{ asset('storage/' . $invitation->photo) }}"
                                                    alt="{{ $invitation->name }}" class="w-12 h-12 rounded-full">
                                                <div>
                                                    <h3 class="font-medium">{{ $invitation->name }}</h3>
                                                    <p class="text-sm text-gray-600">{{ $invitation->email }}</p>
                                                </div>
                                            </div>
                                            @if ($event->user_id === Auth::id())
                                                <div class="flex items-center gap-4">
                                                    <form action="{{ route('event.delete.inscriptions', $event->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $invitation->id }}">
                                                        @if ($invitation->pivot->status == 'pending')
                                                            <div
                                                                class="hover:text-[var(--primary)] px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                                                {{ $invitation->pivot->status }}
                                                            </div>
                                                        @elseif($invitation->pivot->status == 'accepted')
                                                            <div
                                                                class="hover:text-[var(--primary)] px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                                                {{ $invitation->pivot->status }}
                                                            </div>
                                                        @elseif($invitation->pivot->status == 'declined')
                                                            <div
                                                                class="hover:text-[var(--primary)] px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">
                                                                {{ $invitation->pivot->status }}
                                                            </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Pagination -->
                                <div class="p-4 border-t">
                                </div>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
