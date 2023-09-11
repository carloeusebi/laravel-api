<div>
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        {{ $message }}
        @if ($dismissable)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
</div>
