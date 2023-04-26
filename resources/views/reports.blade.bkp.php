<x-app-layout>

<div class="max-w-7xl mx-auto bg-gray-100 py-12 px-8 my-4">

<form method="POST" action="{{ route('reports.store') }}">
    @csrf
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-2 form-group my-2">
            <label for="project_id">Project</label>
            <select class="form-control w-full" id="project_id" name="project_id">
                @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-2 form-group my-2">
            <label for="report_type_id">Report Type</label>
            <select name="report_type_id" id="report_type_id" class="form-control w-full">
                @foreach($reportTypes as $reportType)
                    <option value="{{ $reportType->id }}">{{ $reportType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-2 "></div>
        <div class="col-span-2 form-group my-2">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control w-full" id="date">
        </div>
        <div class="form-group my-2">
            <label for="from">From</label> <br>
            <select name="from_hour" id="from_hour">
            @for ($i = 0; $i < 24; $i++)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
            <select name="from_minute" id="from_minute">
            @for ($i = 0; $i < 60; $i += 15)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
        </div>
        <div class="form-group my-2">
            <label for="to">To</label><br>
            <select name="to_hour" id="to_hour">
            @for ($i = 0; $i < 24; $i++)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
            <select name="to_minute" id="to_minute">
            @for ($i = 0; $i < 60; $i += 5)
                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
            </select>
        </div>
    </div>



    <div class="form-group my-2">
        <label for="desc">Opombe (Vpiši posebnosti in pomembne informacije)</label> <br>
        <textarea name="desc" class="form-control w-full h-32" id="desc"></textarea>
    </div>
    <button type="submit" name="submit" class="bg-green-400 hover:bg-green-500 px-4 my-4 py-2 rounded-md">Submit</button>

</form>
</div>

<div class="max-w-7xl mx-auto bg-gray-100 py-12 my-4">
<div class="px-4 sm:px-6 lg:px-8">
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
      <table class="min-w-full divide-y divide-gray-300">
        <thead>
            <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Vrsta</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($reports as $report)
                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">{{ $report->id }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $report->date }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $report->reportType ? $report->reportType->name : '-' }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimeString($report->from)->format('H:i') }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimeString($report->to)->format('H:i') }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ Carbon::parse($report->from)->diff(Carbon::parse($report->to))->format('%H:%I') }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $report->desc }}</td>
                </tr>
            @endforeach
        </tbody>
</table>

</div></div></div></div></div>
<!-- POVZETEK -->
<div class="max-w-7xl mx-auto bg-gray-100 py-12 my-4">
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Povzetek vodje terena: Matic Šmarčan</h1>
      <p class="mt-2 text-sm text-gray-700"><b>Sejmišče:</b> Excel London</p>
      <p class="mt-2 text-sm text-gray-700"><b>Razstavljalec:</b> Interblock</p>
      <p class="mt-2 text-sm text-gray-700"><b>Površina:</b> 72,00 m<sup>2</sup></p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
      <button type="button" class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"><i class="fa-solid fa-print"></i> Natisni</button>
    </div>
  </div>
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Vrsta</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
              {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                <span class="sr-only">Edit</span>
              </th> --}}
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">30.01.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot na montažo</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">10:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">24:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">11:00 - Odhod NM, 14:00 - Karavanke</td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">31.01.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot na montažo</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">08:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">21:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Spali v LUX, ob 16:00 Calais</td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">01.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">02.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">21:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">5</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">03.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">6</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">04.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">08:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">12:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">7</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">05.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">08:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">22:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">8</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">06.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">08:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">18:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">10:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">9</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">07.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">08:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">09:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">01:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Sesanje</td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">10</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">08.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Čakanje</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">11</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">09.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Montaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">08:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">09:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">01:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Sesanje</td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">12</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">09.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Demontaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">16:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">22:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">06:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">13</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">10.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Demontaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">14</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">11.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Demontaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">08:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">19:30</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">11:30</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">15</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">12.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Demontaža</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">10:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">04:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
             <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">16</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">12.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot iz demontaže</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">24:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">10:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">17</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">13.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot iz demontaže</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">21:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
            </tr>
            <!-- More transactions... -->

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>

<!-- // POVZETEK -->

<!-- PREVOZI -->

<div class="max-w-7xl mx-auto bg-gray-100 py-12 my-4">
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Prevozi</h1>
      <p class="mt-2 text-sm text-gray-700">Prevoz na in iz montaže</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
      <button type="button" class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"><i class="fa-solid fa-print"></i> Natisni</button>
    </div>
  </div>
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Vrsta</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
              <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
              {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                <span class="sr-only">Edit</span>
              </th> --}}
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">30.01.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot na montažo</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">10:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">24:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
              {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
              </td> --}}
            </tr>
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">31.01.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot na montažo</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">8:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">21:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">LUX odhod ob 8:00, v Calaisu ob 16:00</td>
              {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
              </td> --}}
            </tr>
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">12.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot iz demontaže</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">00:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">10:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">16:30 Dover trajekt, potem pot do LUX</td>
              {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
              </td> --}}
            </tr>
            <tr>
              <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">13.02.2023</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Pot iz demontaže</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">21:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">14:00</td>
              <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Prihod NM cca. 21:00</td>
              {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
              </td> --}}
            </tr>

            <!-- More transactions... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>

<!-- // PREVOZI -->

<!-- MONTAŽA -->

<div class="max-w-7xl mx-auto bg-gray-100 py-12 my-4">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Montaža</h1>
            <p class="mt-2 text-sm text-gray-700">Delo razdeljeno po datumih, monterjih in urah.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <button type="button" class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"><i class="fa-solid fa-print"></i> Natisni</button>
            </div>
        </div>
        <ul class="block my-4 mx-auto divide-y divide-gray-300" x-data="{selected:null}">
            <li class="flex align-center flex-col">
                <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                    class="cursor-pointer px-5 py-3 bg-white text-gray-800 text-center inline-block hover:opacity-75 rounded-t">01.02.2023</h4>
                <table x-show="selected == 0" class="min-w-full divide-y divide-gray-300">
                <caption class="bg-white p-2 text-sm">Razklad kamiona 1 in 2, električna inštalacija, postavljanje litka in luči, problem z FIX kiti, ob vstopu ID: iz registracijskega emaila.</caption>
                <thead class=" bg-white">

                    <tr>
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Monter</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
                    {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">01.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Matic Šmarčan</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">01.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Dejan Moravec</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">01.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Andrey HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">01.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tomislav HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>

                    <!-- More transactions... -->
                </tbody>
                </table>
            </li>
            <li class="flex align-center flex-col">
                <h4 @click="selected !== 1 ? selected = 1 : selected = null"
                    class="cursor-pointer px-5 py-3 bg-white text-gray-800 text-center inline-block hover:opacity-75">02.02.2023</h4>
                <table x-show="selected == 1" class="min-w-full divide-y divide-gray-300">
                <thead class=" bg-white">
                    <tr>
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Monter</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
                    {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">02.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Matic Šmarčan</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">02.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Dejan Moravec</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">02.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Andrey HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">02.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tomislav HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>

                    <!-- More transactions... -->
                </tbody>
                </table>
            </li>
            <li class="flex align-center flex-col">
                <h4 @click="selected !== 2 ? selected = 2 : selected = null"
                    :class="{'cursor-pointer px-5 py-3 bg-white text-gray-800 text-center inline-block hover:opacity-75': true, 'rounded-b': selected != 2}">03.02.2023</h4>
                <table x-show="selected == 2" class="min-w-full divide-y divide-gray-300">
                <thead class=" bg-white">
                    <tr>
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Monter</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
                    {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">03.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Matic Šmarčan</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">03.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Dejan Moravec</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">03.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Andrey HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">03.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tomislav HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>

                    <!-- More transactions... -->
                </tbody>
                </table>
            </li>
        </ul>
    </div>
</div>

<!-- // MONTAŽA -->

<!-- DEMONTAŽA -->

<div class="max-w-7xl mx-auto bg-gray-100 py-12 my-4">
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Demontaža</h1>
      <p class="mt-2 text-sm text-gray-700">Delo razdeljeno po datumih, monterjih in urah.</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
      <button type="button" class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"><i class="fa-solid fa-print"></i> Natisni</button>
    </div>
  </div>
  <ul class="block my-4 mx-auto divide-y divide-gray-300" x-data="{selected:null}">
            <li class="flex align-center flex-col">
                <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                    class="cursor-pointer px-5 py-3 bg-white text-gray-800 text-center inline-block hover:opacity-75 rounded-t">09.02.2023</h4>
                <table x-show="selected == 0" class="min-w-full divide-y divide-gray-300">
                <thead class=" bg-white">
                    <tr>
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Monter</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
                    {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">09.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Matic Šmarčan</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">09.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Dejan Moravec</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">09.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Andrey HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">09.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tomislav HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>

                    <!-- More transactions... -->
                </tbody>
                </table>
            </li>
            <li class="flex align-center flex-col">
                <h4 @click="selected !== 1 ? selected = 1 : selected = null"
                    class="cursor-pointer px-5 py-3 bg-white text-gray-800 text-center inline-block hover:opacity-75">10.02.2023</h4>
                <table x-show="selected == 1" class="min-w-full divide-y divide-gray-300">
                <thead class=" bg-white">
                    <tr>
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Monter</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
                    {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">10.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Matic Šmarčan</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">10.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Dejan Moravec</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">10.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Andrey HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">10.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tomislav HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>

                    <!-- More transactions... -->
                </tbody>
                </table>
            </li>
            <li class="flex align-center flex-col">
                <h4 @click="selected !== 2 ? selected = 2 : selected = null"
                    :class="{'cursor-pointer px-5 py-3 bg-white text-gray-800 text-center inline-block hover:opacity-75': true, 'rounded-b': selected != 2}">11.02.2023</h4>
                <table x-show="selected == 2" class="min-w-full divide-y divide-gray-300">
                <thead class=" bg-white">
                    <tr>
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-1">#</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Monter</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Od</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Do</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Skupaj</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Opombe</th>
                    {{-- <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                        <span class="sr-only">Edit</span>
                    </th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">1</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">11.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Matic Šmarčan</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">2</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">11.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Dejan Moravec</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">3</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">11.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Andrey HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>
                    <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">4</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">11.02.2023</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tomislav HR</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">07:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">13:00</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500"></td>
                    {{-- <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit<span class="sr-only">, AAPS0L</span></a>
                    </td> --}}
                    </tr>

                    <!-- More transactions... -->
                </tbody>
                </table>
            </li>
        </ul>
</div>

</div>

<!-- // DEMONTAŽA -->
</x-app-layout>
