    <form class="row needs-validation" novalidate method="POST" action="{{ route($action, $project) }}"
        enctype="multipart/form-data">
        @csrf
        @method($method)

        {{-- NAME --}}
        <div class="mb-2 col-12 col-md-8">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $project->name) }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        {{-- TYPE SELECT --}}
        <div class="mb-2 col-12 col-md-4">
            <label for="type" class="form-label">Type</label>
            <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
                <option value="">None</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>
                        {{ $type->label }}
                    </option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- URL --}}
        <div class="mb-2 col-12 col-md-6">
            <label for="url" class="form-label">Project url</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                value="{{ old('url', $project->url) }}">
            @error('url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- GITHUB --}}
        <div class="mb-2 col-12 col-md-6">
            <label for="github_url" class="form-label">Github Url</label>
            <input type="text" class="form-control @error('github_url') is-invalid @enderror" id="github_url"
                name="github_url" value="{{ old('github_url', $project->github_url) }}">
            @error('github_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12 d-flex align-items-start">
            {{-- DESCRIPTION --}}
            <div class="col-12 col-md-8">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- THUMBNAIL --}}

                <div class="mb-2 col-12">
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail"
                        name="thumbnail" value="{{ old('thumbnail', $project->thumbnail) }}">
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- thumbnail previdew --}}
            <div class="col-12 col-md-4 d-none d-md-flex ps-5">
                <img id="thumbnail-preview"
                    src="{{ old('thumbUlr', $project->thumbUrl) ?? Vite::asset('resources/images/placeholder.jpg') }}"
                    alt="thumbnail preview" class="img-fluid w-100 " />
            </div>
        </div>

        {{-- TECHNOLOGIES --}}
        <div class="col-12 mb-3">
            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline user-select-none " role="button">
                    <input class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}"
                        name="technology_ids[]" value="{{ $technology->id }}"
                        @if (in_array($technology->id, old('technology_ids', $projectTechnologyIds))) checked @endif>
                    <label class="form-check-label" for="technology-{{ $technology->id }}" role="button">
                        {{ $technology->label }}
                    </label>
                </div>
            @endforeach
        </div>

        <hr class="my-3">

        <div class="my-3 d-flex justify-content-end ">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>



    @section('scripts')
        <script defer src="{{ Vite::asset('resources/js/image-previewer.js') }}"></script>
    @endsection
