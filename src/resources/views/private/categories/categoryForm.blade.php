<x-app-layout>
    <x-slot name="script">
        {{ __('sponsor') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Colaborator') }}
        </h2>
    </x-slot>    
    <div class="flex items-center justify-center mt-8">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            <div class="flex justify-center py-4">
                <div class="flex bg-yellow-200 rounded-full md:p-4 p-2 border-2 border-yellow-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
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
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" value="{{ isset($category) ? $category->name : ''}}" placeholder="Nombre" name="name" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad Minima</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-grey-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" value="{{ isset($category) ? $category->min_age : ''}}" type="text" placeholder="Edad Minima" name="min_age" />
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad Máxima</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-grey-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" value="{{ isset($category) ? $category->max_age : ''}}" type="text" placeholder="Edad Máxima" name="max_age" />
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Distancia</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->distance : ''}}" type="text" placeholder="Distancia (en metros)" name="distance" />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Hora Inicio</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->start_time : ''}}" type="time" name="start_time" />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Precio</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($category) ? $category->price : ''}}" type="number" min="1" step="any"  name="price" />
                </div>

                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id="cancel">Cancelar</button>
                    <button class='w-auto bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-xl font-medium text-white px-4 py-2' id="sumbit">Añadir</button>
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
</x-app-layout>