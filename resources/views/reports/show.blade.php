<x-app-layout>
<div class="max-w-7xl mx-auto bg-gray-100 py-12 px-8 my-4">
<div class="px-4 sm:px-6 lg:px-8">
    <div class="my-4">
        <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Nazaj na izbiro projekta
        </a>
    </div>
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="font-bold text-4xl">{{ $project->name }}</h1>
      <h2 class="text-base font-semibold leading-6 text-gray-900 my-2">Povzetek vodje terena: Matic Šmarčan</h1>
      <p class="mt-2 text-sm text-gray-700"><b>Sejmišče:</b> Excel London</p>
      <p class="mt-2 text-sm text-gray-700"><b>Razstavljalec:</b> Interblock</p>
      <p class="mt-2 text-sm text-gray-700"><b>Površina:</b> 72,00 m<sup>2</sup></p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
      <button type="button" class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"><i class="fa-solid fa-print"></i> Natisni</button>
    </div>
  </div>
    <div x-data="{ open: false }">
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
            <tr @click="open = !open">
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-1">{{ $report->id }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $report->date }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $report->reportType ? $report->reportType->name : '-' }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimeString($report->from)->format('H:i') }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimeString($report->to)->format('H:i') }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ Carbon::parse($report->from)->diff(Carbon::parse($report->to))->format('%H:%I') }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $report->desc }}</td>
            </tr>
            <tr x-show="open">
                <td colspan="7">
                    <div class="bg-gray-100 px-4 py-2">
                        <p class="text-gray-900 font-medium">{{ $report->desc }}</p>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

  </div>
  <div class="px-8 my-4">
    <div x-data="{ showModal: false }">
  <button @click="showModal = true">Add a report</button>

  <div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" @click.away="showModal = false">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75" @click="showModal = false"></div>
      </div>

      <div x-show="showModal" class="modal-dialog bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="flex justify-end">
            <button @click="showModal = false" class="text-gray-500 hover:text-gray-700 focus:outline-none"><span class="sr-only">Close</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          @include('reports.create')
        </div>
      </div>
    </div>
  </div>
</div>


    </div>
</div>
</x-app-layout>

