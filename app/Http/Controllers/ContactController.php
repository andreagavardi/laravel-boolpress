<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);
        $contact = Contact::create($validated);
        //dd($contact);
        //return (new ContactFormMail($contact))->render();
        Mail::to('admin@info.it')->send(new ContactFormMail($contact));
        return redirect()->back()->with('message', 'Message sent');
    }
}
