<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);
        ddd($validated);
    }
}
