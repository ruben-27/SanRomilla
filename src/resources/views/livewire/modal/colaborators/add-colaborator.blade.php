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
                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Colaborador</h3>
            </div>
        </div>
        <form wire:submit.prevent="submit">
            {{ csrf_field() }}
            @if (isset($colaborator))
                <input wire:model="colaboratorId" type="hidden" name="id">
            @endif
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
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                <input wire:model.debounce.500ms="email" class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent placeholder:text-gray-300" type="email" placeholder="Email" name="email" />
                @error('email')
                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                @enderror
            </div>

{{--            <div class="grid grid-cols-1 mt-5">--}}
{{--                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-2">Roles</label>--}}
{{--                <div class="md:flex flex-wrap">--}}
{{--                    @foreach ($allRoles as $role)--}}
{{--                        <section class="mx-auto p-5">--}}
{{--                            <label for="{{$role->id}}" class="relative flex-inline items-center isolate p-4 rounded-2xl cursor-pointer">--}}
{{--                                @if (isset($colaborator))--}}
{{--                                    @php--}}
{{--                                        $checked = false--}}
{{--                                    @endphp--}}
{{--                                    @foreach ($colaborator->roles()->get() as $colRole)--}}
{{--                                        @if ($colRole->id == $role->id)--}}
{{--                                            @php--}}
{{--                                                $checked = true--}}
{{--                                            @endphp--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                    @if ($checked)--}}
{{--                                        <input id="{{$role->id}}" type="checkbox" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0" checked name="roles[]" value="{{ $role->id }}"/>--}}
{{--                                    @else--}}
{{--                                        <input id="{{$role->id}}" type="checkbox" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0" name="roles[]" value="{{ $role->id }}"/>--}}
{{--                                    @endif--}}
{{--                                    @php--}}
{{--                                        $checked = false--}}
{{--                                    @endphp--}}
{{--                                @else--}}
{{--                                    <input id="{{$role->id}}" type="checkbox" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0" name="roles[]" value="{{ $role->id }}"/>--}}
{{--                                @endif--}}

{{--                                <span class="ml-2 relative z-20">{{ $role->public }}</span>--}}
{{--                                <div class="absolute inset-0 bg-white peer-checked:bg-yellow-50 peer-checked:border-yellow-300 z-10 border rounded-2xl"></div>--}}
{{--                            </label>--}}
{{--                        </section>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
        </form>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" wire:click="submit()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 sm:ml-3 sm:w-auto sm:text-sm">Aceptar</button>
        <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
    </div>
</div>
