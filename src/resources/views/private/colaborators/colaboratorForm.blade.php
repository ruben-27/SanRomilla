<x-app-layout>
    <x-slot name="script">
        {{ __('colaborator') }}
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
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Nuevo Colaborador</h1>
                </div>
            </div>
            <form id="inscriptionDonation" method="post" action="{{ isset($colaborator) ? '/colaboratorUpdate' : '/colaboratorInsert' }}" >
            {{ csrf_field() }}
                @if (isset($colaborator))
                    <input type="hidden" value="{{$colaborator->id}}" name="id">
                @endif  
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($colaborator) ? $colaborator->name : ''}}" type="text" placeholder="Nombre" name="name" />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellidos</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent placeholder:text-gray-300" value="{{ isset($colaborator) ? $colaborator->last_name : ''}}" type="text" placeholder="Apellidos" name="last_name" />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent placeholder:text-gray-300" value="{{ isset($colaborator) ? $colaborator->email : ''}}" type="email" placeholder="Email" name="email" />
                </div>

                @foreach ($roles as $role)
                
                <section class="container mx-auto p-5">
                    <label for="checkbox" class="relative flex-inline items-center isolate p-4 rounded-2xl">
                        @if (isset($colaborator))
                            {{$checked = false}}
                            @foreach ($colaborator->roles()->get() as $colRole)
                                @if ($colRole->id == $role->id)
                                    {{$checked = true}}
                                @endif
                            @endforeach
                            @if ($checked)
                                <input id="checkbox" type="checkbox" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0" checked name="roles[]" value="{{ $role->id }}"/>
                            @else
                                <input id="checkbox" type="checkbox" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0" name="roles[]" value="{{ $role->id }}"/>
                            @endif
                            {{$checked = false}}
                        @else
                        <input id="checkbox" type="checkbox" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0" name="roles[]" value="{{ $role->id }}"/>
                        @endif
                        
                        <span class="ml-2 relative z-20">{{ $role->public }}</span>
                        <div class="absolute inset-0 bg-white peer-checked:bg-yellow-50 peer-checked:border-yellow-300 z-10 border rounded-2xl"></div>
                    </label>
                </section>
                @endforeach

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