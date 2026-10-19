<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $featuredProducts = Product::published()->take(4)->get();
        return view('frontend.about', compact('featuredProducts'));
    }

    public function terms()
    {
        return view('frontend.policies.terms');
    }

    public function privacy()
    {
        return view('frontend.policies.privacy');
    }

    public function shipping()
    {
        return view('frontend.policies.shipping');
    }

    public function refund()
    {
        return view('frontend.policies.refund');
    }
}
