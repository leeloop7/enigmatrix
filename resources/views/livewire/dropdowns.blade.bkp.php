<div>
    <div class="form-group row">
        <label for="event_customer" class="col-md-4 col-form-label text-md-right">Izberi stranko</label>
        <div class="col-md-6">
            <select wire:model="selectedCustomer" class="form-control">
                <option value="" selected>Izberi stranko</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($selectedCustomer)
        <div class="form-group row">
            <label for="event_project" class="col-md-4 col-form-label text-md-right">Projekt</label>

            <div class="col-md-6">
                <select wire:model="selectedProject" class="form-control">
                    <option value="" selected>Izberi projekt</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
