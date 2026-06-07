<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * REGISTER FORM
     */
    public function registerForm()
    {
        return view('register');
    }

    /**
     * LOGIN FORM
     */
    public function loginForm()
    {
        return view('login');
    }

    /**
     * FORGOT PASSWORD FORM
     */
    public function forgotForm()
    {
        return view('forgot-password');
    }

    /**
     * REGISTER USER
     */
    public function register(Request $request)
    {
        $request->validate([
            'username'         => 'required|unique:users',
            'full_name'        => 'required',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'gender'           => 'required',
            'dob'              => 'required',
        ]);

        $user = User::create([
            'username'  => $request->username,
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'gender'    => $request->gender,
            'dob'       => $request->dob,
        ]);

        // Log the user in and redirect to dashboard
        Auth::login($user);

        return redirect('/dashboard');
    }

    /**
     * LOGIN USER
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid Email or Password');
        }

        // Log the user in and redirect to dashboard
        Auth::login($user);

        return redirect('/dashboard');
    }

    /**
     * LOGOUT USER
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    /**
     * FORGOT PASSWORD
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('success', 'Password reset link sent');
        }

        return back()->with('error', 'Email not found');
    }
}