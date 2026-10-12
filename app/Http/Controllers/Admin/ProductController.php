<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'images']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('fabric', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->orderBy('sort_order', 'asc')->latest()->paginate(10)->withQueryString();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'sub_category' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'mrp' => 'nullable|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'stock_quantity' => 'required|integer|min:0',
            'availability' => 'required|string',
            'fabric' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'color_code' => 'nullable|string|max:50',
            'occasion' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'care_instructions' => 'nullable|string',
            'shipping_info' => 'nullable|string',
            'return_info' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_new_arrival' => 'nullable|boolean',
            'is_bestseller' => 'nullable|boolean',
            'rating' => 'nullable|numeric|min:1|max:5',
            'review_count' => 'nullable|integer|min:0',
            'status' => 'required|string',
            'sort_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'sizes' => 'nullable|array',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        // Ensure uniqueness if slug exists
        $origSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $origSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
        $validated['is_bestseller'] = $request->boolean('is_bestseller');
        $validated['sizes'] = $request->input('sizes', ['XS', 'S', 'M', 'L', 'XL', 'Custom']);
        $validated['rating'] = $validated['rating'] ?? 5.0;
        $validated['review_count'] = $validated['review_count'] ?? 1;

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('products', 'public');
            $validated['main_image'] = $path;
        }

        $product = Product::create($validated);

        // Add main image to product_images
        if (!empty($product->main_image)) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $product->main_image,
                'is_primary' => true,
                'sort_order' => 0,
            ]);
        }

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $order = 1;
            foreach ($request->file('gallery_images') as $file) {
                $gPath = $file->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $gPath,
                    'is_primary' => false,
                    'sort_order' => $order++,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product "' . $product->name . '" created successfully!');
    }

    public function show($id)
    {
        $product = Product::with(['category', 'images'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::with(['category', 'images'])->findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $id,
            'category_id' => 'required|exists:categories,id',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $id,
            'sub_category' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'mrp' => 'nullable|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'stock_quantity' => 'required|integer|min:0',
            'availability' => 'required|string',
            'fabric' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'color_code' => 'nullable|string|max:50',
            'occasion' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'care_instructions' => 'nullable|string',
            'shipping_info' => 'nullable|string',
            'return_info' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_new_arrival' => 'nullable|boolean',
            'is_bestseller' => 'nullable|boolean',
            'rating' => 'nullable|numeric|min:1|max:5',
            'review_count' => 'nullable|integer|min:0',
            'status' => 'required|string',
            'sort_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'sizes' => 'nullable|array',
        ]);

        if (!empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
        $validated['is_bestseller'] = $request->boolean('is_bestseller');
        $validated['sizes'] = $request->input('sizes', $product->sizes ?? ['XS', 'S', 'M', 'L', 'XL', 'Custom']);

        if ($request->hasFile('main_image')) {
            if ($product->main_image && Storage::disk('public')->exists($product->main_image)) {
                Storage::disk('public')->delete($product->main_image);
            }
            $path = $request->file('main_image')->store('products', 'public');
            $validated['main_image'] = $path;

            // Update primary product_image
            $primaryImg = ProductImage::where('product_id', $product->id)->where('is_primary', true)->first();
            if ($primaryImg) {
                $primaryImg->update(['image_path' => $path]);
            } else {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => true,
                    'sort_order' => 0,
                ]);
            }
        }

        $product->update($validated);

        if ($request->hasFile('gallery_images')) {
            $maxOrder = ProductImage::where('product_id', $product->id)->max('sort_order') ?? 0;
            foreach ($request->file('gallery_images') as $file) {
                $gPath = $file->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $gPath,
                    'is_primary' => false,
                    'sort_order' => ++$maxOrder,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product "' . $product->name . '" updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Remove uploaded files if in storage
        if ($product->main_image && Storage::disk('public')->exists($product->main_image)) {
            Storage::disk('public')->delete($product->main_image);
        }
        foreach ($product->images as $img) {
            if ($img->image_path && Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
        }

        $name = $product->name;
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product "' . $name . '" was deleted successfully.');
    }
}
