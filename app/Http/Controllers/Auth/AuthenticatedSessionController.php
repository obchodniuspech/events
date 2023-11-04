<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        if (! $request->user()->status) {
            // log user login - user not active
            activity()
                ->event('login')
                ->performedOn(new User())
                ->withProperties(['ip' => $request->ip() ?? null])
                ->log('Uživatel NEpřihlášen - uživatel je neaktivní');

            Session::flush();
            Auth::logout();

            return redirect('login')->withErrors('Uživatel nepřihlášen, obraťte se prosím na správce systému.');
        }

        $request->session()->regenerate();

        // log user login
        activity()
            ->event('login')
            ->performedOn(new User())
            ->withProperties(['ip' => $request->ip() ?? null])
            ->log('Uživatel přihlášen');

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        // log user logout
        activity()
            ->event('logout')
            ->performedOn(new User())
            ->withProperties(['ip' => $request->ip() ?? null])
            ->log('Uživatel odhlášen');

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
