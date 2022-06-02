<x-app-layout>
    <x-slot name="script">
        {{ __('donation') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>
    {{ csrf_field() }}
    <div id="tabla" class="container" >
                <div class="jumbotron jumbotron-fluid">
                    <div class="mt-5 mb-5">
                        <h1>Gestión donaciones</h1>
                    </div>
                </div>
                <div><a href="/donation_showInsert"><button type="button" class="btn btn-primary mb-5" name="enviar" id="donation"><i class="bi bi-plus"></i>Nueva donación</button></a></div>
                <div class="m-0">
                    <livewire:donation-datatable/>
                </div>
            </div>
            <div id="mostrarInsertar" class="container"></div>
            <div id="cuadroTramitar" class="container"></div>
</x-app-layout>