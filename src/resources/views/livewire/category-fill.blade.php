<div class="min-h-screen flex justify-center font-sans overflow-hidden py-6">
    <div class="w-full">
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto flex justify-center flex-col">
        @foreach ($marks as $mark)
            <div class="flex py-4">
                <form class="flex py-4" class="markForm">
                <input type="hidden" value="{{$mark->id}}" name="id">
                <div class="mr-10">{{$mark->place}}</div>
                <div class="mr-10">Tiempo: {{ $mark->time }}</div>
                <div class="mr-10">Ritmo: {{ $mark->pace }}</div>
                <label for="dorsal">Dorsal: </label>
                <input type="number" name="dorsal" class="relative peer z-20 text-yellow-600 rounded-md focus:ring-0">
                </form>
            </div>
        @endforeach
</div>
    </div>
        </div>
