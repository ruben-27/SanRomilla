<x-app-layout>
    <x-slot name="script">
        {{ __('category') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="h-full md:w-10/12 md:mx-auto mt-14 mb-10 px-6 md:px-0">
        <livewire:category-datatable/>
    </div>
</x-app-layout>
