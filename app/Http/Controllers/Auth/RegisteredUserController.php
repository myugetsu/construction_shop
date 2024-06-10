<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use URL;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        return view('auth.register', ['user' => $request->user]);
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

        // dd(str_contains(URL::previous(), 'customer'));
        try {
            if (str_contains(URL::previous(), 'vendor')) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'access_level_id' => 2,
                ]);
            }elseif (str_contains(URL::previous(), 'customer')) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'access_level_id' => 3,
                ]);
            }

            event(new Registered($user));

            Auth::login($user);

            return redirect(route('dashboard', absolute: false));
        } catch (\Exception $e) {
           if (str_contains(URL::previous(), 'vendor')) {
                return redirect('auth/register/vendor')->withInput($request->except('password'))->withErrors("Email already registered");
            }else if (str_contains(URL::previous(), 'customer')) {
                return redirect('auth/register/customer')->withInput($request->except('password'))->withErrors("Email already registered");

            }else{
               return redirect('/');
            }
        }
    }
}
