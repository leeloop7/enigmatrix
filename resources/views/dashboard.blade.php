<x-app-layout>

  <!-- Statistic line one -->
  <div class="max-w-7xl mx-auto p-8">
    @include('dashboard.statistic-line-one')
  </div>


  <div class="max-w-7xl mx-auto px-8 gap-5" x-data="{ currentDate: null }">
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-white bg-opacity-10" x-show="!!currentDate" x-cloak>
        @include('dashboard.create-event')
      <table class="overflow-x-auto w-full text-sm text-white mb-24">
        <thead class="bg-white bg-opacity-10 text-xs uppercase font-medium">
          <tr>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              Datum
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              PRIHOD
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              ODHOD
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              SKUPAJ
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              VRSTA
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              PROJEKT
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              STRANKA
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              OPIS
            </th>
            <th scope="col" class="px-4 py-3 text-left tracking-wider">
              UREJANJE
            </th>
          </tr>
        </thead>

        <tbody class="bg-white bg-opacity-10">
          @foreach ($dates as $key => $value)

          @forelse ($value as $event)
          <tr class="@if($loop->parent->odd) bg-black bg-opacity-10 @endif hover:bg-white hover:bg-opacity-20">
            @if ($loop->first)
            <td class="px-4 py-2 font-bold whitespace-nowrapm border-l-4 border-transparent @if(Carbon::parse($key)->isWeekend()) border-red-600 @endif">
                {{ Carbon::parse($key)->translatedFormat("d.m. l") }}
            </td>
            @else
            <td></td>
            @endif
            <td class="px-4 py-2 whitespace-nowrap">
              @if($event->event_theme != '5' and $event->event_theme != '6')
                {{ Carbon::parse($event->event_start)->format("H:i") }}
              @else
              00:00
              @endif
            </td>
            <td class="px-4 py-2 whitespace-nowrap">
              @if($event->event_theme != '5' and $event->event_theme != '6')
                {{ Carbon::parse($event->event_end)->format("H:i") }}
              @else
              00:00
              @endif
            </td>
            <td class="px-4 py-2 whitespace-nowrap">
              {{ date("H:i", $event->event_difference) }}
            </td>
            <td class="px-4 py-2 whitespace-nowrap">
              <i class="fas fa-circle text-xs @if($event->event_theme == '5')text-blue-500 @elseif($event->event_theme == '6') text-teal-300 @else text-green-500 @endif mr-1"></i> <span class="hidden md:inline">{{ $event->job->name }}</span>
            </td>
            <td>
                {{ $event->project->name }}
              </td>
            <td>
              {{ $event->customer->name }}
            </td>
            <td class="px-4 py-2 whitespace-nowrap">
              {{ \Illuminate\Support\Str::limit($event->event_desc, 25, $end='...') }}
            </td>
            <td class="px-4 py-2 grid grid-cols-4 whitespace-nowrap items-center">
              <!-- <i class="fa-solid text-white fa-pen-to-square"></i> -->
              @if ($loop->first)
              <i @click="currentDate = '{{ $key }}'" class="fa-solid text-white hover:text-gray-900 cursor-pointer fa-plus"></i>
              @endif
              <form method="POST" action="/events/{{ $event->id }}">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Ste prepričani, da želite izbrisati dogodek?')"><i class="fa-solid text-white hover:text-gray-900 fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr class="@if($loop->odd) bg-black bg-opacity-10 @endif hover:bg-white hover:bg-opacity-20">
            <td class="px-4 py-2 font-bold whitespace-nowrapm border-l-4 border-transparent @if(Carbon::parse($key)->isWeekend()) border-red-600 @endif">
                {{ Carbon::parse($key)->translatedFormat("d.m. l") }}
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="px-4 py-2 grid grid-cols-4 whitespace-nowrap">
              <i @click="currentDate = '{{ $key }}'" class="fa-solid text-white cursor-pointer fa-plus"></i>
            </td>
          </tr>
          @endforelse
          @endforeach
        </tbody>
      </table>
  </div>


</x-app-layout>
