<div>
    <div class="form-group row">
        <label class="text-white font-bold mt-4" for="user_id">Izberi uporabnika</label><br>
        <div class="col-md-6">
            <select wire:model="userId" name="user_id" class="block appearance-none bg-transparent w-full sm:w-1/3 border-gray-400 px-4 py-1 pl-2 pr-8 mt-1 mb-4 rounded-lg text-gray-100 text-sm">
                <option value="">Izberi uporabnika</option>
                @foreach($users as $user)
                    <option class="bg-gray-700" value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if($selectedUser)

        <div class="text-white">
            <!-- $selectedUser->name -->
            Št. dni dopusta: <b>{{ $timeOffs }}</b> <br>
            Št. dni bolniške: <b>{{ $sickDays }}</b> <br>
            Št. dni praznikov: <b>{{ $holidays }}</b> <br>
            Št. delovnih dni: <b>{{ $totalWorkingDays }}</b><br>
            Št. delovnih ur (zapisano): <br>
            Št. delovnih ur (del. dni * 8): <b>{{ $totalWorkingDays * 8 }}</b> <br>
            <h3 class="text-2xl font-medium leading-6 dark:text-gray-200 text-white mt-12">
                <i class="fa-solid fa-chart-mixed mr-2"></i> Statistika - ure glede na stranko
            </h3>
           <div class="grid grid-cols-5 gap-8 my-4">
            @foreach($groupedEvents as $id => $totalTime)
                <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
                    <span class="font-bold">{{ $customers[$id]->name }}</span> <br>
                    <span class="font-bold text-2xl">{{ $totalTime / 3600 }}</span>
                </div>
                <!-- $event->project->name  -->
                <!-- $event->customer->name  -->
                <!-- ...  -->
            @endforeach
           </div>
           <h3 class="text-2xl font-medium leading-6 dark:text-gray-200 text-white mt-12">
                <i class="fa-solid fa-chart-mixed mr-2"></i> Statistika - ure glede na projekt
            </h3>
            <div class="grid grid-cols-5 gap-8 my-4">
                @foreach($groupedEventsProject as $id => $totalTime)
                    <div class="overflow-hidden rounded-lg bg-white bg-opacity-10 px-4 py-5 shadow sm:p-6 border-white border-opacity-25 border shadow-md">
                        <span class="font-bold"></span>{{ $projects[$id]->name }}</span> <br>
                        <span class="font-bold text-2xl">{{ $totalTime / 3600 }}</span>
                    </div>
                    <!-- $event->project->name  -->
                    <!-- $event->customer->name  -->
                    <!-- ...  -->
                @endforeach
            </div>
        </div>
    @endif
</div>
