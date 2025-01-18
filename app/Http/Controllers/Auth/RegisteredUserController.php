<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function createRecruiter(): View
    {
        return view('auth.register-recruiter');
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => UserTypeEnum::JobSeeker
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

    public function storeRecruiter(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company_website' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'numeric'],
        ]);

        $recruiter = Recruiter::create([
            'company_name' => $request->name,
            'company_website' => $request->company_website,
            'city' => $request->city,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);


        $recruiter->users()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => UserTypeEnum::Recruiter
        ]);


        event(new Registered($recruiter->users->first()));

        Auth::login($recruiter->users->first());

        return redirect(route('home', absolute: false));
    }
}
