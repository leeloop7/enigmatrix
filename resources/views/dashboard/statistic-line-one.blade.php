
<div class="flex items-center">
    <a href="?year={{$currentDate->month === 1 ? $currentDate->year - 1 : $currentDate->year}}&month={{$currentDate->month === 1 ? 12 : $currentDate->month - 1}}" class="bg-white/10 shadow p-2 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </a>
    <a href="?year={{$currentDate->month === 12 ? $currentDate->year + 1 : $currentDate->year}}&month={{$currentDate->month === 12 ? 1 : $currentDate->month + 1}}" class="bg-white/10 shadow p-2 rounded ml-2">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
      </svg>
    </a>
    <h3 class="text-2xl font-medium leading-6 dark:text-gray-200 text-white ml-4"><i class="fa-solid fa-calendar-star mr-2"></i>{{ $currentDate->format("M") }} {{ $currentDate->year }}</h3>
</div>

    <dl class="mt-5 grid grid-cols-2 gap-5 sm:grid-cols-4">
      <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                Ure skupaj
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $workingSeconds / 3600 }}</dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-600">
                    <i class="w-auto fa-solid fa-chart-line"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-xs">
                    <span class="font-bold bg-green-500 p-1 rounded-md">{{ number_format($workingSecondsLunch / 3600, 2, '.', ',') }}</span>&nbsp; upoštevajoč 30min malice
                </div>
      </div>
      <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                Delovnih dni
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $totalWorkingDays }}</dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-500">
                    <i class="fa-solid fa-person-digging"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-xs">
            <span class="font-bold bg-green-500 p-1 rounded-md">{{ number_format($totalWorkingDaysProcents, 2, '.', ',') }} %</span>&nbsp; od celote
        </div>
    </div>
    <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                + oz - ure
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">
                    @if ($totalWorkingDays == 0)
                    0
                    @else
                        {{ ($totalWorkingDays * 8 > $workingSeconds / 3600) ? '-' : '' }}{{ abs($totalWorkingDays * 8 - ($workingSeconds / 3600)) }}
                    @endif
                </dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-xs">
            <span class="font-bold bg-pink-500 p-1 rounded-md">
            @if ($totalWorkingDays == 0)
                0
            @else
                 {{ ($totalWorkingDays * 8 > $workingSecondsLunch / 3600) ? '-' : '' }}{{ number_format(abs($totalWorkingDays * 8 - ($workingSecondsLunch / 3600)), 2) }}

            @endif
            </span>&nbsp; upoštevajoč 30min malice
        </div>
    </div>
    </dl>
    <dl class="mt-5 grid grid-cols-2 gap-5 sm:grid-cols-4">
    <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                Dopust (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $timeOffs }}</dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                    <i class="fa-solid fa-umbrella-beach"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-xs">
            <span class="bg-blue-500 p-1 rounded-md font-bold">{{ number_format($timeOffsProcents, 2, '.', ',') }} %</span>&nbsp; od celote
        </div>
    </div>
    <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                Bolniška (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $sickDays }}</dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-teal-300">
                    <i class="fa-regular fa-face-thermometer"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-xs">
            <span class="bg-teal-300 p-1 rounded-md font-bold">{{ number_format($sickDaysProcents, 2, '.', ',') }} %</span>&nbsp; od celote
        </div>
    </div>
    <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                Nega (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $kidsDays }}</dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-teal-300">
                    <i class="fa-regular fa-face-thermometer"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-xs">
            <span class="bg-teal-300 p-1 rounded-md font-bold">{{ number_format($kidsDaysProcents, 2, '.', ',') }} %</span>&nbsp; od celote
        </div>
    </div>
    <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                Prazniki (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $holidays }}</dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-fuchsia-400">
                    <i class="fa-regular fa-face-thermometer"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-xs">
            <span class="bg-fuchsia-400 p-1 rounded-md font-bold">{{ number_format($holidaysProcents, 2, '.', ',') }} %</span>&nbsp; od celote
        </div>
    </div>


</dl>
