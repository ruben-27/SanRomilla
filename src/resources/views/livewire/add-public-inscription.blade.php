<div>
    <div class="flex items-center justify-center mt-8">
        <div class="grid bg-white rounded-lg shadow-xl w-full sm:w-12/12 lg:w-10/12 xl:w-9/12 px-3 md:px-7 {{count($inscriptions) > 0 ? 'mr-36' : 'mr-0'}}">
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
            <form wire:submit.prevent="submit">
                {{ csrf_field() }}

                <h1 class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold mt-5">Datos de usuario</h1>
                <hr />
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 ">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                        <input wire:model.debounce.500ms="name" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Nombre" name="name"/>
                        @error('name')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellidos</label>
                        <input wire:model.debounce.500ms="last_name" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Apellidos" name="last_name" />
                        @error('last_name')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                    <div class="grid grid-cols-1 md:col-span-2">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
                        <input wire:model.debounce.500ms="email" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="email" placeholder="Correo" name="email" />
                        @error('email')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">DNI</label>
                        <input wire:model.debounce.500ms="dni" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="DNI" name="dni" />
                        @error('dni')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono</label>
                        <input wire:model.debounce.500ms="phone" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="tel" placeholder="Teléfono" name="phone" />
                        @error('phone')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de Nacimiento</label>
                        <input wire:model.debounce.500ms="birthday" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="date" name="birthday" />
                        @error('birthday')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Género</label>
                        <select wire:model.debounce.500ms="gender" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" name="gender">
                            <option value="n" disabled selected>-- Seleccionar --</option>
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                        @error('gender')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <h1 class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold mt-7">Datos Carrera</h1>
                <hr />
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla Camiseta</label>
                        <select wire:model.debounce.500ms="size" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" name="size" name="size">
                            <option value="n">No quiere</option>
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
                        <input wire:model.debounce.500ms="amount" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Donación Dorsal" name="amount"/>
                        @error('amount')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Categoría</label>
                        <input wire:model.debounce.500ms="categoryName" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" name="category" disabled/>
                    </div>
                </div>

                <div class="flex flex-col items-end justify-end mt-5">
                    <div class="flex">
                        <div class="flex items-center h-5">
                            <input wire:model.debounce.500ms="remember" id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-0">
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900">
                            Acepto los <a wire:click="$emit('openModal', 'terms-of-use')" class="text-blue-600 hover:underline cursor-pointer">términos de uso</a>.
                        </label>
                    </div>
                    @error('remember')
                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                    @enderror
                </div>

                <div class='flex flex-col-reverse md:flex-row items-center justify-center md:gap-8 gap-4 pt-5 pb-5 mt-5'>
                    <a href="{{route('welcome')}}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded uppercase shadow-xl font-medium text-white px-4 py-2' id="cancel">Cancelar</a>
                    <button wire:click="otherInscription()" class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded shadow-xl uppercase font-medium text-white px-4 py-2' type="button" id="add">Otra Inscripción</button>
                    <button wire:click="submit()" class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded shadow-xl uppercase font-medium text-white px-4 py-2' type="button">Finalizar Inscripciones</button>
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

        </div>
    </div>

    @if(count($inscriptions) > 0)
        <div id="sidebar-inscriptions" class="flex flex-col items-center w-36 h-full bg-white fixed right-0 top-16 shadow" >
            @foreach($inscriptions as $key => $inscription)
                <div class="group w-full relative hover:bg-gray-200 border border-b-gray-300 {{$inscription['inscripId'] == $inscripId ? 'bg-gray-100' : ''}}">
                    <a wire:click="changeInscription({{$inscription['inscripId']}})" class="flex justify-between w-full p-3 text-xs text-left cursor-default">
                        <div>
                            <div class="font-bold text-sm">{{$inscription['name']}}</div>
                            <div>{{$inscription['dni']}}</div>
                        </div>
                    </a>
                    <button wire:click="deleteInscription({{$inscription['inscripId']}})" type="button" class="absolute top-1/2 right-0 transform -translate-y-1/2 mr-4 invisible group-hover:visible text-red-400 z-20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endforeach
            <button wire:click="otherInscription()" type="button" id="addNewInscription" class="mt-5 text-gray-500 hover:text-gray-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </button>
        </div>
    @endif
</div>
