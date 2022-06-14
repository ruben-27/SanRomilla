<div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-200 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="w-6 h-6 text-yellow-500"
                     data-darkreader-inline-stroke=""
                     fill="none"
                     stroke="currentColor"
                     style="--darkreader-inline-stroke: currentColor;"
                     viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Patrocinador</h3>
            </div>
        </div>
        <form wire:submit.prevent="submit">
            {{ csrf_field() }}
            @if (isset($sponsor))
                <input wire:model.debounce.500ms="sponsorId" type="hidden" name="id">
            @endif
            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                <input wire:model.debounce.500ms="name" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Nombre" name="name" />
                @error('name')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Logo del Patrocinador</label>
                <input wire:model.debounce.500ms="image" type='file' id="image" name="image"/>
                @error('image')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Url de la página</label>
                <input wire:model.debounce.500ms="url" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Ejemplo: https://fundacionloyola.com/vguadalupe/" name="url" />
                @error('url')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>
        </form>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" wire:click="submit()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 sm:ml-3 sm:w-auto sm:text-sm">Aceptar</button>
        <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
    </div>
</div>
