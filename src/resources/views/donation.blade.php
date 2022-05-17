<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>
    <div id="tabla" class="container" >
                <div class="jumbotron jumbotron-fluid">
                    <div class="mt-5 mb-5">
                        <h1>Gestión donaciones</h1>
                    </div>
                </div>
                <div><button type="button" class="btn btn-primary mb-5" name="enviar" onclick="mostrarInsertar()"><i class="bi bi-plus"></i>Nueva donación</button></div>
                <div class="m-0">
                    <table id="example" class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>IdDonacion</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Importe donación</th>
                            <th>Talla Camiseta</th>
                        </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="mostrarInsertar" class="container"></div>
            <div id="cuadroTramitar" class="container"></div>
</x-app-layout>