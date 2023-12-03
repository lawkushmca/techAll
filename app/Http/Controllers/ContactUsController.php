<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index()
    {
        // Your logic to get all contact us forms
        $models = ContactUs::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.contact-us.index', compact('models'));
    }

    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|min:2|max:32',
            'email' => 'required|email',
            'message' => 'required|min:2|max:5000',
        ]);

        // Create a new ContactUs instance and fill it with the form data
        $contact = new ContactUs();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');

        // Save the contact message to the database
        $contact->save();

        // You can also send an email notification, etc.

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Your message has been submitted!');
    }

}
