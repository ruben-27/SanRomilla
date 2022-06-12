<x-app-layout>
    <x-slot name="script">
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sponsors') }}
        </h2>
    </x-slot>
    <div class="h-full lg:w-10/12 lg:mx-auto mt-14 mb-10 px-6 lg:px-0">
        <div class="mt-8 flex flex-col items-center md:flex-row md:justify-between">
        <div>
            <h1 class="text-2xl font-extrabold tracking-tight text-gray-700 text-center md:text-left sm:leading-none md:text-4xl">
                <span class="inline md:block">Patrocinadores</span>
            </h1>
            <p class="hidden md:block">
                Gestión de los patrocinadores del evento San Romilla
            </p>
        </div>
        <a href="{{route('sponsor_showInsert')}}" class="flex bg-yellow-500 rounded font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-yellow-600">
            <svg class="w-6 h-6" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke: currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Añadir Patrocinador
        </a>
    </div>
        <livewire:sponsor-datatable/>
    </div>
</x-app-layout>
