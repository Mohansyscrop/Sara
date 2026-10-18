<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'store_name' => "Saras Boutique",
            'store_tagline' => "Women's Boutique — Fashion · Elegance · You",
            'helpline_phone' => "+91 94426 34491",
            'whatsapp_phone' => "919442634491",
            'contact_email' => "Sarasboutique2026@gmail.com",
            'store_address' => "No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009, India",
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
