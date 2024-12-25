<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.static_pages.contact');
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Save data to the database
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->mobile = $validatedData['phone']; // Rename 'lname' to a meaningful key
        $contact->email = $validatedData['email'];
        $contact->message = $validatedData['message'];
        $contact->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
