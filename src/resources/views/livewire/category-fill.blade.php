<div class="min-h-screen flex justify-center font-sans overflow-hidden py-6" wire:poll>
    <div class="w-full">
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto flex justify-center flex-col">
        <form class="markForm">
        @foreach ($marks as $mark)
            @if (!in_array($mark->id,$markArray))
                <?php $markArray[]=$mark->id ?>
                <div class="flex py-4">
                    <input type="hidden" value="{{$mark->id}}" name="id">
                    <div class="mr-10">{{$mark->place}}</div>
                    <div class="mr-10">Tiempo: {{ $mark->time }}</div>
                    <div class="mr-10">Ritmo: {{ $mark->pace }}</div>
                    <label for="dorsal">Dorsal: </label>
                    <input type="number" name="dorsal" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0">
                </div>
            @endif
        @endforeach
        <div class='flex flex-col-reverse md:flex-row items-center justify-center md:gap-8 gap-4 pt-5 pb-5 mt-5'>
            <button {{$buttonView != "f" ? "disabled" : ''}} class=" w-auto bg-yellow-500 disabled:opacity-75 enabled:hover:bg-yellow-600 rounded shadow-xl uppercase font-medium text-white px-4 py-2'" type="button" wire:click='sendInfo'>Enviar Dorsales</button>
        </div>
        </form>
</div>
    </div>
        </div>
