<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use app\Models\User;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {    
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Role check (e.g., 'customer')
        $user = Auth::user();
        /** @var \App\Models\User|\Spatie\Permission\Traits\HasRoles $user */
        if ($user->hasRole('customer')) {
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Login successful as customer.');
        } else {
            Auth::logout();
            return redirect()->back()->withErrors([
                'role' => 'Unauthorized role access.',
            ]);
        }
    }

    return redirect()->back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
