@extends('layouts.admin')

@section('title', 'User Management')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Users</li>
@endsection

@section('content')

    <div class="card-custom p-3 mb-4">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-12 col-md-4">
                <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control form-control-sm border-start-0 ps-0" placeholder="Search user name, email..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-gold">Search</button>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-4">
                <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex gap-2">
                    <select name="role" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">All Roles</option>
                        @foreach($roles as $r)
                            <option value="{{ $r->name }}" {{ request('role') == $r->name ? 'selected' : '' }}>{{ $r->name }}</option>
                        @endforeach
                    </select>

                    @if(request()->hasAny(['search', 'role']))
                        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary text-nowrap" title="Clear Filters">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    @endif
                </form>
            </div>

            <div class="col-12 col-md-4 text-md-end">
                @can('create users')
                <a href="{{ route('admin.users.create') }}" class="btn btn-gold btn-sm shadow-sm">
                    <i class="bi bi-person-plus-fill me-1"></i> Add User
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
                        <th>User</th>
                        <th>Email &amp; Mobile</th>
                        <th>Assigned Roles</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-circle rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-sm" style="width: 38px; height: 38px; background: linear-gradient(135deg, #c5a059, #b58d43);">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $user->name }}</div>
                                        @if(auth()->id() === $user->id)
                                            <span class="badge bg-primary bg-opacity-10 text-primary" style="font-size: 0.65rem;">Current Account</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-dark small">{{ $user->email }}</div>
                                <!-- <div class="text-muted small">{{ $user->mobile ?? '—' }}</div> -->
                            </td>
                            <td>
                                @forelse($user->roles as $role)
                                    <span class="badge" style="background: rgba(197, 160, 89, 0.15); color: #9c7a36; border: 1px solid rgba(197, 160, 89, 0.3);">
                                        {{ $role->name }}
                                    </span>
                                @empty
                                    <span class="text-muted small">No role</span>
                                @endforelse
                            </td>
                            <td>
                                @if($user->status == 1)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Active</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Disabled</span>
                                @endif
                            </td>
                            <td><span class="text-muted small">{{ $user->created_at->format('M d, Y') }}</span></td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    @can('edit users')
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-warning" style="border-color: #c5a059; color: #a17c38;" title="Edit User">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('delete users')
                                        @if(auth()->id() !== $user->id)
                                        <button type="button" class="btn btn-outline-danger" title="Delete" onclick="confirmDeleteUser('{{ $user->id }}', '{{ addslashes($user->name) }}')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        @endif
                                    @endcan
                                </div>

                                <form id="del-user-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="card-footer bg-transparent border-top p-3 d-flex justify-content-center" style="border-color: #f3f4f6;">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection

@push('scripts')
<script>
    function confirmDeleteUser(id, name) {
        if (confirm(`Are you sure you want to delete user "${name}"?`)) {
            document.getElementById(`del-user-${id}`).submit();
        }
    }
</script>
@endpush
