<x-app-layout>
    <x-slot name="script">
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscription') }}
        </h2>
    </x-slot>
    {{ csrf_field() }}
    <div class="h-full lg:w-10/12 lg:mx-auto mt-14 mb-10 px-6 lg:px-0">
        @if($year)
        <livewire:inscription-datatable/>
        @else
        <div class="flex justify-center items-center mt-20">
            <p class="text-4xl text-gray-500 text-center text-bold">
                No hay ningún año activo
            </p>
        </div>
        @endif
    </div>
</x-app-layout>
