<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

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
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'regex:/^(091|092|093|094)\d{7}$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => UserTypeEnum::JobSeeker
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function storeRecruiter(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
            'company_website' => ['nullable', 'string', 'max:255', 'url'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'regex:/^(091|092|093|094)\d{7}$/'],
            'logo' => ['file', 'image', 'max:2048'], // Add validation for logo

        ]);

        $recruiter = Recruiter::create([
            'company_name' => $request->name,
            'company_website' => $request->company_website,
            'city' => $request->city,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        if ($request->hasFile('logo')) {
            $recruiter->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        $recruiter->users()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => UserTypeEnum::Recruiter
        ]);

        event(new Registered($recruiter->users->first()));

        Auth::login($recruiter->users->first());

        Notification::make('new-recruiter')
            ->body(__('New Recruiter added ') . $recruiter->company_name)
            ->success()
            ->sendToDatabase(User::where('type', UserTypeEnum::Admin)->get());

        return redirect(route('home', absolute: false));
    }
}
