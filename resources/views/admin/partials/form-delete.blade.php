<form
    onsubmit="return confirm('Conferma l\'eliminazione di: {{$project->title}}')" class="d-inline"
    action="{{route('admin.projects.destroy', $project)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" title="delete">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
