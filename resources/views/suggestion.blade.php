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
</x-app-layout>
