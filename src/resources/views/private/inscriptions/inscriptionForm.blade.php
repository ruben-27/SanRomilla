<x-app-layout>
    <x-slot name="script">
        {{ __('inscription') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('inscription') }}
        </h2>
    </x-slot>
    <div class="h-full md:w-10/12 md:mx-auto mt-14 mb-10 px-6 md:px-0">
        <div class="flex items-center justify-center mt-8">
            <div class="grid bg-white rounded-lg shadow-xl w-full sm:w-12/12 lg:w-10/12 xl:w-9/12 px-3 md:px-7">
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
                <form id="inscriptionInscription" method="post" action="{{ isset($inscription) ? route('inscriptionUpdate') : route('inscriptionInsert') }}" >
                {{ csrf_field() }}
                    @if (isset($inscription))
                        <input type="hidden" value="{{$inscription->id}}" name="id">
                    @else
                        <input type="hidden" name="id">
                    @endif

                    <h1 class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold mt-5">Datos de usuario</h1>
                    <hr />
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 ">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold after:content-['*'] after:ml-0.5 after:text-red-500">Nombre</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Nombre" name="name"/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellidos</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Apellidos" name="last_name" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                        <div class="grid grid-cols-1 md:col-span-2">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="email" placeholder="Correo" name="email" />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">DNI</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="DNI" name="dni" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="tel" placeholder="Teléfono" name="phone" />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de Nacimiento</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="date" name="birthday" />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Género</label>
                            <select class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" name="gender">
                                <option disabled selected>-- Seleccionar --</option>
                                <option value="m">Masculino</option>
                                <option value="f">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <h1 class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold mt-7">Datos Carrera</h1>
                    <hr />
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Dorsal</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="number" placeholder="Dorsal" name="dorsal"/>
                        </div>
                        <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla Camiseta</label>
                        <select class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" name="size" name="size">
                            <option value="null">No quiere</option>
                            <option value="XXS">XXS</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Donación Dorsal</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Donación Dorsal" name="amount"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Categoría</label>
                        <select class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 disabled focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" name="category" disabled>

                            <option value="0">Categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <div id="errorsDiv" class="text-red-600 font-bold"></div>
                    <div class='flex flex-col-reverse md:flex-row items-center justify-center md:gap-8 gap-4 pt-5 pb-5 mt-5'>
                        <a href="{{route('inscription')}}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded uppercase shadow-xl font-medium text-white px-4 py-2' id="cancel">Cancelar</a>
                        <button class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded shadow-xl uppercase font-medium text-white px-4 py-2' type="button" id="add">Otra Inscripción</button>
                        <button class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded shadow-xl uppercase font-medium text-white px-4 py-2' id="sumbit">Finalizar Inscripciones</button>
                    </div>

                    <div class="my-4 text-gray-500">
                        <p>
                            <span class="font-bold text-yellow-500">*</span> Al darle a otra inscripción se añadirá una inscripción adicional.
                        </p>
                        <p>
                            <span class="font-bold text-yellow-500">*</span> Al darle a finalizar inscripciones se finalizará el proceso de inscripciones.
                        </p>
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

    <div id="sidebar-inscriptions" class="flex flex-col items-center w-36 h-full bg-white hidden fixed right-0 top-16 shadow" >
        <button type="button" id="addNewInscription" class="mt-5 text-gray-500 hover:text-gray-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </button>
    </div>
</x-app-layout>
