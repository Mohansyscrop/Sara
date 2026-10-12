@extends('layouts.admin')

@section('title', 'Edit User: ' . $user->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}" class="text-decoration-none" style="color: #c5a059;">Users</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Edit: {{ $user->name }}</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif; font-weight: 600;">Edit User: {{ $user->name }}</h3>
            <p class="text-muted small mb-0">Update account credentials and permission roles.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm bg-white" style="border-color: #d1d5db;">
            <i class="bi bi-arrow-left me-1"></i> Back to Users
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card-custom p-4">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <!-- <div class="col-12 col-md-6">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile', $user->mobile) }}">
                        </div> -->

                        <div class="col-12 col-md-12">
                            <label for="status" class="form-label">Account Status <span class="text-danger">*</span></label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="1" {{ old('status', $user->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $user->status) == '0' ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>
                    </div>

                    <div class="p-3 mb-3 rounded bg-light border" style="border-color: #e5e7eb !important;">
                        <label class="form-label small fw-bold mb-1" style="color: #b58d43;">Reset Password (Leave blank to keep existing password)</label>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New password">
                                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-block">Assign Roles</label>
                        @php
                            $userRoles = $user->roles->pluck('name')->toArray();
                        @endphp
                        <div class="row g-2">
                            @foreach($roles as $role)
                                <div class="col-6 col-md-4">
                                    <div class="p-2 rounded bg-light border" style="border-color: #e5e7eb !important;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role_{{ $role->id }}" {{ in_array($role->name, old('roles', $userRoles)) ? 'checked' : '' }} style="border-color: #d1d5db;">
                                            <label class="form-check-label text-dark small" for="role_{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-gold shadow-sm">
                            <i class="bi bi-check2-circle me-1"></i> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
