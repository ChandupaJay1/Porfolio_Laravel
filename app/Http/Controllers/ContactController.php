<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;

class ContactController extends Controller
{
    // Send contact form
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        try {
            // Save to database
            $contact = Contact::create($validated);

            // Send email (optional)
            try {
                Mail::to(config('mail.contact_email', 'admin@example.com'))
                    ->send(new ContactMail($validated));
            } catch (\Exception $e) {
                \Log::error('Failed to send contact email: ' . $e->getMessage());
            }

            return redirect()->back()->with('success', 'Thank you! Your message has been received.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    // View all contacts (admin)
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    // View single contact (admin)
    public function show(Contact $contact)
    {
        $contact->markAsRead();
        return view('admin.contacts.show', compact('contact'));
    }

    // Delete contact (admin)
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully');
    }
}
