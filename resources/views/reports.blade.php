<x-app-layout>
<div class="max-w-7xl mx-auto bg-gray-100 py-12 px-8 my-4">

<div class="form-group">
    <label for="project_id">Izberi projekt:</label> <br>
    <select class="form-control" id="project_id" name="project_id">
        @foreach($projects as $project)
        <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
    </select>
</div>
<button class="btn btn-primary bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white font-bold my-8" onclick="selectProject()">Preglej oz. dodaj poročilo</button>
</div>
</x-app-layout>
<script>
function selectProject() {
    var projectId = document.getElementById("project_id").value;
    window.location.href = "/reports/" + projectId;
}
</script>
