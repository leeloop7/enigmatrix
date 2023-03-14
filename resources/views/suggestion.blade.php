<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Add Suggestion') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form method="POST" action="{{ route('suggestions.store') }}">
            @csrf
            <div class="mt-4">
              <x-label for="title" :value="__('Naslov')" />
              <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
              @error('title')
                  <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>

            <div class="mt-4">
              <x-label for="description" :value="__('Natančen opis predloga oz. problema')" />
              <textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" required></textarea>
              @error('description')
                  <span class="text-red-500">{{ $message }}</span>
              @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-button class="ml-4">
                  {{ __('Podaj predlog') }}
              </x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="my-8 px-8 max-w-7xl mx-auto">
  <h2 class="text-2xl font-bold text-white mb-4">Vsi predlogi</h2>
  <table class="w-full border-collapse border border-gray-800">
    <thead>
      <tr class="bg-gray-200">
        <th class="px-4 py-2 border border-gray-800">Datum vnosa</th>
        <th class="px-4 py-2 border border-gray-800">Naslov</th>
        <th class="px-4 py-2 border border-gray-800">Opis</th>
        <th class="px-4 py-2 border border-gray-800">Stanje</th>
        <th class="px-4 py-2 border border-gray-800">Datum rešitve</th>
      </tr>
    </thead>
    <tbody class="bg-white bg-opacity-50">
      @foreach($suggestions as $suggestion)
        <tr class="@if($suggestion->solved) bg-green-100 @endif">
          <td class="px-4 py-2 border border-gray-800">{{ $suggestion->input_date }}</td>
          <td class="px-4 py-2 border border-gray-800">{{ $suggestion->title }}</td>
          <td class="px-4 py-2 border border-gray-800">{{ $suggestion->description }}</td>
          <td class="px-4 py-2 border border-gray-800">
            @if($suggestion->solved)
              <span class="bg-green-500 text-white font-bold rounded px-2 py-1">Rešeno</span>
            @else
              <span class="bg-red-500 text-white font-bold rounded px-2 py-1">V procesu </span>
            @endif
          </td>
          <td class="px-4 py-2 border border-gray-800">{{ $suggestion->solved_date }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

</x-app-layout>
