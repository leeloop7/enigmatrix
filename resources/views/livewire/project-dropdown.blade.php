<div>
    <label class="block font-medium text-gray-700" for="customer">
        Customer
    </label>

    <select wire:model="customerId" id="customer" class="form-select mt-1 block w-full">
        <option value="">Select a customer</option>

        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>

    @if ($customerId)
        <label class="block font-medium text-gray-700 mt-4" for="project">
            Project
        </label>

        <select wire:model="projectId" id="project" class="form-select mt-1 block w-full">
            <option value="">Select a project</option>

            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>

    @endif

    @if ($selectedProject)
        <div class="my-12">
        <h2 class="text-xl font-bold text-white">
        Project: {{ $selectedProject->name }}
        </h2>

        Delo na podbrezniku: {{ $total_time /3600 }} <br>
        Delo na terenu: {{ $away_time /3600 }} <br>
        Delo na montaži: {{ $montage_time /3600 }} <br>
        Delo na demontaži: {{ $demontage_time /3600 }} <br>
        Vožnja na/iz terena:  <br>
        Čakanje: <br>

            {{--<p>Total time: {{ $total_time }} seconds</p>

            <p>Job Description hours:</p>
            <ul>
                @foreach ($job_desc_hours as $job_desc_id => $hours)
                    <li>{{ $job_desc_id }}: {{ $hours }} seconds</li>
                @endforeach
            </ul> --}}
        </div>
    @endif
</div>
