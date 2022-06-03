<x-app-layout>
    <x-slot name="script">
        {{ __('category') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>
   
    <div class="container mx-auto">
        <div class="mt-5 md:mx-4">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-700 text-center md:text-left sm:leading-none md:text-5xl">
                <span class="inline md:block">Colaboradores</span>
            </h1>
            <div class="flex justify-center md:justify-start">
                <a href="/category_showInsert" class="mt-7 flex bg-yellow-500 rounded-lg font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-yellow-600 mr-6">
                    <svg class="w-6 h-6" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke: currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Añadir Colaborador
                </a>
            </div>
        </div>
        <livewire:category-datatable/>
    </div>
    <div id="mostrarInsertar" class="container"></div>
    <div id="editar" class="container"></div>
    <div id="eliminar" class="container"></div> 
</x-app-layout>