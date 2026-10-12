@extends('layouts.admin')

@section('title', 'Role Management')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Roles</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif; font-weight: 600;">Security Roles</h3>
            <p class="text-muted small mb-0">Role-based access control and administrative authorization.</p>
        </div>
        @can('create roles')
        <a href="{{ route('admin.roles.create') }}" class="btn btn-gold btn-sm shadow-sm">
            <i class="bi bi-shield-plus me-1"></i> Add Role
        </a>
        @endcan
    </div>

    <div class="card-custom">
        <div class="table-responsive">
            <table class="table table-custom align-middle">
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Assigned Permissions</th>
                        <th>Users Count</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>
                                <div class="fw-bold text-dark d-flex align-items-center gap-2">
                                    <i class="bi bi-shield-lock-fill" style="color: #c5a059;"></i>
                                    {{ $role->name }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1" style="max-width: 500px;">
                                    @forelse($role->permissions as $perm)
                                        <span class="badge bg-light text-secondary border" style="font-size: 0.7rem;">
                                            {{ $perm->name }}
                                        </span>
                                    @empty
                                        <span class="text-muted small">No permissions assigned</span>
                                    @endforelse
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25">{{ $role->users->count() }} Users</span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    @can('edit roles')
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-outline-warning" style="border-color: #c5a059; color: #a17c38;" title="Edit Role & Permissions">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan
                                    @if($role->name !== 'Super Admin')
                                        @can('delete roles')
                                        <button type="button" class="btn btn-outline-danger" title="Delete Role" onclick="confirmDeleteRole('{{ $role->id }}', '{{ addslashes($role->name) }}')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        @endcan
                                    @endif
                                </div>

                                <form id="del-role-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">No roles found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function confirmDeleteRole(id, name) {
        if (confirm(`Are you sure you want to delete role "${name}"?`)) {
            document.getElementById(`del-role-${id}`).submit();
        }
    }
</script>
@endpush
