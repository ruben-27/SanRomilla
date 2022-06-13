<div class="min-h-screen flex justify-center font-sans overflow-hidden py-6">
    <div class="w-full">
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            {{-- Header --}}
            <div class="p-4 flex flex-col lg:flex-row justify-between items-center bg-gray-50">

                <div
                    class="w-full flex flex-col justify-center items-center lg:justify-between lg:items-start 2xl:flex-row 2xl:justify-around 2xl:items-center">
                    {{-- Per Page --}}
                    <div>
                        Resultados: &nbsp;
                        <select wire:model="perPage"
                                class="py-1 bg-gray-100 border border-gray-300 text-gray-900 rounded focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    {{-- /Per Page --}}

                    {{-- Categories --}}
                    <div class="mt-6 2xl:mt-0">
                        Categoría: &nbsp;
                        <select wire:model="category"
                                class="py-1 bg-gray-100 border border-gray-300 text-gray-900 rounded focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="">Todas</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- /Categories --}}
                </div>

                <div
                    class="w-full flex flex-col justify-around items-center lg:justify-between lg:items-end 2xl:flex-row 2xl:justify-around 2xl:items-center">
                    {{-- Paid --}}
                    <div class="mt-6 lg:mt-0">
                        Pagado: &nbsp;
                        <select wire:model="paid"
                                class="py-1 bg-gray-100 border border-gray-300 text-gray-900 rounded focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="">Todas</option>
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                    {{-- /Paid --}}

                    {{-- Searcher --}}
                    <div class="relative mt-6 2xl:mt-0">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model.debounce.300ms="search" type="text"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full md:w-80 pl-10 p-2.5"
                               placeholder="Buscar">
                    </div>
                    {{-- /Searcher --}}
                </div>

            </div>
            {{-- /Header --}}

            <div class="relative overflow-x-auto">

                {{-- Table --}}
                <table class="min-w-max w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">
                                <span class="flex justify-center">
                                    Acciones
                                </span>
                        </th>
                        <th wire:click="sortBy('name')" class="py-3 px-6 text-center cursor-pointer">
                            <div class="flex justify-start">
                                Nombre
                                @include('partials._sort-icon', ['field'=>'name'])
                            </div>
                        </th>
                        <th wire:click="sortBy('amount')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Importe
                                    @include('partials._sort-icon', ['field'=>'amount'])
                                </span>
                        </th>
                        <th wire:click="sortBy('size')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Talla Camiseta
                                    @include('partials._sort-icon', ['field'=>'size'])
                                </span>
                        </th>
                        <th wire:click="sortBy('dorsal')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Dorsal
                                    @include('partials._sort-icon', ['field'=>'dorsal'])
                                </span>
                        </th>
                        <th wire:click="sortBy('dni')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-start">
                                    DNI
                                    @include('partials._sort-icon', ['field'=>'dni'])
                                </span>
                        </th>
                        <th wire:click="sortBy('email')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-start">
                                    Correo
                                    @include('partials._sort-icon', ['field'=>'email'])
                                </span>
                        </th>
                        <th wire:click="sortBy('birthday')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Fecha Nac.
                                    @include('partials._sort-icon', ['field'=>'birthday'])
                                </span>
                        </th>
                        <th wire:click="sortBy('category_id')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Categoría
                                    @include('partials._sort-icon', ['field'=>'category_id'])
                                </span>
                        </th>
                        <th wire:click="sortBy('inscription_number')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Número inscripción
                                    @include('partials._sort-icon', ['field'=>'inscription_number'])
                                </span>
                        </th>
                        <th wire:click="sortBy('gender')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Género
                                    @include('partials._sort-icon', ['field'=>'gender'])
                                </span>
                        </th>
                        <th wire:click="sortBy('phone')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Teléfono
                                    @include('partials._sort-icon', ['field'=>'phone'])
                                </span>
                        </th>
                        <th wire:click="sortBy('created_at')" class="py-3 px-6 text-center cursor-pointer">
                                <span class="flex justify-center">
                                    Fecha
                                    @include('partials._sort-icon', ['field'=>'created_at'])
                                </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">

                    @foreach ($inscriptions as $inscription)
                        <tr class="border-b border-gray-200 even:bg-gray-50 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a wire:click="$emit('openModal', 'modal.inscriptions.delete-inscription', {{ json_encode(['inscriptionId' => $inscription->id]) }})">
                                        <div
                                            class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </div>
                                    </a>
                                    @if($inscription->paid == 1)
                                    <a wire:click="$emit('openModal', 'modal.inscriptions.unpay-inscription', {{ json_encode(['inscription' => $inscription->id]) }})">
                                    @else
                                    <a wire:click="$emit('openModal', 'modal.inscriptions.pay-inscription', {{ json_encode(['inscription' => $inscription->id]) }})">
                                    @endif
                                        <div
                                            class="w-4 mr-2 transform {{$inscription->paid == 1 ? 'text-green-400 hover:text-green-500' : 'text-red-400 hover:text-red-500'}} hover:text-red-500 hover:scale-110 cursor-pointer">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-start">
                                    <span>{{$inscription->name}} {{$inscription->last_name}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{$inscription->amount}} €</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center uppercase">
                                    <span>{{$inscription->size}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{$inscription->dorsal}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-start">
                                    <span>{{$inscription->dni}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-start">
                                    <span>{{$inscription->email}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ \Carbon\Carbon::parse($inscription->birthday)->format('d/m/Y')}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{$inscription->categoryName}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{$inscription->inscription_number}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    @if (strtoupper($inscription->gender) == 'M')
                                        <span>Hombre</span>
                                    @else
                                        <span>Mujer</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{$inscription->phone}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center uppercase">
                                    <span>{{ \Carbon\Carbon::parse($inscription->created_at)->format('d/m/Y')}}</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{-- /Table --}}

            </div>

            {{-- Paginator --}}
            @if($inscriptions->links()->paginator->hasPages())
                <div class="p-3 z-1">
                    <p>
                        {{$inscriptions->links('vendor.pagination.tailwind')}}
                    </p>
                </div>
            @endif
            {{-- /Paginator --}}
        </div>
    </div>
</div>
