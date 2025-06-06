<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.custom-login'); 
    }

    
    public function login(Request $request)
    {
       
        $request->validate([
            'username' => 'required|string', 
            'password' => 'required|string', 
        ]);

        
        $credentials = $request->only('username', 'password');

       
        if (Auth::attempt($credentials)) {
            
            return redirect()->route('home'); 
        }

        
        return back()->withErrors(['username' => 'Invalid credentials'])->withInput(); 
    }
}
