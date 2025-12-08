<x-guest-layout>

    <!-- Titre -->
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700 dark:text-gray-300">
        Connexion Administrateur
    </h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('loginAdmin') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Adresse email" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Mot de passe" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password" name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                    Se souvenir de moi
                </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-800"
                    href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            @endif

            <x-primary-button>
                Se connecter
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
