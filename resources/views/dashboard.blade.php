<x-app-layout>

    <!-- Statistic line one -->
    <div class="p-8 mx-auto max-w-7xl">
        @include('dashboard.statistic-line-one', ["currentDate" => $currentDate])
    </div>

    <div class="gap-5 px-8 mx-auto max-w-7xl" x-data="{ currentDate: null }">
        <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-white bg-opacity-10"
            x-show="!!currentDate">
            @include('dashboard.create-event')
            <table class="w-full mb-24 overflow-x-auto text-sm text-white">
                <thead class="text-xs font-medium uppercase bg-white bg-opacity-10">
                    <tr>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            Datum
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            ZAČETEK
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            KONEC
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            SKUPAJ
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            VRSTA
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            PROJEKT
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            STRANKA
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            OPIS
                        </th>
                        <th scope="col" class="px-2 py-3 tracking-wider text-left md:px-4">
                            UREJANJE
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white bg-opacity-10">
                    @foreach ($dates as $key => $value)

                    @forelse ($value as $event)
                    <tr @if(Carbon::parse($key)->isToday()) id="today" @endif class="@if($loop->parent->odd) bg-black
                        bg-opacity-10 @endif hover:bg-white hover:bg-opacity-20 @if(Carbon::parse($key)->isToday())
                        bg-pink-500 bg-opacity-50 @endif">
                        @if ($loop->first)
                        <td
                            class="px-2 md:px-4 py-2 font-bold whitespace-nowrapm border-l-4 border-transparent @if(Carbon::parse($key)->isWeekend()) border-red-600 @endif">
                            {{ Carbon::parse($key)->translatedFormat("d.m. l") }}
                        </td>
                        @else
                        <td></td>
                        @endif
                        <td class="px-2 py-2 md:px-4 whitespace-nowrap">
                            @if($event->event_theme != '5' and $event->event_theme != '6')
                            {{ Carbon::parse($event->event_start)->format("H:i") }}
                            @else
                            00:00
                            @endif
                        </td>
                        <td class="px-2 py-2 md:px-4 whitespace-nowrap">
                            @if($event->event_theme != '5' and $event->event_theme != '6')
                            {{ Carbon::parse($event->event_end)->format("H:i") }}
                            @else
                            00:00
                            @endif
                        </td>
                        <td class="px-2 py-2 md:px-4 whitespace-nowrap">
                            {{ date("H:i", $event->event_difference) }}
                        </td>
                        <td class="px-2 py-2 md:px-4 whitespace-nowrap">
                            <span
                                class="@if($event->event_theme == '5')bg-blue-200 text-blue-800 @elseif($event->event_theme == '6' or $event->event_theme == '7') bg-blue-200 text-blue-800 @elseif($event->event_theme == '2') bg-red-200 text-red-800 @else bg-green-200 text-green-800 @endif mr-1 rounded-md text-xs  bg-opacity-70 p-1"><span
                                    class="hidden font-bold md:inline">{{ $event->job->name }}</span></span>
                        </td>
                        <td>
                            {{ $event->project->name }}
                        </td>
                        <td>
                            {{ $event->customer->name }}
                        </td>
                        <td class="px-2 py-2 md:px-4 whitespace-nowrap">
                            {{ \Illuminate\Support\Str::limit($event->event_desc, 25, $end='...') }}
                        </td>
                        <td class="grid items-center grid-cols-4 px-2 py-2 md:px-4 whitespace-nowrap">
                            <!-- <i class="text-white fa-solid fa-pen-to-square"></i> -->
                            @if ($loop->last)
                            <i @click="currentDate = '{{ $key }}'"
                                class="mr-2 text-white cursor-pointer fa-solid hover:text-gray-900 fa-plus"></i>
                            @endif
                            <form method="POST" action="/events/{{ $event->id }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Ste prepričani, da želite izbrisati dogodek?')"><i
                                        class="pr-2 text-white fa-solid hover:text-gray-900 fa-trash"></i></button>
                            </form>
                            <a href="{{ route('events.edit', $event->id) }}">
                                <i class="mr-2 text-white fa-sharp hover:text-gray-900 fa-solid fa-pen-to-square"></i>
                            </a>

                        </td>
                    </tr>
                    @empty
                    <tr @if(Carbon::parse($key)->isToday()) id="today" @endif class="@if($loop->odd) bg-black
                        bg-opacity-10 @endif hover:bg-white hover:bg-opacity-20">
                        <td
                            class="px-2 md:px-4 py-2 font-bold whitespace-nowrapm border-l-4 border-transparent @if(Carbon::parse($key)->isWeekend()) border-red-600 @endif">
                            {{ Carbon::parse($key)->translatedFormat("d.m. l") }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="grid grid-cols-4 px-2 py-2 md:px-4 whitespace-nowrap">
                            <i @click="currentDate = '{{ $key }}'"
                                class="text-white cursor-pointer fa-solid fa-plus"></i>
                        </td>
                    </tr>
                    @endforelse
                    @endforeach
                </tbody>
            </table>
        </div>


</x-app-layout>
<script>
    // Find the row for today's date
    const todayRow = document.getElementById('today');

    // Scroll the page to the top of the row
    if (todayRow) {
        todayRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
</script>
