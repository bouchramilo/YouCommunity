<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-[var(--text)]">{{ __('Connexion') }}</h1>
        <p class="text-sm text-gray-600 mt-2">{{ __('Bienvenue sur YouCommunity') }}</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Input -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-[var(--text)] mb-2" />

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <x-text-input type="email" id="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                    placeholder="exemple@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password Input -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-[var(--text)] mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <x-text-input type="password" id="password" name="password" required autocomplete="current-password"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                    placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <!-- Remember Me -->

            <div class="flex items-center">
                <input type="checkbox" id="remember_me"
                    class="h-4 w-4 text-[var(--primary)] focus:ring-[var(--accent)] border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-[var(--text)]">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a class="text-sm text-[var(--accent)] hover:text-[var(--primary)]"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>



        <!-- Login Button -->
        <x-primary-button
            class="w-full bg-[var(--primary)] text-white flex justify-center h-10 py-2 px-4 rounded-lg hover:bg-[var(--accent)] transition duration-300">
            {{ __('Log in') }}
        </x-primary-button>

        <!-- Register Link -->
        <p class="text-center text-sm text-gray-600">
            <a href="{{ route('register') }}" class="text-[var(--accent)] hover:text-[var(--primary)] font-medium">
                {{ __('Don\'t have an account ?') }}
            </a>
        </p>
    </form>
</x-guest-layout>
