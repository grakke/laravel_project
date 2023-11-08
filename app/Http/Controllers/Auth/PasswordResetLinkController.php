<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
<<<<<<< HEAD
use Illuminate\View\View;
||||||| parent of 4c2ead8 (add Pages)
=======
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> 4c2ead8 (add Pages)

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
<<<<<<< HEAD
    public function create(): View
||||||| parent of 4c2ead8 (add Pages)
    public function create()
=======
    public function create(): Response
>>>>>>> 4c2ead8 (add Pages)
    {
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}
