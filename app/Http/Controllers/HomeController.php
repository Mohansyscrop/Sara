<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->orderBy('sort_order', 'asc')->get();
        
        $newArrivals = Product::published()
            ->where('is_new_arrival', true)
            ->with('category')
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->take(8)
            ->get();

        if ($newArrivals->isEmpty()) {
            $newArrivals = Product::published()->with('category')->take(8)->get();
        }

        $bestSellers = Product::published()
            ->where('is_bestseller', true)
            ->with('category')
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->take(8)
            ->get();

        if ($bestSellers->isEmpty()) {
            $bestSellers = Product::published()->with('category')->take(8)->get();
        }

        $featuredProducts = Product::published()
            ->where('is_featured', true)
            ->with('category')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('frontend.home', compact('categories', 'newArrivals', 'bestSellers', 'featuredProducts'));
    }
}
