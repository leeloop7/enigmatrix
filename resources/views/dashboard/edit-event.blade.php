<x-app-layout>
    <div class="max-w-7xl mx-auto p-8">
<form class="text-gray-800" action="{{url('/edit-event/'.$event->id)}}" method="POST">
    <input type="hidden" name="event_date" placeholder="vpiši datum" x-model="currentDate" required>
    @csrf
    <h2 class="text-2xl text-white font-bold">
        UREDI DOGODEK: {{date('d-m-Y', strtotime($event->event_start))}}
    </h2>
    <div class="grid grid-cols-2 space-x-4 my-2">
      <div>
        <label class="text-white font-bold" for="event_start">Začetek dela</label>
        <div class="mt-2 py-2 bg-transparent rounded-lg text-gray-100">
          <div class="flex">
            <select name="event_hours_start" value class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
              @foreach (range(00, 23) as $item) {
              <option class="bg-gray-700" value="{{ $item }}">{{ $item }}</option>
              @endforeach
            </select>
            <span class="text-xl p-2">:</span>
            <select name="event_minutes_start" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
              <option class="bg-gray-700" value="00">00</option>
              <option class="bg-gray-700" value="15">15</option>
              <option class="bg-gray-700" value="30">30</option>
              <option class="bg-gray-700" value="45">45</option>
            </select>
          </div>
        </div>
      </div>
      <div>
        <label class="text-white font-bold" for="event_start">Konec dela</label><br>
        <div class="mt-2 py-2 bg-transparent rounded-lg text-gray-100">
          <div class="flex">
            <select name="event_hours_end" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
              @foreach (range(00, 23) as $item) {
              <option class="bg-gray-700" value="{{ sprintf('%02d', $item) }}">{{ $item }}</option>
              @endforeach
            </select>
            <span class="text-xl p-2">:</span>
            <select name="event_minutes_end" class="bg-transparent text-xl appearance-none border rounded-lg border-gray-400">
              <option class="bg-gray-700" value="00">00</option>
              <option class="bg-gray-700" value="15">15</option>
              <option class="bg-gray-700" value="30">30</option>
              <option class="bg-gray-700" value="45">45</option>
            </select>
          </div>
        </div>
      </div>

    </div>


    <div class="grid grid-cols-2 space-x-4 my-2">
      <div>
        <label class="text-white font-bold mt-4" for="event_theme">Izberi delo oz. odsotnost</label><br>
        <select name="event_theme" value class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm" required>
          @foreach($jobs as $job)
          <option class="bg-gray-700" {{ "$job->id" === old('job') ? 'selected' : '' }} value="{{ $job->id }}">{{ $job->name }}</option>
          @endforeach
        </select>
        @livewire('dropdowns')
        <!-- <label class="text-white font-bold mt-4" for="event_theme">Izberi stranko</label><br>
        <select id="customer" name="event_customer" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
          <option selected disabled>Izberi stranko</option>
          @foreach($customers as $customer)
          <option class="bg-gray-700" value="{{ $customer->id }}">{{ $customer->name }}</option>
          @endforeach
        </select>
        <label class="text-white font-bold mt-4" for="event_project">Izberi projekt</label><br>
        <select id="project" name="event_project" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
          <option selected disabled>Najprej izberi stranko</option>
          @foreach($projects as $project)
          <option class="bg-gray-700" value="{{ $project->id }}">{{ $project->name }}</option>
          @endforeach
        </select> -->
        <label class="text-white font-bold mt-4" for="event_theme">Vrsta dela</label><br>
        <select name="event_jobdesc" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
          <option selected disabled>Izberi vrsto dela</option>
          @foreach($jobDescriptions as $jobDescription)
          <option class="bg-gray-700" {{ "$jobDescription->id" === old('jobDescription') ? 'selected' : '' }} value="{{ $jobDescription->id }}">{{ $jobDescription->name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="text-white font-bold" for="event_desc">Opombe (obvezen vnos)</label><br>
        <textarea type="text" rows="4" name="event_desc" placeholder="Opis dela" class="block appearance-none w-full bg-transparent border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm placeholder:text-white" required>
            {{old('event_desc') ?? $event->event_desc}}
        </textarea>
      </div>
    </div>


    <input class="bg-green-600 hover:bg-green-500 rounded-md text-white text-sm p-4 min-w-32 my-2" type="submit" value="Potrdi spremembe">
  </form>
  </div>
</x-app-layout>
