<x-app-layout>
    <x-slot name="script">
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>
    {{ csrf_field() }}
    <div class="h-full lg:w-10/12 lg:mx-auto mt-14 mb-10 px-6 lg:px-0">
        <livewire:donation-datatable/>
    </div>
</x-app-layout>
