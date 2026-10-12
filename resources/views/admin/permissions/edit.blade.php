@extends('layouts.admin')

@section('title', 'Edit Permission: ' . $permission->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-gold text-decoration-none">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}" class="text-gold text-decoration-none">Permissions</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Edit: {{ $permission->name }}</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif;">Edit Permission: {{ $permission->name }}</h3>
            <p class="text-muted small mb-0">Modify permission definition.</p>
        </div>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Permissions
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card-custom p-4">
                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium text-dark">Permission Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $permission->name) }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-gold">
                            <i class="bi bi-check2-circle me-1"></i> Update Permission
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
