@extends('layouts.admin')

@section('title', 'Edit Role: ' . $role->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}" class="text-decoration-none" style="color: #c5a059;">Roles</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Edit: {{ $role->name }}</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif; font-weight: 600;">Edit Role: {{ $role->name }}</h3>
            <p class="text-muted small mb-0">Modify access permissions assigned to this role.</p>
        </div>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary btn-sm bg-white" style="border-color: #d1d5db;">
            <i class="bi bi-arrow-left me-1"></i> Back to Roles
        </a>
    </div>

    <div class="card-custom p-4">
        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}" required {{ $role->name === 'Super Admin' ? 'readonly' : '' }}>
                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: #f3f4f6 !important;">
                    <h5 class="font-serif m-0" style="font-family: 'Cinzel', serif; color: #b58d43; font-weight: 600;">Assign Permissions</h5>
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-white" onclick="toggleAllPermissions()">Select All / Deselect All</button>
                </div>

                @php
                    $rolePerms = $role->permissions->pluck('name')->toArray();
                @endphp

                <div class="row g-4">
                    @foreach($permissions as $group => $perms)
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="p-3 rounded-3 bg-light border h-100" style="border-color: #e5e7eb !important;">
                                <h6 class="text-uppercase small fw-bold mb-2 pb-1 border-bottom" style="color: #b58d43; border-color: #e5e7eb !important;">
                                    {{ ucfirst($group) }} Permissions
                                </h6>
                                <div class="d-flex flex-column gap-2">
                                    @foreach($perms as $p)
                                        <div class="form-check">
                                            <input class="form-check-input perm-checkbox" type="checkbox" name="permissions[]" value="{{ $p->name }}" id="perm_{{ $p->id }}" {{ in_array($p->name, old('permissions', $rolePerms)) ? 'checked' : '' }} style="border-color: #d1d5db;">
                                            <label class="form-check-label text-dark small" for="perm_{{ $p->id }}">{{ $p->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-gold shadow-sm">
                    <i class="bi bi-shield-check me-1"></i> Update Role
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
<script>
    let allSelected = false;
    function toggleAllPermissions() {
        allSelected = !allSelected;
        document.querySelectorAll('.perm-checkbox').forEach(cb => cb.checked = allSelected);
    }
</script>
@endpush
