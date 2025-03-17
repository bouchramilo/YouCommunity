<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Invitations') }}
        </h2>
    </x-slot>

    <div class="py-12  min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[500px]">
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

                                {{-- @dd($myinvitations) --}}
                                @foreach ($myinvitations as $invitation)
                                    @if ($invitation->pivot->status === 'pending' || $invitation->pivot->status === 'accepted')
                                        <!-- Upcoming Event -->
                                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                            <div class="flex flex-col md:flex-row">
                                                <div class="md:w-1/4">
                                                    <img src="{{ asset('storage/' . $invitation->photo) }}"
                                                        alt="{{ $invitation->title }}"
                                                        class="w-full h-48 md:h-full object-cover">
                                                </div>
                                                <div class="flex-grow p-6">
                                                    <div class="flex justify-between items-start">
                                                        <div>
                                                            <h3 class="text-xl font-semibold mb-2">
                                                                {{ $invitation->title }}</h3>
                                                            <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-calendar-alt mr-2 text-[var(--primary)]"></i>
                                                                    {{ \Carbon\Carbon::parse($invitation->dateHeure)->translatedFormat('d F Y - H:i') }}
                                                                </span>
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-map-marker-alt mr-2 text-[var(--primary)]"></i>
                                                                    {{ $invitation->lieu }}
                                                                </span>
                                                                <span class="flex items-center">
                                                                    <i
                                                                        class="fas fa-user-friends mr-2 text-[var(--primary)]"></i>
                                                                    {{ $invitation->maxParticipants }}
                                                                    participants
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col items-end gap-2">
                                                            @if ($invitation->pivot->status === 'pending')
                                                                <form
                                                                    action="{{ route('event.invitation.status', $invitation->id) }}"
                                                                    method="post">
                                                                    @method('POST')
                                                                    @csrf
                                                                    <input type="hidden" name="status"
                                                                        value="accepted">
                                                                    <button
                                                                        class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                                                        <i class="fas fa-times mr-1"></i>
                                                                        {{ $invitation->pivot->status }}
                                                                    </button>
                                                                </form>
                                                            @elseif ($invitation->pivot->status === 'accepted')
                                                                <form
                                                                    action="{{ route('event.invitation.status', $invitation->id) }}"
                                                                    method="post">
                                                                    @method('POST')
                                                                    @csrf
                                                                    <input type="hidden" name="status"
                                                                        value="pending">
                                                                    <button
                                                                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                                                        <i class="fas fa-times mr-1"></i>
                                                                        {{ $invitation->pivot->status }}
                                                                    </button>
                                                                </form>
                                                            @endif

                                                            <form
                                                                action="{{ route('event.invitation.status', $invitation->id) }}"
                                                                method="post">
                                                                @method('POST')
                                                                @csrf
                                                                <input type="hidden" name="status"
                                                                    value="declined">
                                                                <button
                                                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                                                    <i class="fas fa-times mr-1"></i>
                                                                    declined
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="{{ route('event.show', $invitation->id) }}"
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
                        {{-- <div class="mt-8 flex justify-center">
                            {{ $myinvitations->links() }}
                        </div> --}}
                    </main>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
