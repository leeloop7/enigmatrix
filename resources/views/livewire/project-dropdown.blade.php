<div>
 <div class="max-w-2xl mt-4 mx-auto">
    <label class="block font-medium text-white" for="customer">
        Customer
    </label>

    <select wire:model="customerId" id="customer" class="form-select mt-1 block w-full">
        <option value="">Select a customer</option>

        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>

    @if ($customerId)
        <label class="block font-medium text-white mt-4" for="project">
            Project
        </label>

        <select wire:model="projectId" id="project" class="form-select mt-1 block w-full">
            <option value="">Select a project</option>

            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>

    @endif
    </div>
    <div class="max-w-7xl mx-auto">
    @if ($selectedProject)
        <div class="my-12">
        <h2 class="text-xl font-bold text-white mb-4">
        Izbrani projekt: {{ $selectedProject->name }}
        </h2>
        <div class="grid grid-cols-4 gap-4">
            <div class="w-full">
                <div class="w-full bg-white mx-auto rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                    <div class="h-12 bg-pink-600 flex items-center justify-between">
                        <p class="mr-0 text-white text-lg pl-5">Delo na podbrezniku:</p>
                    </div>
                    <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                        <p>URE:</p>
                    </div>
                    <p class="py-2 text-3xl ml-5">{{ $total_time /3600 }}</p>
                    <!-- <hr > -->
                </div>
                <div class="mx-auto bg-white shadow-xl">
                    <div class="w-full">
                        <div class="bg-white my-6">
                            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                            <tbody>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Pakiranje za sejem:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $packing_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Servis sej. materiala:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $servis_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Inventura:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $inventura_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Ravoj novih produktov:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $research_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Pospravljanje skladišča:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $cleaning_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Tehnična priprava:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $technical_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Ostalo:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $rest_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Komercialna priprava:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $comercial_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Oblikovanje:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $design_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Analitika:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $analitic_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Planiranje:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $planing_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Raziskovanje:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $research_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Koordinacija - vodenje:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $coordination_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Sestanek:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $meeting_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Izobraževanje:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $study_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Administracija:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
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
                <div class="w-full bg-white mx-auto rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                    <div class="h-12 bg-blue-700 flex items-center justify-between">
                        <p class="mr-0 text-white text-lg pl-5">Delo na terenu:</p>
                    </div>
                    <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                        <p>URE:</p>
                    </div>
                    <p class="py-2 text-3xl ml-5">{{ $away_time /3600 }}</p>
                    <!-- <hr > -->
                </div>
                <div class="mx-auto bg-white shadow-xl">
                    <div class="w-full">
                        <div class="bg-white my-6">
                            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                            <tbody>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Delo na montaži:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $montage_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Delo na demontaži</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $demontage_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Zlaganje v regale:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $regal_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Vožnja na/iz terena:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $driving_time /3600 }}
                                </td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">Čakanje na terenu:</td>
                                <td class="py-4 px-6 text-center border-b border-grey-light">
                                    {{ $waiting_time /3600 }}
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="w-full bg-white mx-auto rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                    <div class="h-12 bg-blue-500 flex items-center justify-between">
                        <p class="mr-0 text-white text-lg pl-5">Delo od doma:</p>
                    </div>
                    <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                        <p>URE:</p>
                    </div>
                    <p class="py-2 text-3xl ml-5">{{ $home_time /3600 }}</p>
                    <!-- <hr > -->
                </div>
            </div>
            {{-- <div class="w-full">
                <div class="w-full bg-white mx-auto rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                    <div class="h-12 bg-blue-400 flex items-center justify-between">
                        <p class="mr-0 text-white text-lg pl-5">Delo na demontaži:</p>
                    </div>
                    <div class="flex justify-between px-5 pt-6 mb-1 text-sm text-gray-600">
                        <p>URE:</p>
                    </div>
                    <p class="py-2 text-3xl ml-5">{{ $demontage_time /3600 }}</p>
                    <!-- <hr > -->
                </div>
            </div> --}}
        </div>
        </div>
    @endif
    </div>
</div>
