<x-app-layout>
    <div class="max-w-3xl mx-auto px-8">
        <div class="card-heade text-xl text-white font-bold my-8">Uredi dogodek</div>
        <form method="POST" action="{{ route('events.update', $event) }}">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="grid-first-name">
                  Delo ali odsotnost
                </label>
                <select id="job_id" name="job_id" class="form-control @error('job_id') is-invalid @enderror" required>
                    <option value="">Izberi delo ali odsotnost</option>
                    @foreach($jobs as $job)
                        <option value="{{ $job->id }}" {{ $event->job_id == $job->id ? 'selected' : '' }}>{{ $job->name }}</option>
                    @endforeach
                </select>
                @error('job_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="grid-last-name">
                  Vrsta dela
                </label>
                <select id="job_desc_id" name="job_desc_id" class="form-control @error('job_desc_id') is-invalid @enderror" required>
                    <option value="">Izberi vrsto dela</option>
                    @foreach($job_descs as $job_desc)
                        <option value="{{ $job_desc->id }}" {{ $event->job_desc_id == $job_desc->id ? 'selected' : '' }}>{{ $job_desc->name }}</option>
                    @endforeach
                </select>
                @error('job_desc_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2 mt-4" for="grid-last-name">
                  Projekt
                </label>
                <select id="project_id" name="project_id" class="form-control @error('project_id') is-invalid @enderror" required>
                    <option value="">Izberi projekt</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $event->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2 mt-4" for="grid-last-name">
                  Stranka
                </label>
                <select id="customer_id" name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" required>
                    <option value="">Izberi stranko</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $event->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2 mt-4" for="grid-last-name">
                  Opis
                </label>
                <textarea id="event_description" class="form-control w-full @error('event_description') is-invalid @enderror" name="event_description"  autocomplete="event_description">{{ old('event_description', $event->event_desc) }}</textarea>

                @error('event_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2 mt-4" for="grid-last-name">
                  Začetek
                </label>
                <select id="event_hours_start" name="event_hours_start" class="form-control">
                    @for ($hour = 0; $hour < 24; $hour++)
                        <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ $event->event_start && Carbon\Carbon::parse($event->event_start)->format('H') == $hour ? 'selected' : '' }}>{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
                <select id="event_minutes_start" name="event_minutes_start" class="form-control">
                    @for ($minute = 0; $minute < 60; $minute += 15)
                        <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ $event->event_start && Carbon\Carbon::parse($event->event_start)->format('i') == $minute ? 'selected' : '' }}>{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2 mt-4" for="grid-last-name">
                  Konec
                </label>
                <select id="event_hours_end" name="event_hours_end" class="form-control">
                    @for ($hour = 0; $hour < 24; $hour++)
                        <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}" {{ $event->event_end && Carbon\Carbon::parse($event->event_end)->format('H') == $hour ? 'selected' : '' }}>{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
                <select id="event_minutes_end" name="event_minutes_end" class="form-control">
                    @for ($minute = 0; $minute < 60; $minute += 15)
                        <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ $event->event_end && Carbon\Carbon::parse($event->event_end)->format('i') == $minute ? 'selected' : '' }}>{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
              </div>
            </div>
            <div class="flex justify-center space-x-2">
                <button
                  type="submit"
                  class="inline-block rounded bg-blue-600 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                  {{ __('Shrani spremembe') }}
                </button>
              </div>
        </form>

    </div>
    <div class="max-w-3xl mx-auto px-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">
                        <form method="POST" action="{{ route('events.update', $event) }}">
                            @csrf
                            @method('PUT')



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
