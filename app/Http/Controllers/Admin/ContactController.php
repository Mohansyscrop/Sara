<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->latest()->paginate(10)->withQueryString();
        $statuses = ['New', 'In Progress', 'Contacted', 'Resolved', 'Closed'];

        return view('admin.contacts.index', compact('contacts', 'statuses'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $statuses = ['New', 'In Progress', 'Contacted', 'Resolved', 'Closed'];
        return view('admin.contacts.show', compact('contact', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:New,In Progress,Contacted,Resolved,Closed',
            'admin_notes' => 'nullable|string|max:5000',
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.show', $contact->id)->with('success', 'Enquiry status and notes updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Enquiry deleted successfully.');
    }
}
