<x-app-layout>
    <x-slot name="script">
        {{ __('colaborator') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Colaborator') }}
        </h2>
    </x-slot>
   
    <div id="tabla" class="container" >
        <div class="jumbotron jumbotron-fluid">
            <div class="mt-5 mb-5">
                <h1>Gestión colaboradores</h1>
            </div>
        </div>
        <div><button type="button" class="btn btn-primary mb-5" name="enviar" id="sumbit"><i class="bi bi-plus"></i>Nuevo colaborador</button></div>
        <div><button type="button" class="btn btn-primary mb-5" name="enviar" id="prueba"><i class="bi bi-plus"></i>Nuevo colaborador</button></div>
        <div class="m-0">
            <table id="example" class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Correo</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
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
    <div id="eliminar" class="container"></div> 
</x-app-layout>