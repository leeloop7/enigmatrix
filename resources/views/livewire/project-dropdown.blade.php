<div>
    <label class="block font-medium text-gray-700" for="customer">
        Stranka
    </label>

    <select wire:model="customerId" id="customer" class="form-select mt-1 block w-full">
        <option value="">Izberite stranko</option>

        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>

    @if ($customerId)
        <label class="block font-medium text-gray-700 mt-4" for="project">
            Projekt
        </label>

        <select wire:model="projectId" id="project" class="form-select mt-1 block w-full">
            <option value="">Izberite projekt</option>

            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    @endif
</div>
