<div>
    <form class="text-gray-800" action="/events" method="POST">
        @csrf
        <div class="grid grid-cols-2 space-x-4 my-2">
            <div>
                <label class="text-white font-bold" for="event_start">Začetek dela</label>
                <div class="mt-2 py-2 bg-transparent rounded-lg text-gray-100">
                    <div class="flex">
                    <select name="event_hours_start" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
                        @foreach (range(00, 23) as $item) {
                        <option class="bg-gray-700" value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <span class="text-xl p-2">:</span>
                    <select name="event_minutes_start" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
                        <option class="bg-gray-700" value="00">00</option>
                        <option class="bg-gray-700" value="15">15</option>2
                        <option class="bg-gray-700" value="30">30</option>
                        <option class="bg-gray-700" value="45">45</option>
                    </select>
                    </div>
                </div>
            </div>
            <div>
            <label class="text-white font-bold" for="event_start">Konec dela</label><br>
            <div class="mt-2 py-2 bg-transparent rounded-lg text-gray-100">
                <div class="flex">
                <select name="event_hours_end" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
                    @foreach (range(00, 23) as $item) {
                    <option class="bg-gray-700" value="{{ sprintf('%02d', $item) }}">{{ $item }}</option>
                    @endforeach
                </select>
                <span class="text-xl p-2">:</span>
                <select name="event_minutes_end" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
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
        <input class="bg-green-600 hover:bg-green-500 rounded-md text-white text-sm p-4 min-w-32 my-2" type="submit" value="Potrdi vnos">
    </form>
</div>
