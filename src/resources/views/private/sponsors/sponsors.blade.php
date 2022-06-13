<x-app-layout>
    <x-slot name="script">
{{--        {{ __('sponsor') }}--}}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sponsors') }}
        </h2>
    </x-slot>
    <div class="h-full lg:w-10/12 lg:mx-auto mt-14 mb-10 px-6 lg:px-0">
        <livewire:sponsor-datatable/>
    </div>
</x-app-layout>
