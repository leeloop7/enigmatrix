<h3 class="text-2xl font-medium leading-6 dark:text-gray-200 text-white"><i class="fa-solid fa-calendar-star mr-2"></i> Januar 2023</h3>
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4">
      <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                Ure skupaj
                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $allHours }}</dd>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-600">
                    <i class="w-auto fa-solid fa-chart-line"></i>
                </div>
            </div>
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
            <span class="font-bold bg-green-500 p-1 rounded-md">{{ $totalWorkingDaysProcents }} %</span>&nbsp; od celote
        </div>
    </div>
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
            <span class="bg-blue-500 p-1 rounded-md font-bold">{{ $timeOffsProcents }} %</span>&nbsp; od celote
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
            <span class="bg-teal-300 p-1 rounded-md font-bold">{{ $sickDaysProcents }} %</span>&nbsp; od celote
        </div>
    </div>

</dl>
