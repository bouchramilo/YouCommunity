<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-[var(--text)]">{{ __('Créer un compte')}}</h1>
        <p class="text-sm text-gray-600 mt-2" >{{ __('Rejoignez la communauté YouCommunity')}}</p>
    </div>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Full Name Input -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-[var(--text)] mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
                <x-text-input type="text" id="fullname" name="name" :value="old('name')"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                    placeholder="John Doe" required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Input -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-[var(--text)] mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <x-text-input type="email" id="email" name="email" :value="old('email')"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                    placeholder="exemple@email.com" required />
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
                <x-text-input type="password" id="password" name="password"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none"
                    placeholder="••••••••" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                class="block text-sm font-medium text-[var(--text)] mb-2" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <x-text-input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="••••••••" required autocomplete="new-password"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--accent)] focus:border-[var(--accent)] outline-none" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Photo Upload -->
        <div>
            <label for="photo" class="block text-sm font-medium text-[var(--text)] mb-2">
                Photo de profil
            </label>
            <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
                <label for="file-upload" class="ml-5 cursor-pointer">
                    <span
                        class="px-4 py-2 text-sm font-medium text-white bg-[var(--primary)] rounded-lg hover:bg-[var(--accent)] transition duration-300">
                        Choisir une photo
                    </span>
                    <input id="file-upload" name="file-upload" type="file" class="sr-only" accept="image/*">
                </label>
            </div>
        </div>

        <!-- Register Button -->
        <x-primary-button
            class="w-full bg-[var(--primary)] text-white flex justify-center h-10 py-2 px-4 rounded-lg hover:bg-[var(--accent)] transition duration-300">
            {{ __('Register') }}
        </x-primary-button>

        <!-- Login Link -->
        <p class="text-center text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-[var(--accent)] hover:text-[var(--primary)] font-medium">
                {{ __('Already registered?') }}
            </a>
        </p>

    </form>

    <script>
        // Preview uploaded image
        const fileUpload = document.getElementById('file-upload');
        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('h-full', 'w-full', 'object-cover');
                    const previewContainer = document.querySelector('.rounded-full');
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-guest-layout>
