@extends('layouts.admin')

@section('title', 'Permissions')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-gold text-decoration-none">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Permissions</li>
@endsection

@section('content')

    <div class="card-custom p-3 mb-4">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-12 col-md-6">
                <form action="{{ route('admin.permissions.index') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-gold"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control form-control-sm border-start-0 ps-0" placeholder="Search permissions..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 text-md-end">
                @can('create permissions')
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-gold btn-sm">
                    <i class="bi bi-key-fill me-1"></i> Add Permission
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card-custom">
        <div class="table-responsive">
            <table class="table table-custom align-middle">
                <thead>
                    <tr>
                        <th>Permission Key</th>
                        <th>Assigned to Roles</th>
                        <th>Guard</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $perm)
                        <tr>
                            <td>
                                <div class="fw-semibold text-dark d-flex align-items-center gap-2">
                                    <i class="bi bi-key text-gold"></i>
                                    <code class="text-dark bg-light px-2 py-1 rounded">{{ $perm->name }}</code>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    @forelse($perm->roles as $r)
                                        <span class="badge" style="background: rgba(197, 160, 89, 0.15); color: #9c7832; border: 1px solid rgba(197, 160, 89, 0.3);">{{ $r->name }}</span>
                                    @empty
                                        <span class="text-muted small">Unassigned</span>
                                    @endforelse
                                </div>
                            </td>
                            <td><span class="text-muted small">{{ $perm->guard_name }}</span></td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    @can('edit permissions')
                                    <a href="{{ route('admin.permissions.edit', $perm->id) }}" class="btn btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('delete permissions')
                                    <button type="button" class="btn btn-outline-danger" title="Delete" onclick="confirmDeletePerm('{{ $perm->id }}', '{{ addslashes($perm->name) }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @endcan
                                </div>

                                <form id="del-perm-{{ $perm->id }}" action="{{ route('admin.permissions.destroy', $perm->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">No permissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($permissions->hasPages())
            <div class="card-footer bg-white border-top border-light-subtle p-3 d-flex justify-content-center">
                {{ $permissions->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection

@push('scripts')
<script>
    function confirmDeletePerm(id, name) {
        if (confirm(`Are you sure you want to delete permission "${name}"?`)) {
            document.getElementById(`del-perm-${id}`).submit();
        }
    }
</script>
@endpush
