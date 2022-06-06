<x-app-layout>
    <x-slot name="script">
        {{ __('donation') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>    
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-6 mx-auto px-4 sm:px-6 lg:px-8">   
            <div class="flex items-center justify-center mt-8">
                <div class="grid bg-white rounded-lg shadow-xl w-full sm:w-12/12 lg:w-8/12 xl:w-6/12 px-3 md:px-7">
                    <div class="flex justify-center py-4">
                        <div class="flex bg-yellow-200 rounded-full md:p-4 p-2 border-2 border-yellow-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="flex">
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Nueva Donación</h1>
                        </div>
                    </div>
                    <form id="inscriptionDonation" method="post" action="/donationInsert">
                    {{ csrf_field() }}
                        <div class="grid grid-cols-1 mt-5">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Nombre" name="name" />
                        </div>

                        <div class="grid grid-cols-1 mt-5">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellidos</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Apellidos" name="last_name" />
                        </div>

                        <div class="grid grid-cols-1 mt-5">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Importe</label>
                            <input class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent placeholder:text-gray-300" type="text" placeholder="Importe" name="amount" />
                        </div>


                        <div class="grid grid-cols-1 mt-5">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla</label>
                            <select class="py-2 px-3 rounded-lg border-1 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-transparent" name="size">
                                <option>No quiere</option>
                                <option>XXS</option>
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                        </div>

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
        </div>
    </div>
</x-app-layout>