<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    /**
     * Display the admin login view.
     */
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.media');
        }

        return view('admin.login');
    }

    /**
     * Handle an admin authentication attempt.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.media'))->with(
                'success',
                'Welcome to the iCEEDS Media Library & Admin Portal.'
            );
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our administrative records.',
        ])->onlyInput('email');
    }

    /**
     * Log the admin user out.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with(
            'success',
            'You have been logged out securely.'
        );
    }
}
