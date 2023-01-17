  <x-app-layout>
    <main class="max-w-7xl px-8 mx-auto my-12 pb-12">
        <div class="flex flex-nowrap overflow-x-auto scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-100 scrollbar-thin border-gray-400 border divide-x">
            @foreach ($calendar as $key => $value)
                <div class="bg-white bg-opacity-10">
                    <span class="text-2xl block font-bold p-2 text-white">{{ date("F", mktime(0, 0, 0, $key, 1)) }}</span>
                    <div class="flex flex-nowrap h-96 divide-x divide-gray-400 border-t border-gray-400">
                        @forelse ($value as $day)
                            <div class="w-8 px-1 text-center text-gray-100 @if(Carbon::parse($day)->isWeekend()) bg-gray-100 bg-opacity-20 @endif">
                                <span class="text-xs">{{ substr($day->translatedFormat("D"),0,3) }}</span> <br>
                                {{ $day->format("d") }}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</x-app-layout>
