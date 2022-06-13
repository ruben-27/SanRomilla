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
                    <rect x="7" y="9" width="14" height="10" rx="2" />
                    <circle cx="14" cy="14" r="2" />
                    <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Donación</h3>
            </div>
        </div>
        <form wire:submit.prevent="submit">
            {{ csrf_field() }}
            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                <input wire:model.debounce.500ms="name" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Nombre" name="name" />
                @error('name')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellidos</label>
                <input wire:model.debounce.500ms="last_name" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Apellidos" name="last_name" />
                @error('last_name')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Importe</label>
                <input wire:model.debounce.500ms="amount" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Importe" name="amount" />
                @error('amount')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>


            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla Camiseta</label>
                <select wire:model.debounce.500ms="size" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent" name="size">
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
        </form>
        <p class="mt-3 text-sm text-gray-400">
            Importe total {{$size != "n" ? $shirt_price + (is_numeric($amount) ? $amount : 0) : (is_numeric($amount) ? $amount : 0) + 0}}.
        </p>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" wire:click="submit()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 sm:ml-3 sm:w-auto sm:text-sm">Aceptar</button>
        <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
    </div>
</div>
