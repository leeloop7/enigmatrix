<div class="max-w-7xl min-w-3xl mx-auto bg-gray-100 py-12 px-8 my-4">
    <h1 class="text-2xl font-bold mb-4">Dodaj postavko za {{ $project->name }}</h1>
    <form method="POST" action="{{ route('reports.store') }}">

        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="form-group">
            <label for="report_type_id">Report Type</label>
            <select name="report_type_id" id="report_type_id" class="form-control">
                <option value="">Select a report type</option>
                @foreach ($reportTypes as $reportType)
                    <option value="{{ $reportType->id }}">{{ $reportType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" id="date">
        </div>
        <div class="form-group">
            <label for="from">From</label>
            <select name="from_hour" id="from_hour">
            @for ($i = 0; $i < 23; $i++)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
            <select name="from_minute" id="from_minute">
            @for ($i = 0; $i < 60; $i += 15)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="to">To</label>
            <select name="to_hour" id="to_hour">
            @for ($i = 0; $i < 25; $i++)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
            <select name="to_minute" id="to_minute">
            @for ($i = 0; $i < 60; $i += 5)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" rows="3" class="form-control">{{ old('desc') }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
