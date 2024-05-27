<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }


    // public function store(LoginRequest $request)
    // {
    //     $validated = $request->validated();

    //     if (!Auth::attempt($validated))
    //     {
    //         throw ValidationException::withMessages([
    //             'email' => 'Not matched email or password',//
    //             //! I want to exactly know, either password is wrong.
    //             //! or the email is wrong.
    //         ]);
    //     }

    //     $request->session()->regenerate();

    //     return to_route('home');
    // }
    public function store(LoginRequest $request)
    {
        $validated = $request->validated();

        if ($this->emailNotFound($validated['email']))
            $this->throwEmailNotFoundException();

        // If the email exists, attempt to authenticate with the password
        if ($this->attemptFails($validated['email'], $validated['password']))
            $this->throwPasswordNotFoundException();

        $request->session()->regenerate();

        return to_route('home');
    }

    private function attemptFails($email, $password): bool
    {
        return !Auth::attempt(['email' => $email, 'password' => $password], true);
    }

    private function emailNotFound($email): bool
    {
        return !User::where('email', $email)->exists();
    }

    private function throwEmailNotFoundException()
    {
        throw ValidationException::withMessages([
            'email' => 'The email does not exist.',
        ]);
    }

    private function throwPasswordNotFoundException()
    {
        throw ValidationException::withMessages([
            'password' => 'The password is incorrect.',
        ]);
    }


    public function destroy()
    {

        Auth::logout();

        return to_route('home');
    }
}
