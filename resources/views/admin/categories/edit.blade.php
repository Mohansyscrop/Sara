@extends('layouts.admin')

@section('title', 'Edit Category: ' . $category->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}" class="text-decoration-none" style="color: #c5a059;">Categories</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Edit: {{ $category->name }}</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif; font-weight: 600;">Edit Category: {{ $category->name }}</h3>
            <p class="text-muted small mb-0">Update category details and media.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm bg-white" style="border-color: #d1d5db;">
            <i class="bi bi-arrow-left me-1"></i> Back to Categories
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card-custom p-4">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
                        @error('slug') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}">
                        </div>
                    </div>

                    @if($category->image)
                        @php
                            $catImg = str_starts_with($category->image, 'http') || str_starts_with($category->image, 'assets/') ? asset($category->image) : asset('storage/' . $category->image);
                        @endphp
                        <div class="mb-3">
                            <label class="form-label small text-muted">Current Image</label>
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ $catImg }}" alt="{{ $category->name }}" width="60" height="60" class="rounded-circle object-fit-cover border" style="border-color: #e5e7eb;">
                                <span class="small text-muted">Upload a new image below to replace it.</span>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="image" class="form-label">Replace Category Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <div class="border-top pt-3 mt-4" style="border-color: #f3f4f6 !important;">
                        <h6 class="font-serif mb-3" style="font-family: 'Cinzel', serif; color: #b58d43; font-weight: 600;">SEO Details (Optional)</h6>
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $category->meta_title) }}">
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $category->meta_description) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-gold shadow-sm">
                            <i class="bi bi-check2-circle me-1"></i> Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
