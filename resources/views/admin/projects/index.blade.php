@extends('layouts.app')

@section('content')
    <x-admin.projects.header title="Projects Manager">
        {{-- CREATE PROJECT LINK BUTTON --}}
        <div>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary ">Create a new Project</a>
        </div>
    </x-admin.projects.header>


    <div class="d-flex align-items-center justify-content-between gap-4">
        {{-- SEARCHBAR --}}
        <div class="flex-grow-1">
            <form class="input-group">
                <button class="input-group-text">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <input type="search" class="form-control" placeholder="Search..." name="search" />
            </form>
        </div>
        {{-- TYPE FILTER FORM --}}
        <form id="type-filter">
            <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_filter">
                <option value="">None</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if ($type_filter == $type->id) selected @endif>
                        {{ $type->label }}
                    </option>
                @endforeach
            </select>
        </form>

    </div>

    <section id="projects" class="my-5">
        {{-- pagination --}}
        @if (count($projects))
            <div>
                @if ($projects->hasPages())
                    {{ $projects->links() }}
                @endif
            </div>

            {{-- column --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Technologies</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="align-middle">
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ substr($project->description, 0, 20) }}
                                {{-- if string is being cut adds dots... --}}
                                @if (strlen($project->description) > 20)
                                    ...
                                @endif
                            </td>
                            {{-- TYPES --}}
                            <td>
                                <span class="badge text-black"
                                    style="background-color: {{ $project->type?->color }}">{{ $project->type?->label }}</span>
                            </td>
                            {{-- TECHNOLOGIES --}}
                            <td>
                                @foreach ($project->technologies as $technology)
                                    <small>
                                        {{ $technology->label }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    </small>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-1 justify-content-end ">
                                    {{-- show button --}}
                                    <a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- edit button --}}
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    {{-- delete button --}}
                                    <x-admin.projects.delete-form :$project compact></x-admin.projects.delete-form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </table>
        @else
            <x-app-alert type="info" message="No Projects Found"></x-app-alert>
        @endif
    </section>
@endsection

@section('scripts')
    @vite('resources/js/project-index.js')
    @vite('resources/js/delete-project-confirmation.js')
@endsection
