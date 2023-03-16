<x-app-layout>
    <div class="max-w-7xl mx-auto">
		<div class="max-w-3xl mx-auto">
            <livewire:project-dropdown />
            @if(isset($project))
                <div class="my-6">
                    <h2 class="text-2xl font-semibold">{{ $project->name }} Statistics:</h2>
                    <p>Total Time: {{ $total_time }} seconds</p>
                    <ul>
                        @foreach($job_desc_hours as $job_desc_id => $hours)
                            <li>{{ App\Models\JobDesc::find($job_desc_id)->name }}: {{ $hours }} seconds</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
	</div>
</x-app-layout>
