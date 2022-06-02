<div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden p-6">
    <div class="w-full lg:w-5/6">
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <div class="relative overflow-x-auto shadow-md">

                {{-- Header --}}
                <div class="p-4 flex justify-between bg-gray-50">

                    {{-- Per Page --}}
                    <div>
                        Resultados: &nbsp;
                        <select wire:model="perPage" class="py-1 bg-gray-100 border border-gray-300 text-gray-900 rounded focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="2">2</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    {{-- /Per Page --}}

                    {{-- Searcher --}}
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model.debounce.300ms="search" type="text" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-80 pl-10 p-2.5" placeholder="Buscar">
                    </div>
                    {{-- /Searcher --}}
                
                </div>
                {{-- /Header --}}

            {{-- Table --}}
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th wire:click="sortBy('id')" class="py-3 px-6 text-left cursor-pointer">
                            <span class="flex justify-center">
                                IdDonacion
                                @include('partials._sort-icon', ['field'=>'id'])
                            </span>
                        </th>
                        <th wire:click="sortBy('name')" class="py-3 px-6 text-center cursor-pointer">
                            <div class="flex justify-center">
                                Nombre
                                @include('partials._sort-icon', ['field'=>'name'])
                            </div>
                        </th>
                        <th wire:click="sortBy('last_name')" class="py-3 px-6 text-center cursor-pointer">
                            <span class="flex justify-center">
                                Apellidos
                                @include('partials._sort-icon', ['field'=>'last_name'])
                            </span>
                        </th>
                        <th wire:click="sortBy('amount')" class="py-3 px-6 text-center cursor-pointer">
                            <span class="flex justify-center">
                                Importe donación
                                @include('partials._sort-icon', ['field'=>'amount'])
                            </span>
                        </th>
                        <th wire:click="sortBy('size')" class="py-3 px-6 text-center cursor-pointer">
                            <span class="flex justify-center">
                                Talla Camiseta
                                @include('partials._sort-icon', ['field'=>'size'])
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">

                    @foreach ($donations as $donation)
                    @if($loop->iteration % 2 == 0)
                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                    @else
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                    @endif
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center justify-center">
                                <span>{{$donation->id}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span>{{$donation->name}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span>{{$donation->last_name}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span>{{$donation->amount}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center uppercase">
                                <span>{{$donation->size}}</span>
                            </div>
                        </td>
                    </tr>                        
                    @endforeach

                </tbody>
            </table>
            {{-- /Table --}}

            {{-- Paginator --}}
            @if($donations->links()->paginator->hasPages())
            <div class="p-3">
                <p>
                    {{$donations->links('vendor.pagination.tailwind')}}
                </p>
            </div>
            @endif
            {{-- /Paginator --}}

        </div>
    </div>
</div>