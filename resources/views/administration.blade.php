<x-app-layout>
    <div class="max-w-7xl mx-auto px-8 py-6 mb-4">
        <a href="/events/export" class="flex bg-white bg-opacity-50 rounded-lg py-2 px-4 hover:bg-opacity-80 block items-center float-left"> <i class="fa-solid fa-file-excel text-2xl text-pink-600 mr-2"></i> Prenesi Excel (vsi uporabniki)</a>
    </div>
    <div class="max-w-7xl mx-auto px-8 py-6">
        @livewire('user-select')
    </div>

</x-app-layout>
