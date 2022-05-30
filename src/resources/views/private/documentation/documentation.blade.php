<x-app-layout>
    <x-slot name="script">
        {{ __('documentation') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('documentation') }}
        </h2>
    </x-slot>
        <div class="container" id="tabla" >
            <div class="jumbotron jumbotron-fluid">
                <div class=" mt-5 mb-5">
                    <h1>Gestión inscripciones</h1>
                </div>
            </div>
            <div><button id="inscripcion" type="button" class="btn btn-primary mb-5" name="enviar" onclick="showInsert()"><i class="bi bi-plus"></i>Nueva inscripción</button></div>
            <div id="cuadro_inscripcion1" class="alert alert-warning mb-5" role="alert">El proceso  de inscripción se habilitará cuando el plazo esté abierto.</div>
            <div id="cuadro_inscripcion2" class="alert alert-warning mb-5" role="alert">El proceso  de inscripción ha finalizado.</div>
            <div class="table-responsive" >
                <table id="example" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Inscripción</th>
                        <th>DNI</th>
                        <th>Fecha de nacimiento</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Dorsal</th>
                        <th>Talla Camiseta</th>
                        <th>Categoría</th>
                        <th>Importe Donación</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
        <div id="mostrarInsertar" class="container"></div>
        <div id="editar" class="container"></div>
        <div id="cuadroTramitar" class="container"></div>
        <div id="cuadroTerminos" class="container"></div>  
</x-app-layout>