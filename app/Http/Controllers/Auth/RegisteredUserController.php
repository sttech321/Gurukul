<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    // public function create(): View
    // {
    //     return view('auth.register');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     // Validate the incoming request
    //     $validatedData = $request->validate([
    //         'First_name' => ['required', 'string', 'max:255'], // Use consistent field names (lowercase)
    //         'Last_name' => ['required', 'string', 'max:255'],
    //         'Phone' => ['required', 'string', 'max:255'],
    //         'address' => ['required', 'string', 'max:255'],
    //         'role' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'email', 'max:255', 'unique:users,email'], // Correct unique rule
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);
    
    //     // Create the user
    //     $user = User::create([
    //         'First_name' => $validatedData['First_name'],  // Store first and last name separately
    //         'Last_name' => $validatedData['Last_name'],
    //         'Phone' => $validatedData['Phone'],
    //         'address' => $validatedData['address'],
    //         'role' => $validatedData['role'],
    //         'email' => $validatedData['email'],
    //         'password' => Hash::make($validatedData['password']), // Hash the password for security
    //     ]);
    
    //     // Trigger event for new registered user
    //     event(new Registered($user));
    
    //     // Automatically log in the newly registered user
    //     Auth::login($user);
    
    //     // Redirect to dashboard or intended route after login
    //     return redirect()->route('dashboard');
    // }
    
}
