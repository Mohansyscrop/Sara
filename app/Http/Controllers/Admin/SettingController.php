<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'store_name' => "Sara's Boutique",
            'store_tagline' => "Luxury Indian Ethnic Fashion & Designer Churidar Sets",
            'helpline_phone' => "+91 98765 43210",
            'whatsapp_phone' => "919876543210",
            'contact_email' => "concierge@sarasboutique.com",
            'store_address' => "Jubilee Hills, Hyderabad, Telangana - 500033",
            'promotional_code' => "FESTIVE25",
            'promotional_discount' => "25%",
            'silk_mark_certified' => "Yes",
            'currency' => "INR (₹)",
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        return redirect()->route('admin.settings.index')->with('success', 'Boutique configuration settings saved successfully!');
    }
}
