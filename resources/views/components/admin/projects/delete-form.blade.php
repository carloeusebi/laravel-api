<form class="delete-project-form" action="{{ route('admin.projects.destroy', $project) }}" method="POST"
    data-project-name="{{ $project->name }}" data-bs-target="#modal" data-bs-toggle="modal">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">
        <i class="fa-solid fa-trash-can"></i>
        @unless ($compact)
            <span class="ms-2">Delete</span>
        @endunless
    </button>
</form>
