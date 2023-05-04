<div class="grid grid-cols-2 space-x-4 my-2">
   <div>
    <label class="text-white font-bold mt-4" for="event_theme">Izberi delo oz. odsotnost</label><br>
    <select wire:model="event_theme" name="event_theme" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm" required>
        <option value="" selected >Izberi temo</option>
        @foreach($jobs as $job)
            <option class="bg-gray-700" value="{{ $job->id }}">{{ $job->name }}</option>
        @endforeach
    </select>

    @php
        $selected = $event_theme;
    @endphp

    @if(!empty($selected))
        <script>
            document.querySelector('[value=""]').disabled = true;
        </script>
    @endif
    </div>
    <div>
    @if(in_array($event_theme, [1, 9, 10, 13]))
        @livewire('dropdowns', ['jobId' => $event_theme])
        <label class="text-white font-bold mt-4" for="event_theme">Vrsta dela</label><br>
        <select name="event_jobdesc" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
          <option value="" selected disabled>Izberi vrsto dela</option>
          @foreach($jobDescriptions as $jobDescription)
          <option class="bg-gray-700" value="{{ $jobDescription->id }}">{{ $jobDescription->name }}</option>
          @endforeach
        </select>


    @endif
    @if(in_array($event_theme, [1, 6, 9, 10, 13]))
    <div>
        <label class="text-white font-bold" for="event_desc">Opombe (obvezen vnos)</label><br>
        <textarea type="text" rows="4" name="event_desc" placeholder="Opis dela" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm" required></textarea>
      </div>
    @endif
   </div>

</div>
