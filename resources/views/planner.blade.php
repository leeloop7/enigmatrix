  <x-app-layout>
    <div class="hidden w-8 w-16 w-24 w-32 w-40 w-48 w-56 w-64 w-72 w-80 w-88 w-96 mt-8 mt-24 mt-36 mt-40 mt-52 mt-56 mt-68 mt-72 mt-88 bg-blue-700 bg-gray-600 bg-gray-700 bg-yellow-600 bg-red-900 bg-green-500"></div>
    <main class="max-w-7xl px-8 mx-auto my-12 pb-12 mt-20">
        <div class="flex flex-nowrap overflow-x-auto scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-100 scrollbar-thin border-gray-400 border divide-x">
            @foreach ($calendar as $key => $value)
                <div class="bg-white bg-opacity-10">
                    <span class="text-2xl block font-bold p-2 text-white">{{ date("F", mktime(0, 0, 0, $key, 1)) }}</span>
                    <div class="flex flex-nowrap h-128 divide-x divide-gray-400 border-t border-gray-400">
                        @forelse ($value as $day)
                            <div class="w-8 px-1 text-center text-gray-100 @if(Carbon::parse($day)->isWeekend()) bg-gray-100 bg-opacity-20 @elseif(Carbon::parse($day)->isToday()) bg-pink-500 bg-opacity-40 @endif">
                                <span class="text-xs">{{ substr($day->translatedFormat("D"),0,3) }}</span> <br>
                                {{ $day->format("d") }}
                                <br>
                                @foreach ($projects as $project)
                                    <!-- @if(date('Y-m-d', strtotime($project->montage_start)) == $day->format("Y-m-d"))
                                    <div class="bg-green-500 z-30 relative w-{{($project->montage+1)*8}} pt-0 px-1 h-2 mt-{{($project->position)+12}} -ml-1 my-4 font-bold text-xl text-left">

                                    </div>
                                    @endif -->
                                    @if(date('Y-m-d', strtotime($project->start_date)) == $day->format("Y-m-d"))
                                    <div class="bg-{{ $project->color }} z-30 relative w-{{($project->length+1)*8}} pt-0 px-1 h-12 -ml-1 my-4 mt-{{$project->position}} font-bold text-xl text-left">
                                        {{ $project->location }} <br>
                                        <div class="flex flex-nowrap mx-auto text-center">
                                            @foreach ($project->customers as $customer)
                                                <span class="text-xs leading-3 whitespace-nowrap mr-2">{{ $customer->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <!-- @if(date('Y-m-d', strtotime($project->demontage_start)) == $day->format("Y-m-d"))
                                    <div class="bg-green-500 z-30 relative w-{{($project->demontage+1)*8}} pt-0 px-1 h-2 mt-{{($project->position)+12}} -ml-1 my-4 font-bold text-xl text-left">

                                    </div>
                                    @endif -->
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script>
    $( "div.scrollbar" ).scrollLeft( {{$diff}} * 12 );
</script>
