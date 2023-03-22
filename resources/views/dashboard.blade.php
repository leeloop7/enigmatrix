<x-app-layout>

  <!-- Statistic line one -->
  <div class="max-w-7xl mx-auto p-8">
    @include('dashboard.statistic-line-one', ["currentDate" => $currentDate])
  </div>


  <div class="max-w-7xl mx-auto px-8 gap-5" x-data="{ currentDate: null }">
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-white bg-opacity-10" x-show="!!currentDate" x-cloak x-draggable>
        @include('dashboard.create-event')
      <table class="overflow-x-auto w-full text-sm text-white mb-24">
        <thead class="bg-white bg-opacity-10 text-xs uppercase font-medium">
          <tr>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              Datum
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              ZAČETEK
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              KONEC
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              SKUPAJ
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              VRSTA
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              PROJEKT
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              STRANKA
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              OPIS
            </th>
            <th scope="col" class="px-2 md:px-4 py-3 text-left tracking-wider">
              UREJANJE
            </th>
          </tr>
        </thead>

        <tbody class="bg-white bg-opacity-10">
          @foreach ($dates as $key => $value)

          @forelse ($value as $event)
          <tr  @if(Carbon::parse($key)->isToday()) id="today" @endif class="@if($loop->parent->odd) bg-black bg-opacity-10 @endif hover:bg-white hover:bg-opacity-20 @if(Carbon::parse($key)->isToday()) bg-pink-500 bg-opacity-50 @endif">
            @if ($loop->first)
            <td class="px-2 md:px-4 py-2 font-bold whitespace-nowrapm border-l-4 border-transparent @if(Carbon::parse($key)->isWeekend()) border-red-600 @endif">
                {{ Carbon::parse($key)->translatedFormat("d.m. l") }}
            </td>
            @else
            <td></td>
            @endif
            <td class="px-2 md:px-4 py-2 whitespace-nowrap">
              @if($event->event_theme != '5' and $event->event_theme != '6')
                {{ Carbon::parse($event->event_start)->format("H:i") }}
              @else
              00:00
              @endif
            </td>
            <td class="px-2 md:px-4 py-2 whitespace-nowrap">
              @if($event->event_theme != '5' and $event->event_theme != '6')
                {{ Carbon::parse($event->event_end)->format("H:i") }}
              @else
              00:00
              @endif
            </td>
            <td class="px-2 md:px-4 py-2 whitespace-nowrap">
              {{ date("H:i", $event->event_difference) }}
            </td>
            <td class="px-2 md:px-4 py-2 whitespace-nowrap">
              <span class="@if($event->event_theme == '5')bg-blue-200 text-blue-800 @elseif($event->event_theme == '6' or $event->event_theme == '7') bg-blue-200 text-blue-800 @elseif($event->event_theme == '2') bg-red-200 text-red-800 @else bg-green-200 text-green-800 @endif mr-1 rounded-md text-xs  bg-opacity-70 p-1"><span class="hidden md:inline font-bold">{{ $event->job->name }}</span></span>
            </td>
            <td>
                {{ $event->project->name }}
              </td>
            <td>
              {{ $event->customer->name }}
            </td>
            <td class="px-2 md:px-4 py-2 whitespace-nowrap">
              {{ \Illuminate\Support\Str::limit($event->event_desc, 25, $end='...') }}
            </td>
            <td class="px-2 md:px-4 py-2 grid grid-cols-4 whitespace-nowrap items-center">
              <!-- <i class="fa-solid text-white fa-pen-to-square"></i> -->
              @if ($loop->last)
              <i @click="currentDate = '{{ $key }}'" class="fa-solid mr-2 text-white hover:text-gray-900 cursor-pointer fa-plus"></i>
              @endif
              <form method="POST" action="/events/{{ $event->id }}">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Ste prepričani, da želite izbrisati dogodek?')"><i class="fa-solid pr-2 text-white hover:text-gray-900 fa-trash"></i></button>
              </form>
              <a href="{{ route('events.edit', $event->id) }}">
            <i class="fa-sharp text-white hover:text-gray-900 fa-solid mr-2 fa-pen-to-square"></i>
        </a>

            </td>
          </tr>
          @empty
          <tr @if(Carbon::parse($key)->isToday()) id="today" @endif class="@if($loop->odd) bg-black bg-opacity-10 @endif hover:bg-white hover:bg-opacity-20">
            <td class="px-2 md:px-4 py-2 font-bold whitespace-nowrapm border-l-4 border-transparent @if(Carbon::parse($key)->isWeekend()) border-red-600 @endif">
                {{ Carbon::parse($key)->translatedFormat("d.m. l") }}
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="px-2 md:px-4 py-2 grid grid-cols-4 whitespace-nowrap">
              <i @click="currentDate = '{{ $key }}'" class="fa-solid text-white cursor-pointer fa-plus"></i>
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
