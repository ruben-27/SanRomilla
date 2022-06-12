<div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-200 sm:mx-0 sm:h-10 sm:w-10">
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
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Categoría</h3>
            </div>
        </div>
        <form wire:submit.prevent="submit">
            {{ csrf_field() }}
            @if (isset($category))
                <input wire:model="colaboratorId" type="hidden" name="id">
            @endif
            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                <input wire:model.debounce.500ms="name" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Nombre" name="name" />
                @error('name')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad Minima</label>
                    <input wire:model.debounce.500ms="min_age" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Edad Minima" name="min_age" />
                    @error('min_age')
                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad Máxima</label>
                    <input wire:model.debounce.500ms="max_age" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Edad Máxima" name="max_age" />
                    @error('max_age')
                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 ">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Distancia</label>
                    <input wire:model.debounce.500ms="distance" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Distancia (en metros)" name="distance" />
                    @error('distance')
                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Hora Inicio</label>
                    <input wire:model.debounce.500ms="start_time" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="time" name="start_time" />
                    @error('start_time')
                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Precio</label>
                    <input wire:model.debounce.500ms="price" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="number" placeholder="Precio" min="1" step="any"  name="price" />
                    @error('price')
                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </form>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" wire:click="submit()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 sm:ml-3 sm:w-auto sm:text-sm">Aceptar</button>
        <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
    </div>
</div>
