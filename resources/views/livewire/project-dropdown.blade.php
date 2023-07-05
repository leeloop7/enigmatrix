<div>
    <div class="max-w-2xl mx-auto mt-4">
        <label class="block font-medium text-white" for="customer">
            Customer
        </label>

        <select wire:model="customerId" id="customer" class="block w-full mt-1 form-select">
            <option value="">Select a customer</option>

            @foreach ($customers as $customer)
            <option value="{{ $customer->id }}" {{ $customerId==$customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
            @endforeach
        </select>

        @if ($customerId)
        <label class="block mt-4 font-medium text-white" for="project">
            Project
        </label>

        <select wire:model="projectId" id="project" class="block w-full mt-1 form-select">
            <option value="">Select a project</option>

            @foreach ($projects as $project)
            <option value="{{ $project->id }}" {{ $projectId==$project->id ? 'selected' : '' }}>
                {{ $project->name }}
            </option>
            @endforeach
        </select>
        @endif
    </div>
    <div class="mx-auto max-w-7xl">
        @if ($selectedProject)
        <div class="my-12">
            <h2 class="mb-4 text-xl font-bold text-white">
                Izbrani projekt: {{ $selectedProject->name }}
            </h2>
            <div class="grid grid-cols-4 gap-4">
                <div class="w-full">
                    <div
                        class="w-full mx-auto overflow-hidden transition duration-500 transform bg-white rounded-md shadow-lg cursor-pointer hover:shadow-2xl hover:scale-100">
                        <div class="flex items-center justify-between h-12 bg-pink-600">
                            <p class="pl-5 mr-0 text-lg text-white">Delo na podbrezniku:</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                            <p>URE:</p>
                        </div>
                        <p class="py-2 ml-5 text-3xl">{{ $total_time /3600 }}</p>
                        <!-- <hr > -->
                    </div>
                    <div class="mx-auto bg-white shadow-xl">
                        <div class="w-full">
                            <div class="my-6 bg-white">
                                <table class="w-full text-left border-collapse">
                                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                                    <tbody>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Pakiranje za sejem:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $packing_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Zlaganje v regale:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $regal_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Servis sej. materiala:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $servis_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Inventura:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $inventura_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Ravoj novih produktov:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $razvoj_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Pospravljanje skladišča:
                                            </td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $cleaning_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Tehnična priprava:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $technical_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Ostalo:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $rest_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Komercialna priprava:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $comercial_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Oblikovanje:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $design_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Analitika:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $analitic_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Planiranje:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $planing_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Raziskovanje:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $research_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Koordinacija - vodenje:
                                            </td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $coordination_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Sestanek:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $meeting_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Izobraževanje:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $study_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Administracija:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $administration_time /3600 }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div
                        class="w-full mx-auto overflow-hidden transition duration-500 transform bg-white rounded-md shadow-lg cursor-pointer hover:shadow-2xl hover:scale-100">
                        <div class="flex items-center justify-between h-12 bg-blue-700">
                            <p class="pl-5 mr-0 text-lg text-white">Delo na terenu:</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                            <p>URE:</p>
                        </div>
                        <p class="py-2 ml-5 text-3xl">{{ $away_time /3600 }}</p>
                        <!-- <hr > -->
                    </div>
                    <div class="mx-auto bg-white shadow-xl">
                        <div class="w-full">
                            <div class="my-6 bg-white">
                                <table class="w-full text-left border-collapse">
                                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                                    <tbody>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Delo na montaži:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $montage_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Delo na demontaži</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $demontage_time /3600 }}
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Vožnja na/iz terena:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $driving_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Čakanje na terenu:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $waiting_time /3600 }}
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-grey-lighter">
                                            <td class="px-6 py-4 border-b border-grey-light">Ostalo:</td>
                                            <td class="px-6 py-4 text-center border-b border-grey-light">
                                                {{ $restout_time /3600 }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div
                        class="w-full mx-auto overflow-hidden transition duration-500 transform bg-white rounded-md shadow-lg cursor-pointer hover:shadow-2xl hover:scale-100">
                        <div class="flex items-center justify-between h-12 bg-blue-500">
                            <p class="pl-5 mr-0 text-lg text-white">Delo od doma:</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                            <p>URE:</p>
                        </div>
                        <p class="py-2 ml-5 text-3xl">{{ $home_time /3600 }}</p>
                        <!-- <hr > -->
                    </div>
                </div>
                {{-- <div class="w-full">
                    <div
                        class="w-full mx-auto overflow-hidden transition duration-500 transform bg-white rounded-md shadow-lg cursor-pointer hover:shadow-2xl hover:scale-100">
                        <div class="flex items-center justify-between h-12 bg-blue-400">
                            <p class="pl-5 mr-0 text-lg text-white">Delo na demontaži:</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                            <p>URE:</p>
                        </div>
                        <p class="py-2 ml-5 text-3xl">{{ $demontage_time /3600 }}</p>
                        <!-- <hr > -->
                    </div>
                </div> --}}
            </div>
        </div>
        @endif
    </div>
</div>
