<x-app-layout>
    <x-slot name="script">
        {{ __('dashboard') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-full lg:w-10/12 lg:mx-auto mt-14 mb-10 px-6 lg:px-0">
        <div class="mt-6 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center p-6 bg-white border-b border-gray-200">
                    <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-full w-10 mr-5" referrerpolicy="no-referrer">
                    !Has iniciado sesión!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
