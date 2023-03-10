<!-- Modal 1 -->
<div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal1">
    <!-- Modal inner -->
    <div class="w-full max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal1 = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
        <!-- Title / Close-->
        <div class="flex items-center justify-end">
            <button type="button" class="z-50 cursor-pointer" @click="showModal1 = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- content -->
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-1">Ime projekta:</label>
                    <input type="text" name="name" id="name" class="form-input" required>
                </div>

                <div class="w-full md:w-1/3 mb-4">
                    <label for="start_date" class="block text-gray-700 font-bold mb-1">Začetek projekta:</label>
                    <input type="date" name="start_date" id="start_date" class="form-input" required>
                </div>

                <div class="w-full md:w-1/3 mb-4">
                    <label for="end_date" class="block text-gray-700 font-bold mb-1">Konec projekta:</label>
                    <input type="date" name="end_date" id="end_date" class="form-input" required>
                </div>

                <div class="w-full md:w-1/3 mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-1">Lokacija:</label>
                    <input type="text" name="location" id="location" class="form-input" required>
                </div>

                <div class="w-full md:w-2/3 mb-4">
                    <label for="position" class="block text-gray-700 font-bold mb-1">Pozicija v koledarju (0 = skrito,1,2,3,4):</label>
                    <input type="text" name="position" id="position" class="form-input" required>
                </div>

                <div class="w-full md:w-1/3 mb-4">
                    <label for="montage_start" class="block text-gray-700 font-bold mb-1">Začetek montaže:</label>
                    <input type="datetime-local" name="montage_start" id="montage_start" class="form-input" >
                </div>

                <div class="w-full md:w-2/3 mb-4">
                    <label for="montage_end" class="block text-gray-700 font-bold mb-1">Konec montaže:</label>
                    <input type="datetime-local" name="montage_end" id="montage_end" class="form-input" >
                </div>

                <div class="w-full md:w-1/3 mb-4">
                    <label for="demontage_start" class="block text-gray-700 font-bold mb-1">Začetek demontaže:</label>
                    <input type="datetime-local" name="demontage_start" id="demontage_start" class="form-input" >
                </div>

                <div class="w-full md:w-2/3 mb-4">
                    <label for="demontage_end" class="block text-gray-700 font-bold mb-1">Konec demontaže:</label>
                    <input type="datetime-local" name="demontage_end" id="demontage_end" class="form-input" >
                </div>

                <div class="w-full form-group w-64">
                    <label for="customers">Stranke:</label>
                    <br>
                    <select id="customers" class="form-control w-96 h-20" name="customers[]" multiple>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
<br><br>

            </div>
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj nov projekt</button>
            </div>
        </form>
    </div>
</div>
