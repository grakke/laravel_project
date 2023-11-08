<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\View\View;
||||||| parent of 4c2ead8 (add Pages)
=======
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> 4c2ead8 (add Pages)

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
<<<<<<< HEAD
    public function create(): View
||||||| parent of 4c2ead8 (add Pages)
    public function create()
=======
    public function create(): Response
>>>>>>> 4c2ead8 (add Pages)
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
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
