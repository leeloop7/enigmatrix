<div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-gray-900 bg-opacity-70"
    x-show="showModal">
        <!-- Modal inner -->
        <div
        @click.away="showModal = false"
        class="max-w-3xl w-full px-6 py-4 mx-auto text-left bg-gray-800 rounded shadow-lg"
        x-transition:enter="motion-safe:ease-out duration-600"
        x-transition:enter-start="opacity-0 scale-80"
        x-transition:enter-end="opacity-100 scale-100">
                <!-- Title / Close-->
            <div class="flex items-center justify-between border-b border-gray-700 mb-4">
                <h5 class="mr-3 text-white font-bold text-2xl max-w-none">{{ $key }}</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
            </div>
            <form class="text-gray-800"
            action="/events"
            method="POST">
            <input type="hidden" name="event_date" placeholder="vpiši datum" value="{{ $key }}" required>
            @csrf
            <div class="grid grid-cols-2 space-x-4 my-2">
                <div>
                <label
                class="text-white font-bold"
                for="event_start">Začetek dela</label>
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
                                <option class="bg-gray-700" value="15">15</option>
                                <option class="bg-gray-700" value="30">30</option>
                                <option class="bg-gray-700" value="045">45</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                <label class="text-white font-bold"
                        for="event_start">Konec dela</label><br>
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
                                    <option class="bg-gray-700" value="045">45</option>
                                </select>
                            </div>
                        </div>
                </div>

            </div>
            <div class="grid grid-cols-2 space-x-4 my-2">
                <div>
                    <label class="text-white font-bold mt-4"
                        for="event_theme">Izberi lokacijo dela</label><br>
                    <select name="event_theme"
                        class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm" required>
                        <option selected disabled>Izberi temo</option>
                        @foreach($jobs as $job)
                            <option class="bg-gray-700" value="{{ $job->id }}">{{ $job->name }}</option>
                        @endforeach
                    </select>
                    <label class="text-white font-bold mt-4"
                        for="event_theme">Izberi stranko</label><br>
                    <select name="event_customer"
                        class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
                        <option selected disabled>Izberi stranko</option>
                        @foreach($customers as $customer)
                            <option class="bg-gray-700" value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <label class="text-white font-bold mt-4"
                        for="event_theme">Vrsta dela</label><br>
                    <select name="event_jobdesc"
                        class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
                        <option selected disabled>Izberi vrsto dela</option>
                        @foreach($jobDescriptions as $jobDescription)
                            <option class="bg-gray-700" value="{{ $jobDescription->id }}">{{ $jobDescription->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-white font-bold"
                        for="event_desc">Opombe</label><br>
                <textarea type="text"
                    rows="4"
                    name="event_desc"
                    placeholder="Opis dela"
                    class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm"
                    required></textarea>
                </div>
            </div>


            <input class="bg-green-600 hover:bg-green-500 rounded-md text-white text-sm p-4 min-w-32 my-2"
                    type="submit"
                    value="Potrdi vnos">
            </form>
        </div>
    </div>
