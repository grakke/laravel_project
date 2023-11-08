<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\View\View;
||||||| parent of 4c2ead8 (add Pages)
=======
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> 4c2ead8 (add Pages)

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
<<<<<<< HEAD
    public function __invoke(Request $request): RedirectResponse|View
||||||| parent of 4c2ead8 (add Pages)
    public function __invoke(Request $request)
=======
    public function __invoke(Request $request): RedirectResponse|Response
>>>>>>> 4c2ead8 (add Pages)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}
