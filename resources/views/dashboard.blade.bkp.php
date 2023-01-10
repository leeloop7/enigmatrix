<x-app-layout>

    <!-- Statistic line one -->
    <div class="max-w-7xl mx-auto p-8">
        @include('dashboard.statistic-line-one')
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-3 px-8 gap-5">
        <div class="bg-white rounded-md py-4 col-span-3 md:col-span-2">
            <div class="px-4 mb-4 text-xl font-bold">Dnevna poročila</div>
            <div class="bg-gray-50 text-gray-500 font-bold text-xs my-1 grid grid-cols-5 md:grid-cols-10 px-4 py-4 items-center">
                <div>DATUM</div>
                <div>PRIHOD</div>
                <div>ODHOD</div>
                <div class="hidden md:flex">SKUPAJ</div>
                <div class="col-span-1 md:col-span-2">LOKACIJA</div>
                <div class="col-span-3 hidden md:flex">OPIS DELA</div>
                <div>UREJANJE</div>
            </div>

            @foreach ($dates as $key => $value)
            <div x-data="{ 'showModal': false }" @keydown.escape="{ 'showModal': false }" class="
                hover:bg-gray-300 text-gray-500 mb-1 grid grid-cols-5 md:grid-cols-10 text-xs px-4 py-1 items-center">
                <div class="font-black">
                    <span class="@if(\Carbon\Carbon::parse($key)->isWeekend()) bg-red-300 pl-1 py-1 @endif">{{ date("d.m.", strtotime($key)) }}</span>
                </div>
                @forelse ($value as $event)
                @if ($loop->first)

                @else
                <div></div>
                @endif
                <div>
                    @if($event->event_theme != '5' and $event->event_theme != '6')
                    {{ date('H:i', strtotime($event->event_start)) }}
                    @else
                    00:00
                    @endif
                </div>
                <div>
                    @if($event->event_theme != '5' and $event->event_theme != '6')
                    {{ date('H:i', strtotime($event->event_end)) }}
                    @else
                    00:00
                    @endif
                </div>
                <div class="hidden md:flex">
                    {{ date("H:i", $event->event_difference) }}
                </div>
                <div class="col-span-1 md:col-span-2"><i class="fas fa-circle text-xs @if($event->event_theme == '5')text-blue-500 @elseif($event->event_theme == '6') text-red-500 @else text-green-500 @endif mr-1"></i> <span class="hidden md:inline">{{ $event->job->name }}</span></div>
                <div class="hidden md:flex col-span-2">
                    {{ \Illuminate\Support\Str::limit($event->event_desc, 25, $end='...') }}
                </div>
                <div class="grid grid-cols-4 col-span-2">
                    <div class=" mb-1 bg-blue-500 aspect-square w-6 text-center py-1 cursor-pointer hover:bg-blue-300 text-white"><i class="fa-solid fa-pen-to-square"></i></div>
                    @if ($loop->first)
                    <div class="bg-yellow-500 aspect-square w-6 text-center py-1 cursor-pointer hover:bg-yellow-300 text-white"><i class="fa-solid fa-info"></i></div>
                    <div class="bg-green-500 aspect-square w-6 text-center py-1 cursor-pointer hover:bg-green-300 text-white"><i @click="showModal = true" class="fa-solid cursor-pointer fa-plus"></i></div>
                    @endif
                    <div class="bg-red-500 aspect-square w-6 text-center py-1 cursor-pointer hover:bg-red-300 text-white"><i class="fa-solid fa-xmark"></i></div>
                </div>
                @empty
                <div></div>
                <div></div>
                <div class="hidden md:flex"></div>
                <div class="col-span-2"></div>
                <div class="col-span-2 hidden md:flex"></div>
                <div class="bg-green-500 aspect-square w-6 text-center py-1 cursor-pointer hover:bg-green-300 text-white"><i @click="showModal = true" class="fa-solid fa-plus"></i></div>
                @endforelse

                <!-- Create event - Modal popup -->
                @include('dashboard.create-event')

            </div>
            @endforeach
        </div>
        <div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-gray-400">
                        Nadure (za interne potrebe)
                        <dd class="mt-1 text-2xl font-semibold tracking-tight text-gray-900">{{ $overHours }}</dd>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-yellow-500">
                            <i class="w-auto fa-solid fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white px-4 rounded-md col-span-1 py-4 my-8">
                <div class="px-4 mb-4 text-xl font-bold">Graf meseca</div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Delovnih dni', 'Dopust', 'Bolniška'],
            datasets: [{
                label: 'Število dni',
                data: [{
                    {
                        $totalWorkingDays
                    }
                }, {
                    {
                        $timeOffs
                    }
                }, {
                    {
                        $sickDays
                    }
                }],
                backgroundColor: [
                    'rgb(37, 197, 95)',
                    'rgb(60, 130, 246)',
                    'rgb(240, 69, 69)'
                ],
                borderWidth: 3
            }]
        },
        options: {
            scales: {

            }
        }
    });
</script>
