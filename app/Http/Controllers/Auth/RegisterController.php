<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function show()
    {
        return view('auth.register'); 
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|email|unique:users,email', 
            'phone' => 'required|regex:/^\+?[0-9]*$/',
            'payment_method' => 'required|in:cash,card',
        ]);

 
        $user = User::create([
            'username' => $validated['username'],
            'name' => $validated['first_name'] . ' ' . $validated['last_name'], 
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'payment_method' => $validated['payment_method'], 
        ]);

        
        return redirect()->route('home'); 
    }
}
