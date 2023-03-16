<x-app-layout>

    <div class="max-w-7xl mx-auto" x-data="{selected:1}">
		<ul class="shadow-box">
            <li class="relative mx-8 border-b border-gray-200">

                <button type="button" class="w-full py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-medium leading-6 dark:text-gray-200 text-white">
                            <i class="fa-solid fa-chart-mixed mr-2"></i> Statistika - ure glede na stranko
                        </h3>
                    </div>
                </button>

                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4 mb-20">
                        <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6">
                        <div class="flex flex-wrap">
                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                                Vse delovne ure
                                <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $all_hours }}</dd>
                            </div>
                            <div class="relative w-auto pl-4 flex-initial">
                                <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-600">
                                    <i class="w-auto fa-solid fa-chart-line"></i>
                                </div>
                            </div>
                        </div>
                        </div>
                        @foreach ($customers as $customer)
                            <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-transition:enter="motion-safe:ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                                        {{ $customer->name }}
                                        <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $customer->total_hours / 3600 }}</dd>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div @click="showModal = true" class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-600">
                                            <i class="w-auto fa-solid fa-chart-line"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                                    x-show="showModal">
                                    <!-- Modal inner -->

                                    <div @click.away="showModal = false"  class="max-w-5xl max-h-screen my-4 overflow-y-auto w-full px-6 py-4 mx-auto text-left bg-gray-800 rounded shadow-lg">

                                        <div class="flex items-center justify-between border-b border-gray-700 mb-4 pb-2">
                                            <h5 class="mr-3 text-white font-bold text-2xl max-w-none">{{ $customer->name }}</h5>

                                            <button type="button" class="z-50 cursor-pointer text-white" @click="showModal = false">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                              </svg>
                                            </button>
                                          </div>
                                          <ul class="shadow-box" x-data="{selected:1}">

                                            <!-- Podrobnosti (čas posamezne naloge) -->
                                            <li class="relative border-b border-gray-200">
                                                <button type="button" class="w-full py-4 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                                    <div class="flex items-center justify-between text-white text-xl">
                                                        <span>Čas posamezne naloge</span>
                                                        <span class="ico-plus"></span>
                                                    </div>
                                                </button>
                                                <div class="relative overflow-hidden transition-all max-h-0 duration-700 text-white" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                                    <div class="pb-8">
                                                        @foreach ($jobDescHours as $item)
                                                            <b>Ime JobDesc-a</b> število ur pri tej stranki <br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- Podrobnosti (čas posamezne osebe na stranko) -->
                                            <li class="relative border-b border-gray-200">
                                                <button type="button" class="w-full py-4 text-left" @click="selected !== 4 ? selected = 4 : selected = null">
                                                    <div class="flex items-center justify-between text-white text-xl">
                                                        <span>Čas posamezne osebe na stranko</span>
                                                        <span class="ico-plus"></span>
                                                    </div>
                                                </button>
                                                <div class="relative overflow-hidden transition-all max-h-0 duration-700 text-white" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                                    <div class="pb-8">
                                                        @foreach ($users as $user)
                                                            <b>{{ $user->name }}:</b> 0 <br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>


                                            <!-- Podrobnosti (posamezni dogodki) -->
                                            <li class="relative border-b border-gray-200">
                                                <button type="button" class="w-full py-4 text-left" @click="selected !== 5 ? selected = 5 : selected = null">
                                                    <div class="flex items-center justify-between text-white text-xl">
                                                        <span>Posamezni dogodki</span>
                                                        <span class="ico-plus"></span>
                                                    </div>
                                                </button>
                                                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container5" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                                                    <table class="text-white w-full">
                                                        <tbody class=" text-sm">
                                                            <tr>
                                                                <td class="px-2 py-2 font-bold">Datum</td>
                                                                <td class="px-2 py-2 font-bold">Oseba</td>
                                                                <td class="px-2 py-2 font-bold">Čas</td>
                                                                <td class="px-2 py-2 font-bold">Vrsta</td>
                                                                <td class="px-2 py-2 font-bold">Projekt</td>
                                                                <td class="px-2 py-2 font-bold max-w-xs">Opis</td>
                                                            </tr>
                                                            @foreach ($events->where('customer_id',$customer->id)->sortBy('event_start') as $event)
                                                                <tr class="@if($loop->odd) bg-white bg-opacity-10 @endif">
                                                                    <td class="px-2 py-1 whitespace-nowrap">{{ Carbon::parse($event->event_start)->translatedFormat("d.m.") }}</td>
                                                                    <td class="px-2 py-1 whitespace-nowrap">{{ $event->user->name}}</td>
                                                                    <td class="px-2 py-1 whitespace-nowrap">{{ $event->event_difference / 3600 }}</td>
                                                                    <td class="px-2 py-1 whitespace-nowrap">{{ $event->jobDesc->name}}</td>
                                                                    <td class="px-2 py-1 whitespace-nowrap">{{ $event->project->name}}</td>
                                                                    <td class="px-2 py-1">{{ $event->event_desc }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                      </table>
                                                </div>
                                            </li>

                                         </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </dl>
                </div>

            </li>


            <li class="relative mx-8 border-b border-gray-200">

                <button type="button" class="w-full py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-medium leading-6 dark:text-gray-200 text-white"><i class="fa-solid fa-chart-mixed mr-2"></i> Statistika - ure glede na projekt</h3>
                    </div>
                                </button>

                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4 mb-20">
                        @foreach ($projects as $project)
                                <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                                            {{ $project->name }}
                                            <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $project->total_hours / 3600 }}</dd>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                            <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-600">
                                                <i class="w-auto fa-solid fa-chart-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </dl>
                </div>

            </li>
        </ul>
	</div>
</x-app-layout>
