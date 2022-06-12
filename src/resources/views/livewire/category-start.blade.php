<div class="min-h-screen flex justify-center font-sans overflow-hidden py-6">
    <div class="w-full">
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <div class="relative overflow-x-auto">
            <script>
                
            </script>
            <div>
                <output id="display-area">00:00:00.00</output>
            </div>
            <div id="timers">
                <button type="button" id="start" wire:click="changeView()" class="{{!$buttonView ? 'hidden' : ''}}">Start</button>
                <button id="stop" >Stop</button>
                <button id="remove" class="{{$buttonView ? 'hidden' : ''}}">TuPadre </button>
            </div>
            <div id="marks">
                @foreach ($marks as $mark)
                    <div class="flex py-4">
                        <div class="mr-10">Tiempo: {{ $mark->time }}</div>
                        <div class="mr-10">Ritmo: {{ $mark->pace }}</div>
                        <div class="cursor-pointer" wire:click='delete({{$mark->id}})'>Borrar Marca</div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
