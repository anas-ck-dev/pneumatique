<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display the registration page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request.
     *
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        try {
            // Create a new user with the validated request data
            $user = User::create($request->validated());

            // Log in the newly registered user
            auth()->login($user);

            return redirect('/')->with('success', "Account successfully registered.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Account registration failed. Please try again.");
        }
    }
}
