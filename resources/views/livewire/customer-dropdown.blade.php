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
</div>
