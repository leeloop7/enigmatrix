<!-- Modal inner -->
<div @click.away="currentDate = null" class="max-w-3xl w-full px-6 py-4 mx-auto text-left bg-gray-800 rounded shadow-lg" x-transition:enter="motion-safe:ease-out duration-600" x-transition:enter-start="opacity-0 scale-80" x-transition:enter-end="opacity-100 scale-100">
    <!-- Title / Close-->
    <div class="flex items-center justify-between border-b border-gray-700 mb-4 pb-2">
      <h5 class="mr-3 text-white font-bold text-2xl max-w-none" x-text="currentDate"></h5>

      <button type="button" class="z-50 cursor-pointer text-white" @click="currentDate = null">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div>
        <form class="text-gray-800" action="/events" method="POST">
            @csrf
            <input type="hidden" name="event_date" x-model="currentDate" />
            <div class="grid grid-cols-2 space-x-4 my-2">
                <div>
                    <label class="text-white font-bold" for="event_start">Začetek dela</label>
                    <div class="mt-2 py-2 bg-transparent rounded-lg text-gray-100">
                        <div class="flex">
                        <select id="event_hours_start" name="event_hours_start" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
                            @foreach (range(00, 23) as $item) {
                            <option class="bg-gray-700" value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <span class="text-xl p-2">:</span>
                        <select id="event_minutes_start" name="event_minutes_start" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
                            <option class="bg-gray-700" value="00">00</option>
                            <option class="bg-gray-700" value="15">15</option>
                            <option class="bg-gray-700" value="30">30</option>
                            <option class="bg-gray-700" value="45">45</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div>
                <label class="text-white font-bold" for="event_start">Konec dela</label><br>
                <div id="end-time-tooltip" class="hidden text-red-500 text-sm mt-1">End time must be greater than start time.</div>

                <div class="mt-2 py-2 bg-transparent rounded-lg text-gray-100">
                    <div class="flex">
                    <select id="event_hours_end" name="event_hours_end" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
                        @foreach (range(00, 23) as $item) {
                        <option class="bg-gray-700" value="{{ sprintf('%02d', $item) }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <span class="text-xl p-2">:</span>
                    <select id="event_minutes_end" name="event_minutes_end" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
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
            <input id="submit-button" class="bg-green-600 hover:bg-green-500 rounded-md text-white text-sm p-4 min-w-32 my-2" type="submit" value="Potrdi vnos">
        </form>
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

