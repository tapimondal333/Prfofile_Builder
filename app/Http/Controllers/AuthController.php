<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    /**
     * Show the application welcome page.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return view('Auth.login');
    }


    public function register()
    {
        return view('Auth.register');
    }


    public function registerPost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'in:admin,user',
        ]);
dump($request->all());

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role ?? 'user',
        ]);

        // Log the user in
        auth()->login($user);

        // Redirect to dashboard
        return redirect()->route('dashboard');
    }

    public function loginPost(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($credentials)) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            // Redirect to admin dashboard if admin or super_admin
            if (auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin') {
              return redirect()->route('admin.dashboard');
            }

            // Redirect to user dashboard
            return redirect()->route('dashboard');
        }

        // If login fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

   

    public function showLinkRequestForm()
    {
        return view('Auth.passwordRequest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm($token)
    {
        return view('Auth.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminLogout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


}