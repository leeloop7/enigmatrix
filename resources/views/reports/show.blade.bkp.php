<x-app-layout>
    <div class="px-8 py-12 mx-auto my-4 bg-white max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="my-4">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700">
                    Nazaj na izbiro projekta
                </a>
            </div>
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-4xl font-bold">{{ $project->name }}</h1>
                    <h2 class="my-2 text-base font-semibold leading-6 text-gray-900">Povzetek vodje terena: Matic
                        Šmarčan</h1>
                        <p class="mt-2 text-sm text-gray-700"><b>Sejmišče:</b> Excel London</p>
                        <p class="mt-2 text-sm text-gray-700"><b>Razstavljalec:</b> Interblock</p>
                        <p class="mt-2 text-sm text-gray-700"><b>Površina:</b> 72,00 m<sup>2</sup></p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700"><i
                            class="mr-2 fa-solid fa-print"></i> Natisni</button>
                </div>
            </div>
            <div x-data="{ open: null }">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="w-8 whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">
                                #</th>
                            <th scope="col"
                                class="w-24 whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Datum</th>
                            <th scope="col"
                                class="w-32 whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Vrsta</th>
                            <th scope="col"
                                class="w-16 whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Od
                            </th>
                            <th scope="col"
                                class="w-16 whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Do
                            </th>
                            <th scope="col"
                                class="w-16 whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Skupaj</th>
                            <th scope="col"
                                class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Opombe</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($reports as $report)
                        @php
                        $rowId = 'open_' . $report->id;
                        @endphp
                        <tr :class="{ 'bg-gray-200': open === '{{ $rowId }}' }"
                            @click="open = (open === '{{ $rowId }}' ? null : '{{ $rowId }}')"
                            class="cursor-pointer hover:bg-gray-50">
                            <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-1">{{
                                $loop->iteration }}</td>
                            <td class="px-2 py-2 text-sm font-medium font-bold text-gray-900 whitespace-nowrap">{{
                                $report->date }}
                            </td>
                            <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">{{ $report->reportType ?
                                $report->reportType->name : '-' }}</td>
                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">{{
                                \Carbon\Carbon::createFromTimeString($report->from)->format('H:i') }}</td>
                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">{{
                                \Carbon\Carbon::createFromTimeString($report->to)->format('H:i') }}</td>
                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">{{
                                Carbon::parse($report->from)->diff(Carbon::parse($report->to))->format('%H:%I') }}</td>
                            <td class="px-2 py-2 text-sm text-gray-500 ">{{ $report->desc }}</td>
                        </tr>
                        <tr x-show="open === '{{ $rowId }}'" x-transition:enter="transition ease-out duration-300"
                            x-transition:leave="" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0">
                            <td colspan="7">
                                <!-- Button to open the modal -->
                                <button @click="openModal = true"
                                    class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded-md focus:outline-none">
                                    Dodaj podrobno poročilo
                                </button>
                                <!-- Modal -->
                                <div x-show="openModal" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-90"
                                    @click.away="openModal = false"
                                    class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
                                    <!-- Modal content -->
                                    <div class="p-4 bg-white rounded-md">
                                        <!-- Modal header -->
                                        <div class="mb-4">
                                            <h3 class="text-lg font-semibold">Add Worker Report</h3>
                                        </div>
                                        <!-- Modal form -->
                                        <form>
                                            <!-- Form fields for worker report -->
                                            <!-- Replace with your form fields for adding worker report -->
                                        </form>
                                        <!-- Modal actions -->
                                        <div class="flex justify-end mt-4">
                                            <button @click="openModal = false"
                                                class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 rounded-md focus:outline-none">
                                                Add
                                            </button>
                                            <button @click="openModal = false"
                                                class="px-4 py-2 ml-2 text-sm font-semibold text-gray-500 bg-transparent border border-gray-500 rounded-md focus:outline-none">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="min-w-full bg-gray-100 divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="whitespace-nowrap w-8 py-0.5 font-semibold pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">
                                                #</th>
                                            <th scope="col"
                                                class="whitespace-nowrap w-24 px-2 py-0.5 font-semibold text-left text-sm font-semibold text-gray-900">
                                                Monter</th>
                                            <th class="w-32"></th>
                                            <th scope="col"
                                                class="w-16 whitespace-nowrap px-2 py-0.5 font-semibold text-left text-sm font-semibold text-gray-900">
                                                Od</th>
                                            <th scope="col"
                                                class="w-16 whitespace-nowrap px-2 py-0.5 font-semibold text-left text-sm font-semibold text-gray-900">
                                                Do</th>
                                            <th scope="col"
                                                class="w-16 whitespace-nowrap px-2 py-0.5 font-semibold text-left text-sm font-semibold text-gray-900">
                                                Skupaj</th>
                                            <th scope="col"
                                                class="whitespace-nowrap px-2 py-0.5 font-semibold text-left text-sm font-semibold text-gray-900">
                                                Opombe</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-100 divide-y divide-gray-100">
                                        <tr>
                                            <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-1">1
                                            </td>
                                            <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Jože Novak</td>
                                            <td></td>
                                            <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">07:00</td>
                                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">20:00</td>
                                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">13:00</td>
                                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">Vse ok.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-8 my-4">
            <div x-data="{ showModal: false }">
                <button
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700"
                    @click="showModal = true">Add a report</button>

                <div x-show="showModal"
                    class="fixed inset-0 z-10 flex items-center justify-center bg-gray-500 bg-opacity-75"
                    aria-labelledby="modal-title" role="dialog" aria-modal="true" @click.away="showModal = false">
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="showModal"
                            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <div class="absolute inset-0 bg-gray-500 opacity-75" @click="showModal = false"></div>
                        </div>

                        <div x-show="showModal"
                            class="overflow-hidden transition-all transform bg-white rounded-lg shadow-xl modal-dialog sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                <div class="flex justify-end">
                                    <button @click="showModal = false"
                                        class="text-gray-500 hover:text-gray-700 focus:outline-none"><span
                                            class="sr-only">Close</span>
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                @include('reports.create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
<script>
    // Initialize the Alpine.js component
    window.Alpine.data('yourComponentName', () => ({
        openModal: false,
        showModal: false,
    }));
</script>
