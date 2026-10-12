@extends('layouts.admin')

@section('title', 'Categories Management')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Categories</li>
@endsection

@section('content')

    <div class="card-custom p-3 mb-4">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-12 col-md-6">
                <form action="{{ route('admin.categories.index') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control form-control-sm border-start-0 ps-0" placeholder="Search categories..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-gold">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 text-md-end">
                @can('create categories')
                <a href="{{ route('admin.categories.create') }}" class="btn btn-gold btn-sm shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> Add Category
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
                        <th style="width: 70px;">Image</th>
                        <th>Name &amp; Slug</th>
                        <th>Products Count</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        @php
                            $catImg = $category->image ? (str_starts_with($category->image, 'http') || str_starts_with($category->image, 'assets/') ? asset($category->image) : asset('storage/' . $category->image)) : asset('assets/img/cat_churidar.png');
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ $catImg }}" alt="{{ $category->name }}" width="45" height="45" class="rounded-circle object-fit-cover border" style="border-color: #e5e7eb;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $category->name }}</div>
                                <div class="text-muted small">{{ $category->slug }}</div>
                            </td>
                            <td>
                                <span class="badge" style="background: rgba(197, 160, 89, 0.15); color: #9c7a36; font-weight: 600;">
                                    {{ $category->products_count }} Products
                                </span>
                            </td>
                            <td><span class="text-muted">{{ $category->sort_order }}</span></td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Active</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('collections', ['category' => $category->slug]) }}" target="_blank" class="btn btn-outline-secondary" title="View in Store">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                    @can('edit categories')
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-warning" style="border-color: #c5a059; color: #a17c38;" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('delete categories')
                                    <button type="button" class="btn btn-outline-danger" title="Delete" onclick="confirmDeleteCat('{{ $category->id }}', '{{ addslashes($category->name) }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @endcan
                                </div>

                                <form id="delete-cat-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="card-footer bg-transparent border-top p-3 d-flex justify-content-center" style="border-color: #f3f4f6;">
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection

@push('scripts')
<script>
    function confirmDeleteCat(id, name) {
        if (confirm(`Are you sure you want to delete category "${name}"? Products under this category might become uncategorized.`)) {
            document.getElementById(`delete-cat-${id}`).submit();
        }
    }
</script>
@endpush
