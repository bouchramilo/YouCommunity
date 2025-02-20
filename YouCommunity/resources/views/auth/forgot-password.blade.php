<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-[var(--text)]">Connexion</h1>
        <p class="text-sm text-gray-600 mt-2">Bienvenue sur YouCommunity</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-[var(--text)] mb-2" />

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <x-text-input type="email" id="email" name="email" :value="old('email')" required autofocus
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                    placeholder="exemple@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button
                class="w-full bg-[var(--primary)] text-white flex justify-center h-10 py-2 px-4 rounded-lg hover:bg-[var(--accent)] transition duration-300">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>

        
    </form>
</x-guest-layout>
