@props(['items' => []])

@if (!empty($items))
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb mb-0 py-2 px-3 rounded-3 shadow-sm" style="background: #ffffff; border: 1px solid rgba(212, 175, 55, 0.25);">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #b8860b; font-weight: 600;"><i class="bi bi-house-door-fill me-1"></i> Dashboard</a></li>
        @foreach ($items as $label => $url)
            @if ($loop->last)
                <li class="breadcrumb-item active text-muted" aria-current="page" style="font-weight: 500;">{{ $label }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $url }}" class="text-dark text-decoration-none" style="font-weight: 500;">{{ $label }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
@endif
