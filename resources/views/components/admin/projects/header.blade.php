<header>
    <div class="d-flex justify-content-between align-items-center ">
        @if ($hasBackButton)
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Go Back</a>
        @endif

        <h1>{{ $title }}</h1>

        {{ $slot }}
    </div>

    {{-- APP ALERT --}}
    @if (session('alert-message'))
        <x-app-alert type="{{ session('alert-type') ?? 'info' }}" message="{{ session('alert-message') }}" dismissable />
    @endif
    <hr>
</header>
