<x-app-layout>
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="max-w-7xl mx-auto px-4 py-4 md:py-24">

                <!-- <div class="font-bold text-gray-800 text-xl mb-4">
                    Schedule Tasks
                </div> -->

                    <div class="bg-gray-800 rounded-lg  border-gray-500 border shadow overflow-hidden">

                        <div class="flex items-center justify-between py-2 px-6">
                            <div>
                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-300"></span>
                                <span x-text="year" class="ml-1 text-lg text-gray-400 font-normal"></span>
                            </div>
                            <div class="rounded-lg px-1" style="padding-top: 2px;">
                                <button type="button" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-600 p-1 items-center" :class="{'cursor-not-allowed opacity-25': month == 0 }" :disabled="month == 0 ? true : false" @click="month--; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <div class="border-r border-gray-500 inline-flex h-6"></div>
                                <button type="button" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-600 p-1" :class="{'cursor-not-allowed opacity-25': month == 11 }" :disabled="month == 11 ? true : false" @click="month++; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                <template x-for="(day, index) in DAYS" :key="index">
                                    <div style="width: 14.26%" class="px-2 py-2">
                                        <div x-text="day" class="text-gray-500 text-sm uppercase tracking-wide font-bold text-center"></div>
                                    </div>
                                </template>
                            </div>

                            <div class="flex flex-wrap border-t border-l border-gray-500">
                                <template x-for="blankday in blankdays">
                                    <div style="width: 14.28%; height: 120px" class="text-center border-r border-b border-gray-500 px-4 pt-2"></div>
                                </template>
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                    <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b border-gray-500 relative">
                                        <div @click="showEventModal(date)" x-text="date" class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100" :class="{'bg-indigo-600 text-white': isToday(date) == true, 'text-gray-300 hover:bg-indigo-200': isToday(date) == false }"></div>
                                        <div style="height: 80px;" class="overflow-y-auto mt-1">
                                            <!-- <div
                                            class="absolute top-0 right-0 mt-2 mr-2 inline-flex items-center justify-center rounded-full text-sm w-6 h-6 bg-gray-700 text-white leading-none"
                                            x-show="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"
                                            x-text="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"></div> -->

                                            <template x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )">
                                                <div class="px-2 py-1 rounded-sm mt-1 overflow-hidden border" :class="{
                                                    'border-green-300 text-green-800 bg-green-200': event.event_theme === 'work',
                                                    'border-blue-300 text-blue-800 bg-blue-200': event.event_theme === 'vacation',
                                                    'border-red-300 text-red-800 bg-red-200': event.event_theme === 'sickday',
                                                    'border-yellow-400 text-yellow-800 bg-yellow-300': event.event_theme === 'montage',
                                                    'border-yellow-500 text-yellow-800 bg-yellow-400': event.event_theme === 'demontage',
                                                }">
                                                    <p x-text="event.event_theme === 'work' ? event.event_start + ' - ' + event.event_end : ''" class="text-sm font-bold truncate leading-tight"></p>
                                                    <p x-text="event.event_theme === 'montage' ? event.event_start + ' - ' + event.event_end : ''" class="text-sm font-bold truncate leading-tight"></p>
                                                    <p x-text="event.event_theme === 'demontage' ? event.event_start + ' - ' + event.event_end : ''" class="text-sm font-bold truncate leading-tight"></p>
                                                    <p x-text="event.event_theme === 'vacation' ? 'Dopust' : ''" class="text-sm font-bold truncate leading-tight"></p>
                                                    <p x-text="event.event_theme === 'sickday' ? 'Bolniška' : ''" class="text-sm font-bold truncate leading-tight"></p>
                                                    <p x-text="event.event_desc" class="text-xs font-bold leading-tight"></p>
                                                </div>

                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
                    <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                        <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer" x-on:click="openEventModal = !openEventModal">
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                            </svg>
                        </div>

                        <div class="shadow w-full rounded-lg bg-gray-800 overflow-hidden w-full block p-8">

                            <h2 class="font-bold text-2xl mb-6 text-gray-200 border-b pb-2">Vpiši podatke o delovnem dnevu</h2>

                            <div class="grid grid-cols-2 space-x-2">
                                <div class="mb-4">
                                    <label class="text-gray-200 block mb-1 font-bold text-sm tracking-wide">Ura prihoda:</label>
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="time" x-model="event_start">
                                </div>
                                <div class="mb-4">
                                    <label class="text-gray-200 block mb-1 font-bold text-sm tracking-wide">Ura odhoda:</label>
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="time" x-model="event_end">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-200 block mb-1 font-bold text-sm tracking-wide">Izbrani datum:</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight" type="text" x-model="event_date" readonly>
                            </div>

                            <div class="inline-block w-64 mb-4">
                                <label class="text-gray-200 block mb-1 font-bold text-sm tracking-wide">Izberi tip dneva (delo ali odsotnost):</label>
                                <div class="relative">
                                    <select @change="event_theme = $event.target.value;" x-model="event_theme" class="block appearance-none w-full bg-gray-200 border-2 border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-gray-700">
                                        <template x-for="(theme, index) in themes">
                                            <option :value="theme.value" x-text="theme.label"></option>
                                        </template>

                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-200 block mb-1 font-bold text-sm tracking-wide">Kratek opis dela:</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight" type="text" x-model="event_desc">
                            </div>

                            <div class="mt-8 text-right">
                                <button type="button" class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-300 rounded-lg shadow-sm mr-2" @click="openEventModal = !openEventModal">
                                    Prekliči vnos
                                </button>
                                <button type="button" class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 border border-gray-700 rounded-lg shadow-sm" @click="addEvent()">
                                    Shrani podatke
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal -->
            </div>
</x-app-layout>
