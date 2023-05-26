<x-app-layout>
<div class="px-8 py-12 mx-auto my-4 bg-gray-100 max-w-7xl">
    <div class="mb-4 form-group">
        <label for="project_id" class="mb-2 text-gray-800">Izberi projekt:</label> <br>
        <select class="rounded-md form-control" id="project_id" name="project_id">
            @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-pink-600 rounded-md hover:bg-pink-700" onclick="selectProject()">Preglej oz. dodaj poročilo</button>
</div>
</x-app-layout>
<script>
function selectProject() {
    var projectId = document.getElementById("project_id").value;
    window.location.href = "/reports/" + projectId;
}
</script>
