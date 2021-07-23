<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    function index()
    {
        return view('welcome');
    }
    function contact()
    {
        return view('guests.contact');
    }
    function sendForm(Request $request)
    {
        //ddd($request->all());
        /* Validazione */
        $validated = new Contact();
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);
        //ddd($validated);
        //return (new ContactFormMail($validated))->render();
        /* Mail::to('admin@mail.it')
            ->send(new ContactFormMail($validated));
        return redirect()->back()->with('message', 'Message sent'); */
    }
}
