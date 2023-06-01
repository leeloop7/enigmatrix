<div class="flex items-center">
    <a href="?year={{$currentDate->month === 1 ? $currentDate->year - 1 : $currentDate->year}}&month={{$currentDate->month === 1 ? 12 : $currentDate->month - 1}}"
        class="p-2 rounded shadow bg-white/10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 h-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </a>
    <a href="?year={{$currentDate->month === 12 ? $currentDate->year + 1 : $currentDate->year}}&month={{$currentDate->month === 12 ? 1 : $currentDate->month + 1}}"
        class="p-2 ml-2 rounded shadow bg-white/10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 h-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>
    </a>
    <h3 class="ml-4 text-2xl font-medium leading-6 text-white dark:text-gray-200"><i
            class="mr-2 fa-solid fa-calendar-star"></i>{{ $currentDate->format("M") }} {{ $currentDate->year }}</h3>
</div>

<dl class="grid grid-cols-2 gap-5 mt-5 sm:grid-cols-3">
    <div
        class="px-4 py-5 overflow-hidden bg-white border border-white border-opacity-25 rounded-lg shadow shadow-md bg-opacity-10 sm:p-6">
        <div class="flex flex-wrap">
            <div
                class="relative flex-1 flex-grow w-full max-w-full pr-4 text-xs font-black text-white uppercase truncate">
                Ure skupaj
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $workingSeconds / 3600 }}</dd>
            </div>
            <div class="relative flex-initial w-auto pl-4">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 p-2 text-center text-white bg-red-600 rounded-full shadow-lg">
                    <i class="w-auto fa-solid fa-chart-line"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-xs text-white">
            <span class="p-1 font-bold bg-green-500 rounded-md">{{ number_format($workingSecondsLunch / 3600 +
                ($totalWorkingDays * 0.5), 2, '.', ',') }}</span>&nbsp; upoštevajoč 30min malice
        </div>
    </div>
    <div
        class="px-4 py-5 overflow-hidden bg-white border border-white border-opacity-25 rounded-lg shadow shadow-md bg-opacity-10 sm:p-6">
        <div class="flex flex-wrap">
            <div
                class="relative flex-1 flex-grow w-full max-w-full pr-4 text-xs font-black text-white uppercase truncate">
                Delovnih dni
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $totalWorkingDays }}</dd>
            </div>
            <div class="relative flex-initial w-auto pl-4">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 p-2 text-center text-white bg-green-500 rounded-full shadow-lg">
                    <i class="fa-solid fa-person-digging"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-xs text-white">
            <span class="p-1 font-bold bg-green-500 rounded-md">{{ number_format($totalWorkingDaysProcents, 2, '.', ',')
                }} %</span>&nbsp; od celote
        </div>
    </div>
    <div
        class="px-4 py-5 overflow-hidden bg-white border border-white border-opacity-25 rounded-lg shadow shadow-md bg-opacity-10 sm:p-6">
        <div class="flex flex-wrap">
            <div
                class="relative flex-1 flex-grow w-full max-w-full pr-4 text-xs font-black text-white uppercase truncate">
                + oz - ure
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">
                    @if ($totalWorkingDays == 0)
                    0
                    @else
                    {{ ($totalWorkingDays * 8 > $workingSeconds / 3600) ? '-' : '' }}{{ abs($totalWorkingDays * 8 -
                    ($workingSeconds / 3600)) }}
                    @endif
                </dd>
            </div>
            <div class="relative flex-initial w-auto pl-4">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 p-2 text-center text-white bg-pink-500 rounded-full shadow-lg">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-xs text-white">
            <span class="p-1 font-bold bg-pink-500 rounded-md">
                @if ($totalWorkingDays == 0)
                0
                @else
                {{ ($totalWorkingDays * 8 > $workingSecondsLunch / 3600 + ($totalWorkingDays * 0.5)) ? '-' : '' }}{{
                number_format(abs($totalWorkingDays * 8 - ($workingSecondsLunch / 3600 + ($totalWorkingDays * 0.5))), 2)
                }}

                @endif
            </span>&nbsp; upoštevajoč 30min malice
        </div>
    </div>
</dl>
<dl class="grid grid-cols-2 gap-5 mt-5 sm:grid-cols-3">
    <div
        class="px-4 py-5 overflow-hidden bg-white border border-white border-opacity-25 rounded-lg shadow shadow-md bg-opacity-10 sm:p-6">
        <div class="flex flex-wrap">
            <div
                class="relative flex-1 flex-grow w-full max-w-full pr-4 text-xs font-black text-white uppercase truncate">
                Dopust (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $timeOffs }}</dd>
            </div>
            <div class="relative flex-initial w-auto pl-4">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 p-2 text-center text-white bg-blue-500 rounded-full shadow-lg">
                    <i class="fa-solid fa-umbrella-beach"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-xs text-white">
            <span class="p-1 font-bold bg-blue-500 rounded-md">{{ number_format($timeOffsProcents, 2, '.', ',') }}
                %</span>&nbsp; od celote
        </div>
    </div>
    <div
        class="px-4 py-5 overflow-hidden bg-white border border-white border-opacity-25 rounded-lg shadow shadow-md bg-opacity-10 sm:p-6">
        <div class="flex flex-wrap">
            <div
                class="relative flex-1 flex-grow w-full max-w-full pr-4 text-xs font-black text-white uppercase truncate">
                Bolniška in nega (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $sickDays }}</dd>
            </div>
            <div class="relative flex-initial w-auto pl-4">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 p-2 text-center text-white bg-teal-300 rounded-full shadow-lg">
                    <i class="fa-regular fa-face-thermometer"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-xs text-white">
            <span class="p-1 font-bold bg-teal-300 rounded-md">{{ number_format($sickDaysProcents, 2, '.', ',') }}
                %</span>&nbsp; od celote
        </div>
    </div>
    {{-- <div
        class="px-4 py-5 overflow-hidden bg-white border border-white border-opacity-25 rounded-lg shadow shadow-md bg-opacity-10 sm:p-6">
        <div class="flex flex-wrap">
            <div
                class="relative flex-1 flex-grow w-full max-w-full pr-4 text-xs font-black text-white uppercase truncate">
                Nega (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $kidsDays }}</dd>
            </div>
            <div class="relative flex-initial w-auto pl-4">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 p-2 text-center text-white bg-teal-300 rounded-full shadow-lg">
                    <i class="fa-regular fa-face-thermometer"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-xs text-white">
            <span class="p-1 font-bold bg-teal-300 rounded-md">{{ number_format($kidsDaysProcents, 2, '.', ',') }}
                %</span>&nbsp; od celote
        </div>
    </div> --}}
    <div
        class="px-4 py-5 overflow-hidden bg-white border border-white border-opacity-25 rounded-lg shadow shadow-md bg-opacity-10 sm:p-6">
        <div class="flex flex-wrap">
            <div
                class="relative flex-1 flex-grow w-full max-w-full pr-4 text-xs font-black text-white uppercase truncate">
                Prazniki (dni)
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $holidays }}</dd>
            </div>
            <div class="relative flex-initial w-auto pl-4">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 p-2 text-center text-white rounded-full shadow-lg bg-fuchsia-400">
                    <i class="fa-regular fa-face-thermometer"></i>
                </div>
            </div>
        </div>
        <div class="mt-4 text-xs text-white">
            <span class="p-1 font-bold rounded-md bg-fuchsia-400">{{ number_format($holidaysProcents, 2, '.', ',') }}
                %</span>&nbsp; od celote
        </div>
    </div>


</dl>
