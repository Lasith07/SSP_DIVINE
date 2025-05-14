<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; 

class ContactController extends Controller
{

    public function submit(Request $request)
    {
     
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        
        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);


        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
