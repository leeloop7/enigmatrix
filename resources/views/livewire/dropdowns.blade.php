<div>
    <div class="form-group row">
        <label class="text-white font-bold mt-4" for="event_customer">Izberi stranko</label><br>
        <div class="col-md-6">
            <select wire:model="selectedCustomer" name="event_customer" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
                <option value="">Izberi stranko</option>
                @foreach($customers->sortBy('name') as $customer)
                    <option class="bg-gray-700" {{ "$customer->id" === old('customer') ? 'selected' : '' }} value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

        <div class="form-group row">
            <label class="text-white font-bold mt-4" for="event_project">Izberi projekt</label><br>

            <div class="col-md-6">
                <select wire:model="selectedProject" name="event_project" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
                    <option value="">Izberi projekt</option>
                    @foreach($projects as $project)
                        <option class="bg-gray-700" value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
</div>
