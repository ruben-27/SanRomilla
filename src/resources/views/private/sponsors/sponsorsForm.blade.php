<x-app-layout>
    <x-slot name="script">
        {{ __('sponsor') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Colaborator') }}
        </h2>
    </x-slot>    
    <div class="flex items-center justify-center mt-8">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            <div class="flex justify-center py-4">
                <div class="flex bg-yellow-200 rounded-full md:p-4 p-2 border-2 border-yellow-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Nuevo Patrocinador</h1>
                </div>
            </div>
            <form id="sponsorInscription" method="post" action="{{ isset($sponsor) ? '/sponsorUpdate' : '/sponsorInsert' }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                @if (isset($sponsor))
                    <input type="hidden" value="{{$sponsor->id}}" name="id">
                @endif  
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($sponsor) ? $sponsor->name : ''}}" type="text" placeholder="Nombre" name="name" />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-yellow-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-gray-600 pt-1 tracking-wider'>Sube una foto</p>
                            </div>
                        <input type='file' class="hidden" name="image"/>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Url de la página</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent placeholder:text-gray-300" value="{{ isset($sponsor) ? $sponsor->url : ''}}" type="text" placeholder="Url de la página" name="url" />
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
</x-app-layout>