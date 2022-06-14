<div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-200 sm:mx-0 sm:h-10 sm:w-10">
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
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Pagar Inscripciones</h3>
                <div class="mt-2">
                        <p class="text-sm text-gray-500">Inserte los dorsales de los participantes de las inscripciones con número de inscripción <b>{{$inscriptions[0]->inscription_number}}</b></p>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="submit()" class="pt-6">
            @foreach($inscriptions as $i => $insc)
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 border-1 border-b border-gray-300 pb-3 mb-3 last:border-0 last:pb-0 last:mb-0">
                    <div>
                        <label class="uppercase text-sm text-gray-500 text-light font-bold">{{$insc->name}} {{$insc->last_name}}</label>
                    </div>
                    <div>
                        <label class="uppercase text-xs text-gray-500 text-light font-semibold">Añadir Dorsal</label>
                        <input wire:model.debounce.500ms="dorsals.{{$i}}" name="dorsal.{{$i}}" class="w-full py-1 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Dorsal"/>
                        @error('dorsals.'.$i)
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            @endforeach
        </form>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" wire:click="submit()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 sm:ml-3 sm:w-auto sm:text-sm">Pagar</button>
        <button type="button" wire:click="close()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
    </div>
</div>
