<x-app-layout>

    <div class="max-w-7xl mx-auto p-8 md:grid md:grid-cols-2 md:divide-x md:divide-gray-200">
        <div class="md:pr-14">
            <div class="flex items-center">
                <h2 class="flex-auto font-semibold dark:text-gray-300 text-gray-900">January 2022</h2>
                <button type="button" class="-my-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Previous month</span>
                    <!-- Heroicon name: mini/chevron-left -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button type="button" class="-my-1.5 -mr-1.5 ml-2 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Next month</span>
                    <!-- Heroicon name: mini/chevron-right -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="mt-10 grid grid-cols-7 text-center text-xs leading-6 dark:text-gray-300 text-gray-500">
                <div>PO</div>
                <div>TO</div>
                <div>SR</div>
                <div>ČE</div>
                <div>PE</div>
                <div>SO</div>
                <div>NE</div>
            </div>
            <div class="mt-2 grid grid-cols-7 text-sm">
                <div class="py-2">
                    <!--
                Always include: "mx-auto flex h-8 w-8 items-center justify-center rounded-full"
                Is selected, include: "text-white"
                Is not selected and is today, include: "text-indigo-600"
                Is not selected and is not today and is current month, include: "text-gray-900"
                Is not selected and is not today and is not current month, include: "text-gray-400"
                Is selected and is today, include: "bg-indigo-600"
                Is selected and is not today, include: "bg-gray-900"
                Is not selected, include: "hover:bg-gray-200"
                Is selected or is today, include: "font-semibold"
              -->
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-500">
                        <time datetime="2021-12-27">27</time>
                    </button>
                </div>
                <div class="py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-500">
                        <time datetime="2021-12-28">28</time>
                    </button>
                </div>
                <div class="py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-500">
                        <time datetime="2021-12-29">29</time>
                    </button>
                </div>
                <div class="py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-500">
                        <time datetime="2021-12-30">30</time>
                    </button>
                </div>
                <div class="py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-500">
                        <time datetime="2021-12-31">31</time>
                    </button>
                </div>
                <div class="py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-01">1</time>
                    </button>
                </div>
                <div class="py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-02">2</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-03">3</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-04">4</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-05">5</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-06">6</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-07">7</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-08">8</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-09">9</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-10">10</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-11">11</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full font-semibold dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-12">12</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-13">13</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-14">14</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-15">15</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-16">16</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-17">17</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-18">18</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-19">19</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-20">20</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white">
                        <time datetime="2022-01-21">21</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-22">22</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-23">23</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-24">24</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-25">25</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-26">26</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-27">27</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-28">28</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-29">29</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-30">30</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-200 text-gray-900 hover:bg-gray-600">
                        <time datetime="2022-01-31">31</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-200">
                        <time datetime="2022-02-01">1</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-200">
                        <time datetime="2022-02-02">2</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-200">
                        <time datetime="2022-02-03">3</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-200">
                        <time datetime="2022-02-04">4</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-200">
                        <time datetime="2022-02-05">5</time>
                    </button>
                </div>
                <div class="border-t border-gray-200 py-2">
                    <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full dark:text-gray-700 text-gray-400 hover:bg-gray-200">
                        <time datetime="2022-02-06">6</time>
                    </button>
                </div>
            </div>
        </div>
        <section class="mt-12 md:mt-0 md:pl-14">
            <h2 class="font-semibold dark:text-gray-200 text-gray-900">Podatki za <time datetime="2022-01-21">21. Januar, 2022</time></h2>
            <ol class="mt-4 space-y-1 text-sm leading-6 text-gray-500">
                <li class="group flex items-center space-x-4 rounded-xl py-2 my-2 px-4 bg-gray-800 focus-within:bg-gray-700 hover:bg-gray-700">
                    <div class="flex-auto">
                        <p class="dark:text-gray-200 text-gray-900">Prihod - Odhod</p>
                        <p class="mt-0.5"><time datetime="2022-01-21T7:00">7:00</time> - <time datetime="2022-01-21T15:00">15:00</time></p>
                    </div>
                    <div class="relative opacity-0 focus-within:opacity-100 group-hover:opacity-100">
                        <div>
                            <button type="button" class="-m-2 flex items-center rounded-full p-1.5 text-gray-500 hover:text-gray-600" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open options</span>
                                <!-- Heroicon name: outline/ellipsis-vertical -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                </svg>
                            </button>
                        </div>

                        <!--
                  Dropdown menu, show/hide based on menu state.

                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                        <div class="absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">Edit</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1">Cancel</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="group flex items-center space-x-4 rounded-xl py-2 px-4 bg-rose-800">
                    <div class="flex-auto">
                        <p class="dark:text-gray-200 text-gray-900">Bolniška</p>
                    </div>
                </li>
                <li class="group flex items-center space-x-4 rounded-xl py-2 px-4 bg-emerald-800">
                    <div class="flex-auto">
                        <p class="dark:text-gray-200 text-gray-900">Dopust</p>
                    </div>
                </li>
                <li class="py-4">
                    <div>
                        <label for="comment" class="block text-sm font-medium dark:text-gray-300 text-gray-700">Opis dela</label>
                        <div class="mt-1">
                            <textarea rows="4" name="comment" id="comment" class="block w-full rounded-md border-gray-300 dark:text-gray-300 dark:bg-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
                        Shrani vnos
                        <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                    </a>
                    <a href="#" class="inline-block rounded-lg px-4 py-1.5 text-base font-semibold leading-7 dark:text-gray-500 text-gray-900 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Prekliči vnos
                    </a>
                </li>
                <!-- More meetings... -->
            </ol>
        </section>
    </div>


</x-app-layout>
