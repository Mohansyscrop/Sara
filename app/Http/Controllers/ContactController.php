<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactInquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('frontend.contact');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:30',
        'subject' => 'nullable|string|max:255',
        'contact_method' => 'nullable|string|in:WhatsApp,Email,Phone Call',
        'message' => 'required|string|max:5000',
    ]);

    // Save to database
    $contact = Contact::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'subject' => $validated['subject'] ?? 'General Inquiry',
        'contact_method' => $validated['contact_method'] ?? 'WhatsApp',
        'message' => $validated['message'],
        'status' => 'New',
    ]);

    // Send email
    Mail::to(config('mail.contact_email'))
        ->send(new ContactInquiryMail($contact));

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your boutique appointment & inquiry has been submitted. Our concierge will contact you shortly.',
        ]);
    }

    return redirect()->back()->with(
        'success',
        'Thank you! Your inquiry has been submitted successfully. Our VIP Concierge will get in touch with you shortly.'
    );
}
}
