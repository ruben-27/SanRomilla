<x-app-layout>
    <x-slot name="script">
        {{ __('mark') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mark') }}
        </h2>
    </x-slot>

    <div class="h-full md:w-10/12 md:mx-auto mt-14 mb-10 px-6 md:px-0">
        <div class="mt-8 flex flex-col items-center md:flex-row md:justify-between">
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-700 text-center md:text-left sm:leading-none md:text-4xl">
                    <span class="inline md:block">Marcas</span>
                </h1>
                <p>
                    Gestión de marcas del evento San Romilla
                </p>
            </div>
            
        </div>
        <div class="grid grid-cols-3 gap-4 ">
            @foreach ($categories->all() as $category)
            @if ($category->status == "n")
                        <a href="{{route('startCategory', ['id' => $category->id])}}">
                    @elseif ($category->status == "c")
                        <a href="{{route('fillCategory', ['id' => $category->id])}}">
                    @else
                        <a href="rutaFinalizada">
                    @endif      
            <div class="bg-white rounded-2xl border shadow-x1 p-10 max-w-lg hover:bg-gray-50">
                <div class="flex flex-col items-center space-y-4">
                <h1 class="font-bold text-2xl text-gray-700 w-4/6 text-center">
                    {{$category->name}}
                </h1>
                <p class="text-sm text-gray-500 text-center w-5/6">
                    @if ($category->status == "n")
                        No comenzado
                    @elseif ($category->status == "c")
                        En curso
                    @else
                        Finalizado
                    @endif            
                </p>
                </div>
            </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
