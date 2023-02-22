<x-app-layout>
    <div class="max-w-7xl mx-auto px-8 py-6 mb-4"  x-data="{ 'showModal1': false, 'showModal2': false }">
        <a href="/preview-events" class="flex bg-white bg-opacity-50 rounded-lg py-2 px-4 hover:bg-opacity-80 block items-center float-left"> <i class="fa-solid fa-file-excel text-2xl text-pink-600 mr-2"></i> Prenesi Excel (vsi uporabniki)</a>
        @if(in_array(Auth::user()->email, config("admins")))
            <button class="ml-0 md:ml-2 flex bg-white bg-opacity-50 rounded-lg py-2 px-4 hover:bg-opacity-80 block items-center float-left" @click="showModal1 = true"><i class="fa-solid fa-file-excel text-2xl text-pink-600 mr-2"></i> Add Project</button>
            <button class="ml-0 md:ml-2 flex bg-white bg-opacity-50 rounded-lg py-2 px-4 hover:bg-opacity-80 block items-center float-left" @click="showModal2 = true"><i class="fa-solid fa-file-excel text-2xl text-pink-600 mr-2"></i> Add Customer</button>
        @endif
        @include('administration.modal1')
        @include('administration.modal2')
    </div>

    <div class="max-w-7xl mx-auto px-8 py-6">
        @livewire('user-filter')
    </div>
</x-app-layout>
