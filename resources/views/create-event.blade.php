<x-app-layout>
  <div class="max-w-3xl bg-gray-700 px-8 mx-auto rounded-md py-12 text-white my-12">
    <form class="text-gray-800"
          action="/events"
          method="POST">
      @csrf
      <div class="grid grid-cols-2 space-x-2 my-2">
        <div>
          <label class="text-white font-bold"
                 for="event_start">Začetek dela</label><br>
          <input type="datetime-local"
                 name="event_start"
                 placeholder="Začetek dela"
                 class="block appearance-none w-full bg-white px-4 py-2 pr-8 rounded-lg leading-tight"
                 required>
        </div>
        <div>
          <label class="text-white font-bold"
                 for="event_start">Konec dela</label><br>
          <input type="datetime-local"
                 name="event_end"
                 placeholder="Konec dela"
                 class="block appearance-none w-full bg-white px-4 py-2 pr-8 rounded-lg leading-tight"
                 required>
        </div>

      </div>
      <div class="grid grid-cols-2 space-x-2 my-2">
        <div>
            <label class="text-white font-bold"
                 for="event_theme">Izberi lokacijo dela</label><br>
        <select name="event_theme"
                class="block appearance-none w-full bg-white px-4 py-2 pr-8 rounded-lg leading-tight">

                @foreach($jobs as $job)
                    <option value="{{$job->id}}">{{ $job->name }}</option>
                @endforeach

        </select>
        </div>
      </div>
      <div class="grid grid-cols-2 space-x-2 my-2">
        <div>
            <label class="text-white font-bold"
                 for="event_desc">Kratek opis dela</label><br>
        <input type="text"
               name="event_desc"
               placeholder="Opis dela"
               class="block appearance-none w-full bg-white px-4 py-2 pr-8 rounded-lg leading-tight"
               required>
        </div>
      </div>

      <input class="bg-green-600 hover:bg-green-500 rounded-md text-white p-4 min-w-32 my-2"
             type="submit"
             value="Dodaj delovni dan">
    </form>
  </div>
</x-app-layout>
