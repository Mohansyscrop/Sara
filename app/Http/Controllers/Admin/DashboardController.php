<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $activeProducts = Product::published()->count();
        $totalCategories = Category::count();
        $newContacts = Contact::where('status', 'New')->count();
        $totalContacts = Contact::count();
        $totalUsers = User::count();

        $recentProducts = Product::with('category')->latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $recentUsers = User::with('roles')->latest()->take(5)->get();

        // Chart 1: Products per category
        $categoryStats = Category::withCount('products')->get();
        $categoryLabels = $categoryStats->pluck('name');
        $categoryCounts = $categoryStats->pluck('products_count');

        // Chart 2: Contacts by status
        $statusCounts = Contact::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('admin.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'totalCategories',
            'newContacts',
            'totalContacts',
            'totalUsers',
            'recentProducts',
            'recentContacts',
            'recentUsers',
            'categoryLabels',
            'categoryCounts',
            'statusCounts'
        ));
    }
}
