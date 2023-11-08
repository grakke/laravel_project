<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
<<<<<<< HEAD
use Illuminate\View\View;
||||||| parent of 4c2ead8 (add Pages)
=======
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> 4c2ead8 (add Pages)

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
<<<<<<< HEAD
    public function create(): View
||||||| parent of 4c2ead8 (add Pages)
    public function create()
=======
    public function create(): Response
>>>>>>> 4c2ead8 (add Pages)
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
<<<<<<< HEAD
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
||||||| parent of 4c2ead8 (add Pages)
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
=======
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
>>>>>>> 4c2ead8 (add Pages)
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
