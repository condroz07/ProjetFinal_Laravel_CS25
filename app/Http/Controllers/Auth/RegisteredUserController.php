<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Mail\WelcomeEmail;
use App\Models\Newsletter;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $avatar = $request->file('avatar')->store('public/user/');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->file('avatar')->hashName(),
            'password' => Hash::make($request->password),
        ]);

        $newsletter = $request->input('newsletter', false);

        if ($newsletter) {
            if (Newsletter::where('email', $request->email)->exists() === false) {
                $store = new Newsletter();
                $store->email = $request->email;
                $store->save();
                Mail::to($request->email)->send(new NewsletterMail);
            }
        }

        Auth::login($user);

        Mail::to($user->email)->send(new WelcomeEmail);

        return redirect(RouteServiceProvider::HOME);
    }
}
