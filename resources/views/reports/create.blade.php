<div class="px-6 py-8 mx-auto my-4 bg-white rounded-lg shadow-lg max-w-7xl min-w-3xl">
    <h1 class="mb-4 text-3xl font-bold">Dodaj postavko za <br> {{ $project->name }}</h1>
    <form method="POST" action="{{ route('reports.store') }}">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">

        <div class="mb-4">
            <label for="report_type_id" class="block mb-2 text-sm font-bold text-gray-700">Tip poročila</label>
            <select name="report_type_id" id="report_type_id"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="">Izberi tip poročila</option>
                @foreach ($reportTypes as $reportType)
                <option value="{{ $reportType->id }}">{{ $reportType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="date" class="block mb-2 text-sm font-bold text-gray-700">Datum</label>
            <input type="date" name="date"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="from_hour" class="block mb-2 text-sm font-bold text-gray-700">Od</label>
                <div class="flex">
                    <select name="from_hour" id="from_hour"
                        class="w-full px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:border-blue-500">
                        @for ($i = 0; $i < 24; $i++) <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                            </option>
                            @endfor
                    </select>
                    <select name="from_minute" id="from_minute"
                        class="w-full px-3 py-2 border border-gray-300 rounded-r-lg focus:outline-none focus:border-blue-500">
                        @for ($i = 0; $i < 60; $i +=15) <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>
            <div>
                <label for="to_hour" class="block mb-2 text-sm font-bold text-gray-700">Do</label>
                <div class="flex">
                    <select name="to_hour" id="to_hour"
                        class="w-full px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:border-blue-500">
                        @for ($i = 0; $i < 24; $i++) <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                            </option>
                            @endfor
                    </select>
                    <select name="to_minute" id="to_minute"
                        class="w-full px-3 py-2 border border-gray-300 rounded-r-lg focus:outline-none focus:border-blue-500">
                        @for ($i = 0; $i < 60; $i +=5) <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                            </option>
                            @endfor
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="desc" class="block mb-2 text-sm font-bold text-gray-700">Opis</label>
                <textarea name="desc" id="desc" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">{{ old('desc') }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Potrdi
                    postavko</button>
            </div>
    </form>
</div>
