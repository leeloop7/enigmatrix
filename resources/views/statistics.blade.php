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
                            <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1 truncate text-xs font-black uppercase text-white">
                                        {{ $customer->name }}
                                        <dd class="mt-1 text-2xl font-bold tracking-tight text-white">{{ $customer->total_hours / 3600 }}</dd>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-2 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-600">
                                            <i class="w-auto fa-solid fa-chart-line"></i>
                                        </div>
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
