<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Google -->
        <a href="{{ url('auth/google') }}">
            <button type="button" class="w-full group h-12 px-6 border-2 border-gray-300 rounded-md transition duration-300 hover:border-blue-400 focus:bg-blue-50 active:bg-blue-100">
                <div class="relative flex items-center space-x-4 justify-center">
                    <img src="https://tailus.io/sources/blocks/social/preview/images/google.svg" class="absolute left-0 w-5" alt="google logo">
                    <span class="block w-max font-semibold tracking-wide text-gray-700 text-sm transition duration-300 group-hover:text-blue-600 sm:text-base">
                        Iniciar sesión con Google
                    </span>
                </div>
            </button>
        </a>
    </x-auth-card>
</x-guest-layout>
