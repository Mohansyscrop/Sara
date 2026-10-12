@extends('layouts.admin')

@section('title', 'Edit Product: ' . $product->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-decoration-none" style="color: #c5a059;">Products</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Edit: {{ $product->name }}</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif; font-weight: 600;">Edit Product: {{ $product->name }}</h3>
            <p class="text-muted small mb-0">Update boutique product attributes, pricing, stock and images.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('product.show', $product->slug) }}" target="_blank" class="btn btn-outline-warning btn-sm fw-medium" style="border-color: #c5a059; color: #a17c38; background: #fdfaf5;">
                <i class="bi bi-box-arrow-up-right me-1"></i> Preview Live
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm bg-white" style="border-color: #d1d5db;">
                <i class="bi bi-arrow-left me-1"></i> Back to Products
            </a>
        </div>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-12 col-lg-8">
                <!-- Basic Details Card -->
                <div class="card-custom p-4 mb-4">
                    <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                        <i class="bi bi-info-circle me-1"></i> General Information
                    </h5>

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="slug" class="form-label">SEO Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $product->slug) }}">
                            @error('slug') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="sku" class="form-label">SKU / Product Code</label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku', $product->sku) }}">
                            @error('sku') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="sub_category" class="form-label">Sub Category</label>
                            <input type="text" class="form-control" id="sub_category" name="sub_category" value="{{ old('sub_category', $product->sub_category) }}">
                        </div>

                        <div class="col-12">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description', $product->short_description) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="full_description" class="form-label">Full Description</label>
                            <textarea class="form-control" id="full_description" name="full_description" rows="5">{{ old('full_description', $product->full_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Attributes Card -->
                <div class="card-custom p-4 mb-4">
                    <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                        <i class="bi bi-palette me-1"></i> Fabric, Color &amp; Specifications
                    </h5>

                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <label for="fabric" class="form-label">Fabric</label>
                            <input type="text" class="form-control" id="fabric" name="fabric" value="{{ old('fabric', $product->fabric) }}">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="color" class="form-label">Color Name</label>
                            <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $product->color) }}">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="occasion" class="form-label">Occasion</label>
                            <input type="text" class="form-control" id="occasion" name="occasion" value="{{ old('occasion', $product->occasion) }}">
                        </div>

                        @php
                            $savedSizes = $product->sizes ?? ['S', 'M', 'L', 'XL'];
                            if (is_string($savedSizes)) {
                                $savedSizes = json_decode($savedSizes, true) ?: explode(',', $savedSizes);
                            }
                        @endphp
                        <div class="col-12">
                            <label class="form-label d-block">Available Sizes</label>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL', 'Custom'] as $sz)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sizes[]" value="{{ $sz }}" id="size_{{ $sz }}" {{ in_array($sz, old('sizes', $savedSizes)) ? 'checked' : '' }} style="border-color: #d1d5db;">
                                        <label class="form-check-label text-dark" for="size_{{ $sz }}">{{ $sz }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="care_instructions" class="form-label">Care Instructions</label>
                            <textarea class="form-control" id="care_instructions" name="care_instructions" rows="2">{{ old('care_instructions', $product->care_instructions) }}</textarea>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="shipping_info" class="form-label">Shipping Information</label>
                            <textarea class="form-control" id="shipping_info" name="shipping_info" rows="2">{{ old('shipping_info', $product->shipping_information) }}</textarea>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="return_info" class="form-label">Return / Exchange Policy</label>
                            <textarea class="form-control" id="return_info" name="return_info" rows="2">{{ old('return_info', $product->return_information) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- SEO Card -->
                <div class="card-custom p-4">
                    <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                        <i class="bi bi-globe me-1"></i> SEO Metadata
                    </h5>

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}">
                        </div>

                        <div class="col-12">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-12 col-lg-4">
                <!-- Pricing & Inventory -->
                <div class="card-custom p-4 mb-4">
                    <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                        <i class="bi bi-currency-rupee me-1"></i> Pricing &amp; Stock
                    </h5>

                    <div class="mb-3">
                        <label for="price" class="form-label">Selling Price (₹) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                        @error('price') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mrp" class="form-label">Original MRP (₹)</label>
                        <input type="number" step="0.01" class="form-control" id="mrp" name="mrp" value="{{ old('mrp', $product->mrp) }}">
                    </div>

                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount Percentage (%)</label>
                        <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount', $product->discount) }}" min="0" max="100">
                    </div>

                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required min="0">
                        @error('stock_quantity') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="availability" class="form-label">Availability <span class="text-danger">*</span></label>
                        <select class="form-select" id="availability" name="availability" required>
                            <option value="in_stock" {{ old('availability', $product->availability) == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                            <option value="out_of_stock" {{ old('availability', $product->availability) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                            <option value="made_to_order" {{ old('availability', $product->availability) == 'made_to_order' ? 'selected' : '' }}>Made to Order</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Publish Status <span class="text-danger">*</span></label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="1" {{ old('status', $product->status) == '1' ? 'selected' : '' }}>Published (Visible)</option>
                            <option value="0" {{ old('status', $product->status) == '0' ? 'selected' : '' }}>Draft (Hidden)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Display Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $product->sort_order) }}">
                    </div>
                </div>

                <!-- Badges -->
                <div class="card-custom p-4 mb-4">
                    <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                        <i class="bi bi-star me-1"></i> Promotion Highlights
                    </h5>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} style="border-color: #d1d5db;">
                        <label class="form-check-label text-dark" for="is_featured">Featured on Home Page</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="is_new_arrival" value="1" id="is_new_arrival" {{ old('is_new_arrival', $product->is_new_arrival) ? 'checked' : '' }} style="border-color: #d1d5db;">
                        <label class="form-check-label text-dark" for="is_new_arrival">Mark as New Arrival</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_bestseller" value="1" id="is_bestseller" {{ old('is_bestseller', $product->is_bestseller) ? 'checked' : '' }} style="border-color: #d1d5db;">
                        <label class="form-check-label text-dark" for="is_bestseller">Mark as Best Seller</label>
                    </div>
                </div>

                <!-- Image Uploads & Current Image Preview -->
                <div class="card-custom p-4 mb-4">
                    <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                        <i class="bi bi-images me-1"></i> Product Imagery
                    </h5>

                    @if($product->main_image)
                        @php
                            $curImg = str_starts_with($product->main_image, 'http') || str_starts_with($product->main_image, 'assets/') ? asset($product->main_image) : asset('storage/' . $product->main_image);
                        @endphp
                        <div class="mb-3">
                            <label class="form-label small text-muted">Current Main Image</label>
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ $curImg }}" alt="Current Image" width="70" height="90" class="rounded object-fit-cover border" style="border-color: #e5e7eb;">
                                <span class="small text-muted">Upload a new file below to replace this image.</span>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="main_image" class="form-label">Replace Main Image</label>
                        <input type="file" class="form-control" id="main_image" name="main_image" accept="image/*">
                    </div>

                    @if($product->images && $product->images->count() > 0)
                        <div class="mb-3">
                            <label class="form-label small text-muted">Current Gallery Images ({{ $product->images->count() }})</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($product->images as $gImg)
                                    @php
                                        $gUrl = str_starts_with($gImg->image_path, 'http') || str_starts_with($gImg->image_path, 'assets/') ? asset($gImg->image_path) : asset('storage/' . $gImg->image_path);
                                    @endphp
                                    <img src="{{ $gUrl }}" alt="Gallery Image" width="45" height="60" class="rounded object-fit-cover border" style="border-color: #e5e7eb;">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="gallery_images" class="form-label">Add More Gallery Images</label>
                        <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" multiple accept="image/*">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-gold btn-lg shadow-sm">
                        <i class="bi bi-check2-circle me-1"></i> Update Product
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>

@endsection
