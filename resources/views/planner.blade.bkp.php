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
                                @if($day->format("d") >= '8' and $day->format("d") <= '8')
                                <div class="bg-gray-700 z-50 relative w-8 py-2 -ml-1 my-4"></div>
                                @endif
                                @if($day->format("d") >= '9' and $day->format("d") <= '9')
                                <div x-data="{ tooltip: false }"
                                x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                                class="bg-green-600 z-50 relative w-40 py-0 -ml-1 my-4 font-bold">3
                                    <div x-show="tooltip"
                                        class="text-sm text-white absolute bottom-1 bg-gray-900 bg-opacity-80 rounded-lg p-2
                                transform -translate-y-8 translate-x-8 w-40">
                                    <ul>
                                        <li class="text-yellow-500">Nik Štaudohar</li>
                                        <li>Peter Klepec</li>
                                        <li>Tone Stanko</li>
                                    </ul>
                                    </div>
                                </div>
                                @endif
                                @if($day->format("d") >= '14' and $day->format("d") <= '14')
                                <div class="bg-gray-700 z-50 relative w-8 py-2 -ml-1 my-4"></div>
                                @endif
                                @if($day->format("d") >= '14' and $day->format("d") <= '14')
                                <div class="bg-blue-700 z-30 relative w-64 py-4 -ml-1 -mt-8 my-4 font-bold text-xl">Stuttgart</div>
                                @endif
                                @if($day->format("d") >= '21' and $day->format("d") <= '21')
                                <div class="bg-gray-700 z-50 relative w-8 py-2 -ml-1 my-4"></div>
                                @endif
                                @if($day->format("d") >= '22' and $day->format("d") <= '22')
                                <div x-data="{ tooltip: false }"
                                x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                                 class="bg-green-600 z-50 relative w-20 py-0 -ml-1 my-4 font-bold">3
                                    <div x-show="tooltip"
                                    class="text-sm text-white absolute bottom-1 bg-gray-900 bg-opacity-80 rounded-lg p-2
                            transform -translate-y-8 translate-x-8 w-40">
                                    <ul>
                                        <li class="text-yellow-500">Nik Štaudohar</li>
                                        <li>Peter Klepec</li>
                                        <li>Tone Stanko</li>
                                    </ul>
                                    </div>
                                </div>
                                @endif
                                @if($day->format("d") >= '24' and $day->format("d") <= '24')
                                <div class="bg-gray-700 z-50 relative w-8 ml-3 py-2 my-4"></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</x-app-layout>
