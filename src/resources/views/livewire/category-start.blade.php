<div>
    <div class="min-h-screen flex justify-center font-sans overflow-hidden py-6">
        <div class="w-full">
            <div class=" my-6 overflow-x-auto">
                <div class="relative overflow-x-auto">
                    <script>
                        
                    </script>
                    <div class="mt-2 p-5 text-center lg:text-8xl text-4xl font-bold flex justify-center">
                        <output id="display-area">00:00:00.00</output>
                    </div>
                    <div id="timers" class="{{$buttonView == "f" ? 'hidden' : ''}} mt-2 p-5 text-center lg:text-4xl text-2xl" >
                            <button type="button" id="start" wire:click="changeView('c')" class="{{$buttonView == "n" ? "" : 'hidden'}} bg-yellow-400 hover:bg-yellow-500 shadow-sm rounded p-4 px-8 text-white">Start</button>
                            <button id="stop" class="{{$buttonView == "c" ? "" : 'hidden'}} bg-yellow-400 hover:bg-yellow-500 shadow-sm rounded p-4 px-8 text-white">Nueva Marca</button>
                            <button id="remove" wire:click="changeView('f')" class="{{$buttonView == "c" ? "" : 'hidden'}} bg-red-400 hover:bg-red-500 shadow-sm rounded p-4 px-8 text-white">Stop </button>
                    </div>
                    <div id="endText" class="{{$buttonView == "f" ? "" : 'hidden'}} mt-2 p-5 text-gray-500 text-center lg:text-4xl text-2xl">La Categoría ha finalizado</div>
                    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                        {{-- Header --}}
                        <div class="p-4 md:flex justify-between bg-gray-50">
                            {{-- Per Page --}}
                            <div>
                                Resultados: &nbsp;
                                <select wire:model="perPage" class="py-1 bg-gray-100 border border-gray-300 text-gray-900 rounded focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="2">2</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            {{-- /Per Page --}}
                        </div>
                        {{-- /Header --}}

                        <div class="relative overflow-x-auto">

                            {{-- Table --}}
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-center cursor-pointer">
                                            <div class="flex justify-center">
                                                Puesto
                                            </div>
                                        </th>
                                        <th class="py-3 px-6 text-center cursor-pointer">
                                            <div class="flex justify-center">
                                                Tiempo
                                            </div>
                                        </th>
                                        <th class="py-3 px-6 text-center cursor-pointer">
                                            <span class="flex justify-center">
                                                Ritmo
                                            </span>
                                        </th>
                                        <th class="py-3 px-6 text-center cursor-pointer">
                                            <span class="flex justify-center">
                                                Borrar Marca
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">

                                    @foreach ($marks as $mark)
                                    <tr class="border-b border-gray-200 even:bg-gray-50 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <span>{{$mark->place}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <span>{{$mark->time}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center uppercase">
                                                <span>{{$mark->pace}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <a wire:click='delete({{$mark->id}})'>
                                                    <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- Paginator --}}
                            @if($marks->links()->paginator->hasPages())
                            <div class="p-3 z-1">
                                <p>
                                    {{$marks->links('vendor.pagination.tailwind')}}
                                </p>
                            </div>
                            @endif
                        {{-- /Paginator --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>