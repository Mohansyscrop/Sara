<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::published()->with(['category', 'images']);

        // Search
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('sku', 'like', "%{$searchTerm}%")
                  ->orWhere('fabric', 'like', "%{$searchTerm}%")
                  ->orWhere('color', 'like', "%{$searchTerm}%")
                  ->orWhere('short_description', 'like', "%{$searchTerm}%")
                  ->orWhere('full_description', 'like', "%{$searchTerm}%")
                  ->orWhereHas('category', function($catQuery) use ($searchTerm) {
                      $catQuery->where('name', 'like', "%{$searchTerm}%");
                  });
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $categorySlug = $request->category;
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Fabric Filter
        if ($request->filled('fabric')) {
            $query->where('fabric', $request->fabric);
        }

        // Color Filter
        if ($request->filled('color')) {
            $query->where('color', 'like', "%{$request->color}%");
        }

        // Occasion Filter
        if ($request->filled('occasion')) {
            $query->where('occasion', $request->occasion);
        }

        // Price Filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float)$request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float)$request->max_price);
        }

        // Availability
        if ($request->filled('availability')) {
            if ($request->availability === 'in_stock') {
                $query->where('stock_quantity', '>', 0);
            } elseif ($request->availability === 'on_sale') {
                $query->where('discount', '>', 0);
            }
        }

        // Size Filter
        if ($request->filled('size')) {
            $size = $request->size;
            $query->where(function($q) use ($size) {
                $q->whereJsonContains('sizes', $size)
                  ->orWhere('sizes', 'like', "%{$size}%");
            });
        }

        // Sorting
        switch ($request->get('sort', 'featured')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'featured':
            default:
                $query->orderBy('is_featured', 'desc')->orderBy('sort_order', 'asc')->latest();
                break;
        }

        $products = $query->paginate(9)->withQueryString();

        $categories = Category::active()->withCount(['products' => function($q) {
            $q->published();
        }])->orderBy('sort_order', 'asc')->get();

        $fabrics = Product::published()->whereNotNull('fabric')->distinct()->pluck('fabric');
        $colors = Product::published()->whereNotNull('color')->distinct()->pluck('color');
        $occasions = Product::published()->whereNotNull('occasion')->distinct()->pluck('occasion');

        $activeCategory = null;
        if ($request->filled('category')) {
            $activeCategory = Category::where('slug', $request->category)->first();
        }

        return view('frontend.collection', compact(
            'products',
            'categories',
            'fabrics',
            'colors',
            'occasions',
            'activeCategory'
        ));
    }

    public function show($slug)
    {
        $product = Product::published()
            ->where('slug', $slug)
            ->with(['category', 'images'])
            ->firstOrFail();

        $relatedProducts = Product::published()
            ->where('id', '!=', $product->id)
            ->where(function($q) use ($product) {
                if ($product->category_id) {
                    $q->where('category_id', $product->category_id);
                }
            })
            ->take(6)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::published()->where('id', '!=', $product->id)->take(6)->get();
        }

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }
}
