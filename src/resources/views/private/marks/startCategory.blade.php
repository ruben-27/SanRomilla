<x-app-layout>
    <x-slot name="script">
        {{ __('mark') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marks') }}
        </h2>
    </x-slot>
    <div class="h-full lg:w-10/12 lg:mx-auto mt-14 mb-10 px-6 lg:px-0">
        <div class="mt-8 flex flex-col items-center md:flex-row md:justify-between">
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-700 text-center md:text-left sm:leading-none md:text-4xl">
                    <span class="inline md:block">Marcas</span>
                </h1>
                <p class="hidden md:block">
                    Gestión de marcas del evento San Romilla
                </p>
            </div>

        </div>
        @livewire('category-start', ['id' => $id])
    </div>

</x-app-layout>
