<x-app-layout>
    <x-slot name="script">
        {{ __('category') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('category') }}
        </h2>
    </x-slot>
    <div class="h-full mt-14 mb-10">
        <div class="mt-6 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center mt-8">
                <div class="grid bg-white rounded-lg shadow-xl w-full sm:w-12/12 lg:w-8/12 xl:w-6/12 px-3 md:px-7">
                    <div class="flex justify-center py-4">
                        <div class="flex bg-yellow-200 rounded-full md:p-4 p-2 border-2 border-yellow-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-list text-yellow-500"
                                width="25" height="25"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="9" y1="6" x2="20" y2="6" />
                                <line x1="9" y1="12" x2="20" y2="12" />
                                <line x1="9" y1="18" x2="20" y2="18" />
                                <line x1="5" y1="6" x2="5" y2="6.01" />
                                <line x1="5" y1="12" x2="5" y2="12.01" />
                                <line x1="5" y1="18" x2="5" y2="18.01" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="flex">
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Nueva Categoria</h1>
                        </div>
                    </div>
                    <form id="categoryInscription" method="post" action="{{ isset($category) ? '/categoryUpdate' : '/categoryInsert' }}" >
                    {{ csrf_field() }}
                        @if (isset($category))
                            <input type="hidden" value="{{$category->id}}" name="id">
                        @endif
                        <div class="grid grid-cols-1 mt-5">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" value="{{ isset($category) ? $category->name : ''}}" placeholder="Nombre" name="name" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad Minima</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->min_age : ''}}" type="text" placeholder="Edad Minima" name="min_age" />
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad Máxima</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->max_age : ''}}" type="text" placeholder="Edad Máxima" name="max_age" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Distancia</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->distance : ''}}" type="text" placeholder="Distancia (en metros)" name="distance" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Hora Inicio</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->start_time : ''}}" type="time" name="start_time" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Precio</label>
                                <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->price : ''}}" type="number" placeholder="Precio" min="1" step="any"  name="price" />
                            </div>
                        </div>

                        <div class='flex items-center justify-center  md:gap-8 gap-4 mt-5 pt-5 pb-5'>
                            <button type="button" class='w-auto bg-gray-500 hover:bg-gray-700 rounded shadow-xl uppercase font-medium text-white px-4 py-2' id="cancel">Cancelar</button>
                            <button class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded shadow-xl uppercase font-medium text-white px-4 py-2' id="sumbit">Añadir</button>
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
</x-app-layout>
