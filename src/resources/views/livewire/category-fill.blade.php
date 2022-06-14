<div class="min-h-screen flex justify-center font-sans overflow-hidden py-6" wire:poll>
    <div class="w-full">
        <h1 class="text-2xl font-extrabold tracking-tight text-gray-700 text-center md:text-left sm:leading-none md:text-4xl">
            <span class="inline md:block">Asignar dorsales {{$category->name}}</span>
        </h1>
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto flex justify-center flex-col">
            <form wire:submit.prevent="submit()" class="markForm">
                <div class="relative overflow-x-auto">

                    {{-- Table --}}
                    <table class="min-w-max w-full table-auto shadow">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">
                                    <div class="flex justify-center">
                                        Posición
                                    </div>
                                </th>
                                <th class="py-3 px-6 text-center">
                                    <span class="flex justify-center">
                                        Dorsal
                                    </span>
                                </th>
                                <th class="py-3 px-6 text-center">
                                    <span class="flex justify-center">
                                        Tiempo
                                    </span>
                                </th>
                                <th class="py-3 px-6 text-center">
                                    <span class="flex justify-center">
                                        Ritmo
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                        @foreach ($marks as $i => $mark)
                            @if (!in_array($mark->id,$markArray))
                                <?php $markArray[]=$mark->id ?>
                                <tr class="border-b border-gray-200 even:bg-gray-50 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <input type="hidden" value="{{$mark->id}}" name="categoryId">
                                            <span>{{$mark->place}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="flex flex-col">
                                                <input wire:model.debounce.500ms="dorsals.{{$i}}" name="dorsal.{{$i}}" class="py-1 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Dorsal"/>
                                                @error('dorsals.'.$i)
                                                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <span>{{$mark->time}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <span>{{$mark->pace}}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                    {{-- /Table --}}

                </div>
                <div class='flex items-center justify-center pt-5 pb-5 mt-5'>
                    <button wire:click="submit()" {{$buttonView != "f" ? "disabled" : 'enabled'}}
                            class="w-auto bg-yellow-500 {{$buttonView != "f" ? "opacity-40" : 'hover:bg-yellow-600 shadow'}} disabled:cursor-not-allowed h-10 rounded uppercase font-medium text-white px-4 py-2'" type="button">
                        Enviar Dorsales
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
