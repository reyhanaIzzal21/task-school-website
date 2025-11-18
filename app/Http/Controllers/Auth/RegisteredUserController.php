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
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'phone' => ['required', 'string', 'max:15'],
                'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'address' => ['required', 'string', 'max:255'],
            ],

            [
                'phone.required' => 'Nomor telepon wajib diisi.',
                'address.required' => 'Alamat wajib diisi.',
                'photo.image' => 'Foto harus berupa file gambar.',
                'photo.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
                'photo.max' => 'Ukuran foto maksimal 2MB.',
                'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
                'password.required' => 'Kata sandi wajib diisi.',
            ]
        );

        // Upload photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'photo' => $photoPath,
            'address' => $request->address,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard.user', absolute: false));
    }
}
