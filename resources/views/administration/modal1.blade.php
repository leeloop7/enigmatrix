<!-- Modal 1 -->
<div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal1">
    <!-- Modal inner -->
    <div class="w-full max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal1 = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
        <!-- Title / Close-->
        <div class="flex items-center justify-between">
            <h5 class="mr-3 text-black max-w-none">Add project</h5>
            <button type="button" class="z-50 cursor-pointer" @click="showModal1 = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- content -->
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-bold mb-2">Location:</label>
                <input type="text" name="location" id="location" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="montage_start" class="block text-gray-700 font-bold mb-2">Montage Start:</label>
                <input type="datetime-local" name="montage_start" id="montage_start" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="montage_end" class="block text-gray-700 font-bold mb-2">Montage End:</label>
                <input type="datetime-local" name="montage_end" id="montage_end" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="demontage_start" class="block text-gray-700 font-bold mb-2">Demontage Start:</label>
                <input type="datetime-local" name="demontage_start" id="demontage_start" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="demontage_end" class="block text-gray-700 font-bold mb-2">Demontage End:</label>
                <input type="datetime-local" name="demontage_end" id="demontage_end" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="customers">Customers</label>
                <br>
                <select id="customers" class="form-control" name="customers[]" multiple>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Project</button>
            </div>
        </form>
    </div>
</div>
