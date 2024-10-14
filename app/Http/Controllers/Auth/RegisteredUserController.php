<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VaccineCenter;
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
        $vaccineCenters = VaccineCenter::all();
        return view('auth.register')->with(compact('vaccineCenters'));
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
            'nid' => ['required', 'max:20', 'unique:'.User::class],
            'vaccine_center_id' => ['required', 'integer', 'exists:vaccine_centers,id'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nid' => $request->nid,
            'vaccine_center_id' => $request->vaccine_center_id,
            'password' => Hash::make($request->password),
        ]);


        return redirect(route('login', absolute: false))->with('success', 'You have successfully registered.');
    }
}
