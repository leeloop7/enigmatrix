<style>
    .modal-width {
        width: 800px;
    }
</style>

<x-app-layout>

    <div class="px-8 py-12 mx-auto my-4 bg-white max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div x-data="{ open: false, activeRow: {} }">
                <table>
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
                    <tbody>
                        @foreach ($reports as $report)
                        <tr @click="open = true, activeRow = <?= htmlspecialchars(json_encode($report)) ?>">
                            <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-1">{{
                                $loop->iteration }}</td>
                            <td class="px-2 py-2 text-sm font-bold text-gray-900 whitespace-nowrap">{{
                                $report->date }}
                            </td>
                            <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">
                                {{ $report->reportType ? $report->reportType->name : '-' }}
                            </td>
                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">
                                {{ \Carbon\Carbon::createFromTimeString($report->from)->format('H:i') }}
                            </td>
                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">{{
                                \Carbon\Carbon::createFromTimeString($report->to)->format('H:i') }}
                            </td>
                            <td class="px-2 py-2 text-sm text-gray-500 whitespace-nowrap">
                                {{ Carbon::parse($report->from)->diff(Carbon::parse($report->to))->format('%H:%I') }}
                            </td>
                            <td class="px-2 py-2 text-sm text-gray-500 ">{{ $report->desc }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Background -->
                <div class="fixed inset-0 z-50 flex items-center justify-center"
                    style="background-color: rgba(0, 0, 0, 0.5);" x-show="open" @click.away="open = false"></div>

                <!-- Modal Content -->
                <div class="fixed inset-0 z-50 flex items-center justify-center" x-show="open">
                    <div class="p-4 text-gray-100 bg-gray-900 rounded-md modal-width">
                        <p class="text-2xl"><span class="font-bold" x-text="activeRow.date"></span></p>
                        <p>Vrsta: <span x-text="activeRow.reportType ? activeRow.reportType.name : '-'"></span></p>
                        <p>From: <span x-text="activeRow.from"></span></p>
                        <p>To: <span x-text="activeRow.to"></span></p>
                        <p>Total: <span x-text="activeRow.total"></span></p>
                        <div class="mb-2 w-5xl"><span class="font-bold">Opombe:</span> <br> <span class="text-sm"
                                x-text="activeRow.desc"></span></div>
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
                        <button
                            class="px-4 py-2 mt-4 font-semibold text-blue-500 bg-transparent border border-blue-500 rounded hover:bg-blue-800 hover:text-white hover:border-transparent"
                            @click="open = false">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
