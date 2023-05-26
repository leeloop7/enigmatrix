<div x-data="{ isDragging: false, currentPosition: { x: 0, y: 0 }, initialPosition: { x: 0, y: 0 } }"
    x-on:mouseup="isDragging = false"
    x-on:mousemove.window="if (isDragging) { currentPosition.x = $event.clientX - initialPosition.x; currentPosition.y = $event.clientY - initialPosition.y; }"
    class="relative">

    <!-- Modal inner -->
    <div @click.away="currentDate = null"
        class="w-full max-w-3xl px-6 py-4 mx-auto text-left bg-gray-800 rounded shadow-lg"
        x-transition:enter="motion-safe:ease-out duration-600 transform"
        x-transition:enter-start="opacity-0 scale-80 -translate-x-full"
        x-transition:enter-end="opacity-100 scale-100 translate-x-0"
        x-transition:leave="motion-safe:ease-out duration-600 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-x-0"
        x-transition:leave-end="opacity-0 scale-80 -translate-x-full">
        <!-- Title / Close-->
        <div class="flex items-center justify-between pb-2 mb-4 border-b border-gray-700"
            x-on:mousedown="initialPosition = { x: $event.clientX - parseInt(getComputedStyle($refs.handle).left), y: $event.clientY - parseInt(getComputedStyle($refs.handle).top) }; isDragging = true;"
            x-ref="handle" style="cursor:move">
            <h5 class="mr-3 text-2xl font-bold text-white max-w-none" x-text="currentDate"></h5>
            <button type="button" class="z-50 text-white cursor-pointer" @click="currentDate = null">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div>
            <form class="text-gray-800" action="/events" method="POST">
                @csrf
                <input type="hidden" name="event_date" x-model="currentDate" />
                <div class="grid grid-cols-2 my-2 space-x-4">
                    <div>
                        <label class="font-bold text-white" for="event_start">Začetek dela</label>
                        <br>
                        <div class="py-2 mt-2 text-gray-100 bg-transparent rounded-lg">
                            <div class="flex">
                                <select id="event_hours_start" name="event_hours_start"
                                    class="text-xl bg-transparent border border-gray-400 rounded-lg appearance-none">
                                    @foreach (range(0, 23) as $item)
                                    <option class="bg-gray-700" value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="p-2 text-xl">:</span>
                                <select id="event_minutes_start" name="event_minutes_start"
                                    class="text-xl bg-transparent border border-gray-400 rounded-lg appearance-none">
                                    <option class="bg-gray-700" value="00">00</option>
                                    <option class="bg-gray-700" value="15">15</option>
                                    <option class="bg-gray-700" value="30">30</option>
                                    <option class="bg-gray-700" value="45">45</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="font-bold text-white" for="event_start">Konec dela</label>
                        <br>
                        <div id="end-time-tooltip" class="hidden mt-1 text-sm text-red-500">End time must be greater
                            than
                            start time.</div>

                        <div class="py-2 mt-2 text-gray-100 bg-transparent rounded-lg">
                            <div class="flex">
                                <select id="event_hours_end" name="event_hours_end"
                                    class="text-xl bg-transparent border border-gray-400 rounded-lg appearance-none">
                                    @foreach (range(0, 23) as $item)
                                    <option class="bg-gray-700" value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="p-2 text-xl">:</span>
                                <select id="event_minutes_end" name="event_minutes_end"
                                    class="text-xl bg-transparent border border-gray-400 rounded-lg appearance-none">
                                    <option class="bg-gray-700" value="00">00</option>
                                    <option class="bg-gray-700" value="15">15</option>
                                    <option class="bg-gray-700" value="30">30</option>
                                    <option class="bg-gray-700" value="45">45</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                @livewire('event-dropdowns')
                <input id="submit-button"
                    class="p-4 my-2 text-sm text-white bg-green-600 rounded-md hover:bg-green-500 min-w-32"
                    type="submit" value="Potrdi vnos">
            </form>
        </div>
    </div>
</div>
</div>
<script>
    function checkEndTime() {
        const eventHoursStart = document.getElementById('event_hours_start');
        const eventMinutesStart = document.getElementById('event_minutes_start');
        const eventHoursEnd = document.getElementById('event_hours_end');
        const eventMinutesEnd = document.getElementById('event_minutes_end');
        const tooltip = document.getElementById('end-time-tooltip');
        const submitButton = document.getElementById('submit-button');

        const startTime = parseInt(eventHoursStart.value) * 60 + parseInt(eventMinutesStart.value);
        const endTime = parseInt(eventHoursEnd.value) * 60 + parseInt(eventMinutesEnd.value);

        if (endTime <= startTime) {
            tooltip.classList.remove('hidden');
            submitButton.disabled = true;
        } else {
            tooltip.classList.add('hidden');
            submitButton.disabled = false;
        }
    }

    document.getElementById('event_hours_start').addEventListener('change', checkEndTime);
    document.getElementById('event_minutes_start').addEventListener('change', checkEndTime);
    document.getElementById('event_hours_end').addEventListener('change', checkEndTime);
    document.getElementById('event_minutes_end').addEventListener('change', checkEndTime);
</script>
