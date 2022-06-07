<x-app-layout>
    <x-slot name="script">
        {{ __('inscription') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('inscription') }}
        </h2>
    </x-slot>    
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-6 mx-auto px-4 sm:px-6 lg:px-8">  
            <div class="flex items-center justify-center mt-8">
                <div class="grid bg-white rounded-lg shadow-xl w-full sm:w-12/12 lg:w-8/12 xl:w-6/12 px-3 md:px-7">
                    <div class="flex justify-center py-4">
                        <div class="flex bg-yellow-200 rounded-full md:p-4 p-2 border-2 border-yellow-300">
                            <svg fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="h-6 w-6 text-yellow-500">
                                <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="flex">
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Nueva Inscripción</h1>
                        </div>
                    </div>
                    <form id="inscriptionInscription" method="post" action="{{ isset($inscription) ? '/inscriptionUpdate' : '/inscriptionInsert' }}" >
                    {{ csrf_field() }}
                        @if (isset($inscription))
                            <input type="hidden" value="{{$inscription->id}}" name="id">
                        @else
                            <input type="hidden" name="id">    
                        @endif
                          
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 ">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="text" placeholder="Nombre" name="name"/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellidos</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="text" placeholder="Apellidos" name="last_name" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">DNI</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="text" placeholder="DNI" name="dni" />
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Telefono</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="tel" name="phone" />
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de Nacimiento</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="date" name="birthday" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 ">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="email" placeholder="Correo" name="email" />
                            </div>
                            <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                                <select class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" name="gender">
                                    <option value="m">Masculino</option>
                                    <option value="f">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Dorsal</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="number" placeholder="Dorsal" name="dorsal"/>
                            </div>
                            <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla Camiseta</label>
                            <select class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent" name="size" name="size">
                                <option value="NULL">No quiere</option>
                                <option>XXS</option>
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Donacion Dorsal</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" type="text" placeholder="Donacion Dorsal" name="amount"/>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 mt-5">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Categoria</label>
                            <select class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" name="category" disabled>
                                
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        

                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <button type="button" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id="cancel">Cancelar</button>
                            <button class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" id="add">Añadir Inscripción</button>
                            <button class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-xl font-medium text-white px-4 py-2' id="sumbit">Enviar</button>
                        </div>

                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif  
                </div>
            </div>       
        </div>
    </div>
    <div id="sidebar-inscriptions" class="w-1/12 h-full bg-white fixed right-0 top-16" ><p id="addNewInscription">Icono Añadir</p></div>
</x-app-layout>